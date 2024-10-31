<?php

namespace App\Http\Controllers\Api\Developer;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeveloperResource;
use App\Services\DeveloperService;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function __invoke(DeveloperService $developerService)
    {
        return DeveloperResource::collection($developerService->getDevelopers());
    }
}
