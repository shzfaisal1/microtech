<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $guarded = [];

    public function attribute()
    {
        return $this->belongsTo(AttributeDetail::class, 'attr_val_id');
    }
        public function models()
    {
        return $this->belongsToMany(ModelDetail::class, 'model_attribute_values', 'attribute_value_id', 'model_id');
    }

}
