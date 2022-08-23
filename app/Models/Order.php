<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item as I;
use App\Models\Restaurant as R;
use App\Models\User as U;

class Order extends Model
{
    use HasFactory;

    public function order_item()
		{
		return $this->belongsTo(I::class, 'item_id', 'id');
		}
 
		public function order_restaurant()
		{
		return $this->belongsTo(R::class, 'restaurant_id', 'id');
		}
 
		public function orderUserName()
		{
		return $this->belongsTo(U::class, 'user_id', 'id');
		}
 
		const STATUSES = [
		1 => 'New',
		2 => 'Approved',
		3 => 'Canceled',
		4 => 'Completed',
		5 => 'Archived',
		];
 

}
