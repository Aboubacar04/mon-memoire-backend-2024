<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    //

    public function produit()
    {
        return $this->hasMany(produit::class,'categorie_id');
    }



}
