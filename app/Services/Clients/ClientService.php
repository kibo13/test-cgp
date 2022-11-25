<?php

namespace App\Services\Clients;


use App\Exceptions\ObjectNotFoundException;
use App\Models\Client;
use App\Models\Company;

class ClientService
{
    protected $model;

    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    public function getClients($data, $companyId)
    {
        $perPage = data_get($data, 'per_page', 10);
        $company = Company::query()->find($companyId);

        if (! $company)
        {
            throw new ObjectNotFoundException('Запись не найдена');
        }

        return $company->clients()->paginate($perPage);
    }
}
