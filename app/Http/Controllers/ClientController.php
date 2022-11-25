<?php

namespace App\Http\Controllers;


use App\Http\Requests\Clients\ClientIndexRequest;
use App\Http\Resources\Clients\ClientIndexResource;
use App\Services\Clients\ClientService;

class ClientController extends Controller
{
    protected $service;

    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }

    public function getClients(ClientIndexRequest $request, $company_id)
    {
        return ClientIndexResource::collection(
            $this->service->getClients($request->validated(), $company_id)
        );
    }
}
