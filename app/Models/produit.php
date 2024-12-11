<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    protected $fillable = [
        'nom',
        'parcourt',
        'prix',
        'stock',
        'description',
        'image',
        'date',
        'categorie_id',
        'qte',
        'user_id'
    ];

    public function cat()
    {
        return $this->belongsTo(categorie::class,'categorie_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function commande()
    {
        return $this->belongsToMany(commande::class,'commande_produits')
            ->withPivot('qte', 'prix')
            ->withTimestamps();
    }
}
