<?php

namespace App;

use App\presentPrice;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['productName','price','productImage','quantity'];

    public function presentPrice(){
    	return money_format( ₦%i, $this->price/100);
    }
}
