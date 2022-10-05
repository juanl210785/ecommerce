<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;
use App\Models\Paypal;
use App\Models\Card;
use App\Models\UserImage;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Answer;
use App\Models\Order;
use App\Models\Shipment;
/* use App\Models\Role; */

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //Si la clave primaria no es id y si la clave foranea no es user_id usa esto:
    //return $this->hasOne(Profile::class, foreign_key, primary_key);
    //Relacion Uno a Uno
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    //Relacion Uno a Uno
    public function paypal(){
        return $this->hasOne(Paypal::class);
    }

    //Relacion Uno a Uno
    public function card(){
        return $this->hasOne(Card::class);
    }

    //Relacion Uno a Uno
    public function userimage(){
        return $this->hasOne(UserImage::class);
    }

    //Relacion Uno a Uno
    public function answer(){
        return $this->hasOne(Answer::class);
    }

    //Relacion uno a muchos
    public function products(){
        return $this->hasMany(Product::class);
    }

    //Relacion uno a muchos
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //Relacion uno a muchos
    public function orders(){
        return $this->hasMany(Order::class);
    }

    //Relacion uno a muchos
    public function shipments(){
        return $this->hasMany(Shipment::class);
    }

    //Relacion muchos a muchos
    /* public function roles(){
        return $this->belongsToMany(Role::class);
    } */
}
