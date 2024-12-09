<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluation extends Model
{
    protected $fillable = [
        'user_id',
        'produit_id',
        'note',
        'contenue',
        ];
}
