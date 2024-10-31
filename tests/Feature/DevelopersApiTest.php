<?php

namespace Tests\Feature;

use Tests\TestCase;

class DevelopersApiTest extends TestCase
{
    public function testDevelopersApi(): void
    {
        $response = $this->get('/api/developers');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                ],
            ],
        ]);
    }
}
