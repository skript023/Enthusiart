<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'art_id',
        'price',
        'quantity',
        'address',
        'status'
    ];

    public function artwork()
    {
        return $this->hasOne(gallery::class, 'id', 'art_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function payment()
    {
        return $this->hasOne(payment::class, 'order_id', 'id');
    }
}
