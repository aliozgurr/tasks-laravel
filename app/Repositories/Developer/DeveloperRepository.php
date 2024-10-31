<?php

namespace App\Repositories\Developer;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Collection;

class DeveloperRepository implements DeveloperRepositoryInterface
{

    public function getDevelopers(): Collection
    {
        return Developer::query()
            ->with('tasks')
            ->get();
    }
}
