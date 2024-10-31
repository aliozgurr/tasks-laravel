<?php

namespace App\Repositories\Sprint;

use App\Models\Sprint;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class SprintRepository implements SprintRepositoryInterface
{
    public function createNewSprint($startDate = null): Sprint
    {
        return Sprint::create([
            'start_date' => $startDate ?? Carbon::now(),
            'end_date' => Carbon::parse($startDate ?? Carbon::now())->addDays(7)
        ]);
    }

    public function getSprints(): Collection
    {
        return Sprint::query()
            ->get();
    }
}
