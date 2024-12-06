<?php

namespace App\Http\Controllers;

use App\Http\Requests\UtilisateurRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UtilisateurCONTROLLER extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(UtilisateurRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);

        return response()->json(['message' => 'Utilisateur ajouté avec succès', 'user' => $user], 201);
    }

 public function supprimerUser(User $id)
 {
   $id->delete();
 }
    public function modifierUser(UtilisateurRequest $request, User $user)
    {
        // Valider les données
        $data = $request->validated();

        // Hacher le mot de passe si fourni
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        // Mettre à jour l'utilisateur
        $user->update($data);

        // Retourner une réponse JSON
        return response()->json($user);
    }

    public function listuserone(User $user)
    {
     return response()->json($user);
    }
}

