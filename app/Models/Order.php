<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Shipment;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;
    
    //protected $fillable = ['date', 'quantity', 'subtotal', 'pendiente', 'user_id'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion Uno a Uno
    public function shipment(){
        return $this->hasOne(Shipment::class);
    }

    //Relacion uno a Muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion muchos a muchos
    public function products(){
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
    }

    //, 'order_product', 'order_id', 'product_id', 'cantidad'
}
