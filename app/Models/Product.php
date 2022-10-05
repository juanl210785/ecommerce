<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'crated_at', 'updated_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion uno a muchos inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productimages(){
        return $this->hasMany(ProductImage::class);
    }

    //Relacion uno a muchos
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //Relacion muchos a muchos
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
