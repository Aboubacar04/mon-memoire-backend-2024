<?php

namespace App\Http\Controllers;

use App\Http\Requests\produitREQUEST;
use App\Http\Requests\RequestEvaluation;
use App\Models\evaluation;
use App\Models\produit;
use Illuminate\Http\Request;

class produitsController extends Controller
{
    public function listProduits()
    {
        $produit = produit::with('cat', 'user')->get();

        return response()->json($produit);
    }

    public function ajouterProduit1(ProduitRequest $request)
    {
        $data = $request->validated();
        $image = $request->file('image');
        $data['image'] = $image->store('blog', 'public'); // Chemin relatif
        $produit = Produit::create($data);

        // Ajout de l'URL complète de l'image dans la réponse
        $produit->image = asset('storage/' . $data['image']);

        return response()->json($produit, 201);
    }


    public function supprimerProduit( produit $id)
    {
        $id->delete();
    }

    public function detailProduit(produit $produit)
    {
        return response()->json($produit->load('user'));
    }

    public function evaluer(RequestEvaluation $request)
    {
        evaluation::create($request->validated());
    }
}
