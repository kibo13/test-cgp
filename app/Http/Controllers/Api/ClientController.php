<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\ClientIndexRequest;
use App\Http\Resources\Clients\ClientIndexResource;
use App\Services\Clients\ClientService;
use Illuminate\Http\Request;

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
