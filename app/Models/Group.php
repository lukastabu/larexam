<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item as I;
use App\Models\Restaurant as R;

class Group extends Model
{
    use HasFactory;

    public function group_restaurant()
    {
        return $this->belongsTo(R::class, 'restaurant_id', 'id');
    }

    public function group_item()
    {
        return $this->hasMany(I::class, 'group_id', 'id');
    }

}
