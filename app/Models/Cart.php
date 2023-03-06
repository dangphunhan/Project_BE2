<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function cart_detail()
    {
        return $this->hasMany(Cart_detail::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function pay_method()
    {
        return $this->hasOne(Pay_method::class);
    }
    public function ship_method()
    {
        return $this->hasOne(Ship_method::class);
    }
}
