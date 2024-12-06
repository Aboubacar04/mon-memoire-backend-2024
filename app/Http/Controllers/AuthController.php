<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(AuthRequest $request)
    {
        // Valider la demande
        $validated = $request->validated();

        // Tenter la connexion avec les informations de l'utilisateur
        if (!Auth::attempt($validated)) {
            // Si l'authentification échoue, retourner une erreur 401
            return response()->json(['message' => 'Invalid credentials'], 401); // 401 Unauthorized
        }

        // Si l'authentification réussit, récupérer l'utilisateur et générer un token
        $user = Auth::user();
        $token = $user->createToken('token_name')->plainTextToken;

        // Retourner le token et les informations de l'utilisateur
        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }
}
