<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developers = [
            [
                'name' => 'Developer 1',
                'difficulty_handling' => 1,
            ],
            [
                'name' => 'Developer 2',
                'difficulty_handling' => 2,
            ],
            [
                'name' => 'Developer 3',
                'difficulty_handling' => 3,
            ],
            [
                'name' => 'Developer 4',
                'difficulty_handling' => 4,
            ],
            [
                'name' => 'Developer 5',
                'difficulty_handling' => 5,
            ],
        ];

        foreach ($developers as $developer) {
            DB::table('developers')->insert($developer);
        }
    }
}
