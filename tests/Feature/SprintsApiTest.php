<?php

namespace Tests\Feature;

use Tests\TestCase;

class SprintsApiTest extends TestCase
{
    public function testSprintsApi(): void
    {
        $response = $this->get('/api/sprints');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'start_date',
                    'end_date',
                ],
            ],
        ]);
    }
}
