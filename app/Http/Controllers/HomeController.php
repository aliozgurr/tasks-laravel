<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(TaskService $taskService)
    {
        return view('home')->with([
            'latestFinishingTask' => $taskService->getLatestFinishingTask(),
        ]);
    }
}
