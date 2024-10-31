<?php

namespace App\Services;

use App\Models\Sprint;
use App\Repositories\Sprint\SprintRepositoryInterface;
use Illuminate\Support\Collection;

class SprintService
{
    public function __construct(private readonly SprintRepositoryInterface $sprintRepository)
    {
    }

    public function createNewSprint($startDate = null): Sprint
    {
        return $this->sprintRepository->createNewSprint($startDate);
    }

    public function getSprints(): Collection
    {
        return $this->sprintRepository->getSprints();
    }
}
