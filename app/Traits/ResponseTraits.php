<?php

namespace App\Traits;

use App\Enums\OrderStatus;
use Illuminate\Http\JsonResponse;

trait ResponseTraits
{
    /**
     * Retourne une réponse JSON en fonction du statut.
     *
     * @param OrderStatus $status
     * @param string $message
     * @param mixed $data
     * @param int $statusCode
     * @return JsonResponse
     */
    public function jsonResponse(OrderStatus $status, string $message, $data = null, int $statusCode = 200): JsonResponse
    {
        // Convertit l'énumération en chaîne de caractères
        $statusString = $status->value;

        $response = [
            'status' => $statusString,
            'message' => $message,
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $statusCode);
    }


    /**
     * Retourner un message de validation personnalisé pour le numéro de téléphone.
     *
     * @param string $type
     * @return string
     */
    public function phoneValidationMessage($type)
    {
        $messages = [
            'required' => 'Le numéro de téléphone est requis.',
            'string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            // Ajoutez d'autres messages selon les règles
        ];

        return $messages[$type] ?? 'Le numéro de téléphone est invalide.';
    }
}
