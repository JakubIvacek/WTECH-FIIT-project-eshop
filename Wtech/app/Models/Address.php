<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    use HasFactory;
    public $timestamps = false;

/**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'street',
        'street_num',
        'zip',
        'town',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
