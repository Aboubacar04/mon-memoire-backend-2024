<?php

namespace App\Http\Controllers;

use App\Http\Requests\commandeRequest;
use App\Models\commande;
use Illuminate\Support\Facades\Log;

class commandeController extends Controller
{
    public function ajouterCommande(commandeRequest $request)
    {

        $commande = commande::create($request->validated());


        $produits = $request->validated()['produits'];
        Log::info('Données Produit : ', $produits);

        $montantTotal = 0;


        foreach ($produits as $p) {
            $commande->produits()->attach($p['id'], [
                'qte' => $p['qte'],
                'prix' => $p['prix'],
            ]);


            $montantTotal += $p['qte'] * $p['prix'];
        }

        // Mettre à jour le montant total dans la commande (si tu veux le sauvegarder)
          $commande->montantTotal = $montantTotal;
          $commande->save();

        return response()->json([
            'commande' => $commande,
            'montant_total' => $montantTotal,
        ], 201);
    }
}
