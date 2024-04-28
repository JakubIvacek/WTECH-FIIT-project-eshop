<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    protected $fillable = ['id', 'user_id', 'order_id', 'product', 'name', 'size', 'name', 'count', 'imgsrc', 'price'];
}
