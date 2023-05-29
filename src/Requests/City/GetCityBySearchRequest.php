<?php

namespace FelipeVa\ApiColombia\Requests\City;

use FelipeVa\ApiColombia\Objects\City;
use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Responses\City\GetAllCityResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

final class GetCityBySearchRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected string $searchValue)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/City/search/$this->searchValue";
    }

    /**
     * @return Listed<City>
     */
    public function createDtoFromResponse(Response $response): Listed
    {
        return GetAllCityResponse::make($response);
    }
}
