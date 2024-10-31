<?php

namespace App\Services;

use App\Repositories\Developer\DeveloperRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class DeveloperService
{
    public function __construct(private readonly DeveloperRepositoryInterface $developerRepository)
    {
    }

    public function getDevelopers(): Collection
    {
        return $this->developerRepository->getDevelopers();
    }
}
