<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Companies\CompanyIndexRequest;
use App\Http\Resources\Companies\CompanyIndexResource;
use App\Services\Companies\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompanyController extends Controller
{
    protected $service;

    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    public function getCompanies(CompanyIndexRequest $request): AnonymousResourceCollection
    {
        return CompanyIndexResource::collection(
            $this->service->getCompanies($request->validated())
        );
    }

    public function getCompaniesByClientId(CompanyIndexRequest $request, $client_id): AnonymousResourceCollection
    {
        return CompanyIndexResource::collection(
            $this->service->getCompaniesByClientId($request->validated(), $client_id)
        );
    }
}
