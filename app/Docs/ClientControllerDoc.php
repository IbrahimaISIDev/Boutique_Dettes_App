<?php

namespace App\Docs;

/**
 * @OA\Schema(
 *     schema="Client",
 *     type="object",
 *     title="Client",
 *     description="Client model",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Client ID"
 *     ),
 *     @OA\Property(
 *         property="user_id",
 *         type="integer",
 *         description="ID de l'utilisateur associé"
 *     ),
 *     @OA\Property(
 *         property="surnom",
 *         type="string",
 *         description="Nom du client"
 *     ),
 *     @OA\Property(
 *         property="phone",
 *         type="string",
 *         description="Numéro de téléphone du client"
 *     ),
 *     @OA\Property(
 *         property="adresse",
 *         type="string",
 *         description="Adresse du client"
 *     )
 * )
 */

/**
 * @OA\Tag(
 *     name="Clients",
 *     description="API Endpoints des clients"
 * )
 */

/**
 * @OA\Get(
 *     path="/api/clients",
 *     summary="Liste tous les clients",
 *     tags={"Clients"},
 *     @OA\Response(
 *         response=200,
 *         description="Liste des clients récupérée avec succès",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Client"))
 *     )
 * )
 */

/**
 * @OA\Post(
 *     path="/api/clients",
 *     summary="Crée un nouveau client",
 *     tags={"Clients"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Client")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Client créé avec succès",
 *         @OA\JsonContent(ref="#/components/schemas/Client")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Erreur de validation"
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/api/clients/{id}",
 *     summary="Affiche un client spécifique",
 *     tags={"Clients"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Client trouvé",
 *         @OA\JsonContent(ref="#/components/schemas/Client")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Client non trouvé"
 *     )
 * )
 */

/**
 * @OA\Put(
 *     path="/api/clients/{id}",
 *     summary="Met à jour un client existant",
 *     tags={"Clients"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Client")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Client mis à jour avec succès",
 *         @OA\JsonContent(ref="#/components/schemas/Client")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Client non trouvé"
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Erreur de validation"
 *     )
 * )
 */

/**
 * @OA\Delete(
 *     path="/api/clients/{id}",
 *     summary="Supprime un client",
 *     tags={"Clients"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Client supprimé avec succès"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Client non trouvé"
 *     )
 * )
 */
class ClientControllerDoc
{
    // Ce fichier est uniquement pour la documentation Swagger.
}
