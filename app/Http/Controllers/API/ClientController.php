<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\DB;
use App\Enums\OrderStatus;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return Client::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->isJson() ? $request->json()->all() : $request->all();

        $validator = validator($data, (new ClientRequest())->rules());

        if ($validator->fails()) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Erreur de validation', $validator->errors(), 422);
        }

        DB::beginTransaction();

        try {
            $client = Client::create($validator->validated());
            DB::commit();
            return $this->jsonResponse(OrderStatus::SUCCESS, 'Client créé avec succès', $client, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->jsonResponse(OrderStatus::ECHEC, 'Erreur lors de la création du client', $e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        $client = Client::find($id);
        if ($client) {
            return $this->jsonResponse(OrderStatus::SUCCESS, 'Client trouvé', $client);
        } else {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Client non trouvé', null, 404);
        }
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        if (!$client) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Client non trouvé', null, 404);
        }

        $data = $request->isJson() ? $request->json()->all() : $request->all();

        $validator = validator($data, (new ClientRequest())->rules());

        if ($validator->fails()) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Erreur de validation', $validator->errors(), 422);
        }

        try {
            $client->update($validator->validated());
            return $this->jsonResponse(OrderStatus::SUCCESS, 'Client mis à jour avec succès', $client);
        } catch (\Exception $e) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Erreur lors de la mise à jour du client', $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        if (!$client) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Client non trouvé', null, 404);
        }

        try {
            $client->delete();
            return $this->jsonResponse(OrderStatus::SUCCESS, 'Client supprimé avec succès', null, 204);
        } catch (\Exception $e) {
            return $this->jsonResponse(OrderStatus::ECHEC, 'Erreur lors de la suppression du client', $e->getMessage(), 500);
        }
    }
}