<?php

namespace App\Http\Controllers\Api\Sprint;

use App\Http\Controllers\Controller;
use App\Http\Resources\SprintTaskResource;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SprintTaskController extends Controller
{
    public function __invoke(Request $request, int $sprintId, TaskService $taskService): AnonymousResourceCollection
    {
        $request->validate([
            'developer_id' => 'nullable|integer|exists:developers,id',
        ]);

        return SprintTaskResource::collection($taskService->getSprintTasks($sprintId, $request->developer_id));
    }
}
