<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function items(){
        return $this->hasMany(Item::class);
    }
    protected $fillable = ['id', 'firstName', 'lastName', 'email', 'phone', 'street', 'streetNumber', 'town',
        'postalCode', 'cardNumber', 'ExpiryDate', 'CVV', 'paymentOption'];
}
