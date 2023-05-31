<?php

namespace App\Domains\Desks\Actions;

use Satubaldeeva\DesksClient\Api\DesksApi;
use Satubaldeeva\DesksClient\Dto\SearchDesksRequest;

class SearchDesksAction
{
    public function __construct(protected DesksApi $desksApi)
    {
    }

    public function execute(array $request): array
    {

        $data = $this->desksApi->searchDesks(new SearchDesksRequest($request))->getData();
        return $data;
    }
}
