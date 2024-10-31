<?php

namespace App\Http\Controllers\Api\Sprint;

use App\Http\Controllers\Controller;
use App\Http\Resources\SprintListResource;
use App\Services\SprintService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SprintController extends Controller
{
    public function __invoke(SprintService $sprintService): AnonymousResourceCollection
    {
        return SprintListResource::collection($sprintService->getSprints());
    }
}
