<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/* use App\Models\User;
use App\Models\Permission; */

class Role extends Model
{
    use HasFactory;

    /* //Relacion muchos a muchos
    public function users(){
        return $this->belongsToMany(User::class);
    }

    //Relacion muchos a muchos
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    } */
}
