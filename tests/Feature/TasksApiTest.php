<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TasksApiTest extends TestCase
{
    public function testSprintTasksApi(): void
    {
        $sprintId = DB::table('sprints')->value('id');

        $response = $this->get("/api/sprints/{$sprintId}/tasks");

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'difficulty',
                    'duration',
                    'estimated_completion_date',
                    'provider_name',
                    'developer_name',
                    'sprint_name',
                ],
            ],
        ]);
    }
}
