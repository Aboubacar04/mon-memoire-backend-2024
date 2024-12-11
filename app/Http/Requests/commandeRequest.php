<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class commandeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'adresseLivraison' => 'required|string|max:255',
            'montantTotal' => 'required|numeric',
            'dateCommande' => 'required|date',
            'produits' => 'required|array', // La liste des produits
            'produits.*.id' => 'required|exists:produits,id', // Validation pour chaque produit
            'produits.*.qte' => 'required|integer|min:1', // Validation pour la quantité de chaque produit
            'produits.*.prix' => 'required|numeric', // Validation pour le prix de chaque produit
            'statut' => 'required'
        ];
    }
}
