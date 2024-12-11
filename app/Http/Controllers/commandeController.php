<?php

namespace App\Http\Controllers;

use App\Http\Requests\commandeRequest;
use App\Models\commande;
use Illuminate\Http\Request;

class commandeController extends Controller
{
    public function ajouterCommande(commandeRequest $request)
    {

        $commande = commande::create($request->validated());


        $produits = $request->validated()['produits'];


        foreach ($produits as $produit) {
            $commande->produits()->attach($produit['id'], [
                'quantite' => $produit['quantite'],
                'prix' => $produit['prix'],
            ]);
        }
      
        return response()->json($commande, 201);
    }
}
