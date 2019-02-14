<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable =[
    	'name',
    	'price',
    	'description',
    	'image'
    ];

    public function getItems(){
    	return $this->paginate($this->totalPage);
    }
}
