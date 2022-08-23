<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group as G;

class Item extends Model
{
    use HasFactory;

    public function item_group()
    {
        return $this->belongsTo(G::class, 'group_id', 'id');
    }

}
