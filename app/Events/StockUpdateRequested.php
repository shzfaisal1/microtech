<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StockUpdateRequested
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $items = [];      // array of item objects/arrays
    public  $action;    // 'receive' | 'ship' | 'adjust' | 'transfer'
    public $userId;
    public $meta =[];      // optional: reference info (ref type/id/number), reason etc.

    public function __construct(array $items, string $action, ?int $userId = null, ?array $meta = null)
    {
        
        $this->items  = $items;
        $this->action = $action;
        $this->userId = $userId;
        $this->meta   = $meta;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
