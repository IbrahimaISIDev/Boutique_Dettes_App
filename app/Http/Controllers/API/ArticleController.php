<?php

namespace App\Http\Controllers\API;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @OA\Info(title="API Boutique", version="0.1")
 */
class ArticleController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/articles",
     *     summary="Liste tous les articles",
     *     @OA\Response(response="200", description="Liste des articles")
     * )
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * @OA\Post(
     *     path="/api/articles",
     *     summary="Crée un nouvel article",
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="libelle", type="string"),
     *             @OA\Property(property="prix", type="number"),
     *             @OA\Property(property="qteStock", type="integer")
     *         )
     *     ),
     *     @OA\Response(response="201", description="Article créé")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'qteStock' => 'required|integer|min:0',
        ]);

        return Article::create($request->all());
    }

    /**
     * @OA\Get(
     *     path="/api/articles/{id}",
     *     summary="Affiche un article spécifique",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de l'article",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Article trouvé")
     * )
     */
    public function show(Article $article)
    {
        return $article;
    }

    /**
     * @OA\Put(
     *     path="/api/articles/{id}",
     *     summary="Met à jour un article",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de l'article",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="libelle", type="string"),
     *             @OA\Property(property="prix", type="number"),
     *             @OA\Property(property="qteStock", type="integer")
     *         )
     *     ),
     *     @OA\Response(response="200", description="Article mis à jour")
     * )
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'libelle' => 'string',
            'prix' => 'numeric|min:0',
            'qteStock' => 'integer|min:0',
        ]);

        $article->update($request->all());
        return $article;
    }

    /**
     * @OA\Delete(
     *     path="/api/articles/{id}",
     *     summary="Supprime un article",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de l'article",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="Article supprimé")
     * )
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(null, 204);
    }
}
