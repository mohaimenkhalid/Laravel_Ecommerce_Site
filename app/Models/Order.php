<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\cart;
use App\Models\payment;


class Order extends Model{


	public $fillable= [

		'user_id',
		'payment_id',
		'name',
		'phone_no',
		'email',
		'shipping_address',
		'message',
		'ip_address',
		'is_paid',
		'is_completed',
		'is_seen_by_admin', 
		'transaction_id', 
	];

	public function user(){

		return $this->belongsTo(User::class);
	}

	public function carts(){

		return $this->hasMany(Cart::class);
	}

	public function payment(){

		return $this->belongsTo(payment::class);
	}
    
}
