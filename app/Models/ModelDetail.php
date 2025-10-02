<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelDetail extends Model
{

    protected $guarded = [];
  public function attributeValues()
{
    return $this->belongsToMany(AttributeValue::class, 'model_attribute_values', 'model_id', 'attribute_value_id');
}

public function make()
{
    return $this->belongsTo(Make::class);
}
}
