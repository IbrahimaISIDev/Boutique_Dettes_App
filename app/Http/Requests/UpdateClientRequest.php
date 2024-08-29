<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ResponseTraits; // Importer le trait

class UpdateClientRequest extends FormRequest
{
    use ResponseTraits; // Utiliser le trait

    /**
     * Détermine si l'utilisateur est autorisé à faire cette demande.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Mettre à jour selon les besoins d'autorisation
    }

    /**
     * Obtenir les règles de validation pour la demande.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'surnom' => 'required|string|max:255',
            'phone' => 'required|string|phone:SN', // Exemple avec une règle pour le numéro de téléphone
            'adresse' => 'nullable|string',
        ];
    }

    /**
     * Obtenir les messages de validation personnalisés.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.required' => $this->phoneValidationMessage('required'),
            'phone.string' => $this->phoneValidationMessage('string'),
            // Ajoutez d'autres messages personnalisés si nécessaire
        ];
    }
}
