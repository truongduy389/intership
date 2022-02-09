<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $table = 'products';
    protected $fillable = ['id', 'name', 'image_before', 'image_after','price','idSize','idColor','cate_id','default'];


    // public function user()
    // {
    //     $this->belongsTo(User::class, 'user_id', 'id');
    // }
}
