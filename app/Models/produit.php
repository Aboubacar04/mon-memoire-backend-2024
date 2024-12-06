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
        'qte'
    ];

    public function cat()
    {
        return $this->belongsTo(categorie::class,'categorie_id');
    }
}
