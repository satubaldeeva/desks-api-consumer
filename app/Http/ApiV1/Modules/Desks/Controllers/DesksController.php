<?php

namespace App\Http\ApiV1\Modules\Desks\Controllers;

use App\Domains\Desks\Actions\SearchDesksAction;
use App\Http\ApiV1\Modules\Desks\Requests\SearchDesksRequest;
use App\Http\ApiV1\Modules\Desks\Resources\DeskResource;

class DesksController
{
    public function search(SearchDesksRequest $request, SearchDesksAction $action){
        return DeskResource::collection($action->execute($request->validated()));
    }
}
