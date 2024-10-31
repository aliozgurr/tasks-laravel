<?php

namespace App\Repositories\Sprint;

use App\Models\Sprint;
use Illuminate\Support\Collection;

interface SprintRepositoryInterface
{
    public function createNewSprint($startDate = null): Sprint;

    public function getSprints(): Collection;
}
