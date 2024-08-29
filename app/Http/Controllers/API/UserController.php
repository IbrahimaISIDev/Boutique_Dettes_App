<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Traits\ResponseTraits;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ResponseTraits;

    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $data = $request->isJson() ? $request->json()->all() : $request->all();

        $validator = validator($data, (new UserRequest())->rules());

        if ($validator->fails()) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Erreur de validation', $validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
            $user = User::create($validator->validated());
            DB::commit();
            return $this->jsonResponse(OrderStatus::SUCCESS, 'Utilisateur créé avec succès', $user, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->jsonResponse(OrderStatus::ECHEC, 'Erreur lors de la création de l\'utilisateur', $e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return $this->jsonResponse(OrderStatus::SUCCESS, 'Utilisateur trouvé', $user);
        } else {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Utilisateur non trouvé', null, 404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Utilisateur non trouvé', null, 404);
        }

        $data = $request->isJson() ? $request->json()->all() : $request->all();

        $validator = validator($data, (new UserRequest())->rules());

        if ($validator->fails()) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Erreur de validation', $validator->errors(), 422);
        }

        try {
            $user->update($validator->validated());
            return $this->jsonResponse(OrderStatus::SUCCESS, 'Utilisateur mis à jour avec succès', $user);
        } catch (\Exception $e) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Erreur lors de la mise à jour de l\'utilisateur', $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Utilisateur non trouvé', null, 404);
        }

        try {
            $user->delete();
            return $this->jsonResponse(OrderStatus::SUCCESS, 'Utilisateur supprimé avec succès', null, 204);
        } catch (\Exception $e) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Erreur lors de la suppression de l\'utilisateur', $e->getMessage(), 500);
        }
    }
}