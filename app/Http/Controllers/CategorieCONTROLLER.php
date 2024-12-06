<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\produit;
use Illuminate\Http\Request;

class CategorieCONTROLLER extends Controller
{
    public function listcategorie()
    {
        $categorie = categorie::with('produit')->get();
        return response()->json($categorie);
    }
    public function listcategorieF()
    {
        $categorieF = produit::where('categorie_id', 1)->take(5)->get();

        return response()->json($categorieF);
    }

    public function legume()
    {
        $legume = produit::where('categorie_id',6)->take(5)->get();
        return response()->json($legume);
    }
}
