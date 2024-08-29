<?php

//Http/Controllers/API/AuthController

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Passport\Token;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Tenter de trouver l'utilisateur avec le login fourni
        $user = User::where('login', $request->login)->first();

        // Vérifier les informations d'identification
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'login' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Créer un token d'accès personnel
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken; // Use plainTextToken to get the actual token value

        return response()->json([
            'access_token' => $token, // Token value
            'token_type' => 'Bearer',
            'expires_in' => 3600, // 1 hour
        ]);
    }

    public function refresh(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        // Révoquer tous les tokens existants
        $user->tokens()->delete();

        // Créer un nouveau token
        $newToken = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json([
            'access_token' => $newToken,
            'token_type' => 'Bearer',
            'expires_in' => config('sanctum.expiration'), // Utilisez la configuration de Sanctum pour l'expiration
        ]);
    }

    public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Successfully logged out',
    ]);
}
}
