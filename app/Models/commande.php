<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    protected $fillable = [
        'montantTotal',
        'adresseLivraison',
        'dateCommande',
        'user_id',
    ];

    public function produits()
    {
        $this->belongsToMany(produit::class,'commande_produits')
            ->withPivot('qte','prix')
            ->withTimestamps();
    }
}


