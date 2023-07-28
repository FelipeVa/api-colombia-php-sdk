<?php

namespace FelipeVa\ApiColombia\Requests\President;

use FelipeVa\ApiColombia\Objects\Listed;
use FelipeVa\ApiColombia\Objects\President;
use FelipeVa\ApiColombia\Responses\President\GetAllPresidentResponse;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

final class GetPresidentByYearRequest extends Request
{
    use AlwaysThrowOnErrors;

    protected Method $method = Method::GET;

    public function __construct(protected int $year)
    {

    }

    public function resolveEndpoint(): string
    {
        return "/President/year/$this->year";
    }

    /**
     * @return Listed<President>
     */
    public function createDtoFromResponse(Response $response): Listed
    {
        return GetAllPresidentResponse::make($response);
    }
}
