<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group as G;

class Restaurant extends Model
{
    use HasFactory;

    public function restaurant_group()
    {
        return $this->hasMany(G::class, 'restaurant_id', 'id');
    }

}
