<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Produto;

class Reserva extends Model
{
    protected $fillable =['user_id', 'product_id', 'date_reserved', 'status'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function product(){
    	return $this->belongsTo(Produto::class);
    }

    public function status($op = null){
    	$statusAvailable = [
    		'reserved' => 'Reserved',
    		'canceled' => 'Canceled',
    		'paid' => 'Paid',
    		'concluded' => 'Concluded',
    	];

    	if($op)
    		return $statusAvailable($op);

    	return $statusAvailable;
    }

    public function changeStatus($newStatus){
    	$this->status = $newStatus;

    	return $this->save();
    }

    public function newReserve($productId){
    	$this->user_id = auth()->user()->id;
    	$this->product_id = $product_id;
    	$this->date_reserved = date('Y-m-d');
    	$this->status = 'reserved';

    	return $this->save();
    }
}
