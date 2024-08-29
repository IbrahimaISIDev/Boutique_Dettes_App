<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Users",
 *     description="API Endpoints des utilisateurs"
 * )
 */

/**
 * @OA\Get(
 *     path="/api/users",
 *     summary="Liste tous les utilisateurs",
 *     tags={"Users"},
 *     @OA\Response(
 *         response=200,
 *         description="Liste des utilisateurs récupérée avec succès",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User"))
 *     )
 * )
 */
class UserControllerDoc
{
    // Ce fichier est uniquement pour la documentation Swagger.
}

/**
 * @OA\Post(
 *     path="/api/users",
 *     summary="Crée un nouvel utilisateur",
 *     tags={"Users"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Utilisateur créé avec succès",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Erreur de validation"
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/api/users/{id}",
 *     summary="Affiche un utilisateur spécifique",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Utilisateur trouvé",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Utilisateur non trouvé"
 *     )
 * )
 */

/**
 * @OA\Put(
 *     path="/api/users/{id}",
 *     summary="Met à jour un utilisateur existant",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Utilisateur mis à jour avec succès",
 *         @OA\JsonContent(ref="#/components/schemas/User")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Utilisateur non trouvé"
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Erreur de validation"
 *     )
 * )
 */

/**
 * @OA\Delete(
 *     path="/api/users/{id}",
 *     summary="Supprime un utilisateur",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Utilisateur supprimé avec succès"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Utilisateur non trouvé"
 *     )
 * )
 */
