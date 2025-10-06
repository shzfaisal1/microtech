<?php

namespace App\Listeners; // Adjust namespace as needed

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Events\StockUpdateRequested; // Adjust import
use App\Models\StockManagement; // Add this import
use Psr\Log\LoggerInterface;

class UpdateStockListener // Class name example
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function handle(StockUpdateRequested $event): void
    {
   
        if (empty($event->items) || !is_array($event->items)) {
            $this->logger->warning('StockUpdateRequested called with empty items', ['event' => $event]);
            return;
        }

        $movementType = $event->action ?? 'unknown';
        $referenceType = $event->meta['reference_type'] ?? null;
        $referenceId = $event->meta['reference_id'] ?? null;
        $userId = $event->userId ?? null;
        $now = Carbon::now();

        foreach ($event->items as $rawItem) {
           
            $item = array_merge(config('stock.defaults', []), $rawItem);
       
            $qty = isset($item['qty']) ? (float) $item['qty'] : 0.0;
           

            $makeId = $item['make_id'] ?? null;
            $modelId = $item['model_id'] ?? null;

           
            
           try {
    DB::transaction(function () use ($makeId, $modelId, $qty, $movementType, $referenceType, $referenceId, $userId, $now) {

        // Build the uniqueness condition (add more keys here if you need to separate per warehouse, etc.)
        $where = [
            'make_id'  => $makeId,
            'model_id' => $modelId,
        ];

        // Lock the selected row for update to avoid race conditions
        $stock = DB::table('stock_management')
            ->where($where)
            ->lockForUpdate()
            ->first();

        if ($stock) {
            // Safely increment qty in the DB and update meta columns
            DB::table('stock_management')
                ->where('id', $stock->id)
                ->update([
                    'qty'            => DB::raw('qty + ' . (float)$qty),
                    'movement_type'  => $movementType,
                    'reference_type' => $referenceType,
                    'reference_id'   => $referenceId,
                    'updated_by'     => $userId,
                    'updated_at'     => $now,
                ]);
        } else {
            // Insert new row
            DB::table('stock_management')->insert([
                'make_id'        => $makeId,
                'model_id'       => $modelId,
                'qty'            => $qty,
                'movement_type'  => $movementType,
                'reference_type' => $referenceType,
                'reference_id'   => $referenceId,
                'created_by'     => $userId,
                'updated_by'     => $userId,
                'created_at'     => $now,
                'updated_at'     => $now,
            ]);
        }
    }, 5); // optional retry attempts on deadlock
} catch (\Throwable $e) {
    $this->logger->error('Failed to update/create stock_management', [
        'error'         => $e->getMessage(),
        'make_id'       => $makeId,
        'model_id'      => $modelId,
        'qty'           => $qty,
        'movementType'  => $movementType,
        'referenceType' => $referenceType,
        'referenceId'   => $referenceId,
    ]);
    throw $e; // rethrow so queued listener/job can retry if needed
}

        }
    }
}