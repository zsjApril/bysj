<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pe_package extends Model
{
    public function items()
    {
        return $this->belongsToMany(Pe_item::class, 'package_items', 'package_id', 'item_id');
    }
}
