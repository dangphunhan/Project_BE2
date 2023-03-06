<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function protype()
    {
        return $this->hasOne(Protype::class);
    }
    public function manufacture()
    {
        return $this->hasOne(Manufacture::class);
    }
//    public function cart_detail()
//    {
//        return $this->belongsTo(Cart_detail::class);
//    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
//    public function role()
//    {
//        return $this->hasOne(Role::class);
//    }
}
