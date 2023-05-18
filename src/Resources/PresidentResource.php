<?php

namespace FelipeVa\ApiColombia\Resources;

use FelipeVa\ApiColombia\Requests\City\GetCityByNameRequest;
use FelipeVa\ApiColombia\Requests\City\GetCityBySearchRequest;
use FelipeVa\ApiColombia\Requests\City\GetPagedCityRequest;
use FelipeVa\ApiColombia\Requests\President\GetAllPresidentRequest;
use FelipeVa\ApiColombia\Requests\President\GetPagedPresidentRequest;
use FelipeVa\ApiColombia\Requests\President\GetPresidentByNameRequest;
use FelipeVa\ApiColombia\Requests\President\GetPresidentBySearchRequest;
use FelipeVa\ApiColombia\Requests\President\GetPresidentRequest;
use Saloon\Contracts\Response;

class PresidentResource extends Resource
{
    public function all(): Response
    {
        return $this->connector->send(new GetAllPresidentRequest());
    }

    public function get(int $presidentId): Response
    {
        return $this->connector->send(new GetPresidentRequest($presidentId));
    }

    public function getByName(string $presidentName): Response
    {
        return $this->connector->send(new GetPresidentByNameRequest($presidentName));
    }

    public function search(string $searchValue): Response
    {
        return $this->connector->send(new GetPresidentBySearchRequest($searchValue));
    }

    public function paged(int $page, int $pageSize): Response
    {
        return $this->connector->send(new GetPagedPresidentRequest($page, $pageSize));
    }
}
