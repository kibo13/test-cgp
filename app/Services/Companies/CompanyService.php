<?php

namespace App\Services\Companies;


use App\Exceptions\ObjectNotFoundException;
use App\Models\Client;
use App\Models\Company;

class CompanyService
{
    protected $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }

    public function getCompanies($data)
    {
        $perPage = data_get($data, 'per_page', 10);

        return $this->model->query()->paginate($perPage);
    }

    public function getCompaniesByClientId($data, $clientId)
    {
        $perPage = data_get($data, 'per_page', 10);
        $client  = Client::query()->find($clientId);

        if (! $client)
        {
            throw new ObjectNotFoundException('Запись не найдена');
        }

        return $client->companies()->paginate($perPage);
    }
}
