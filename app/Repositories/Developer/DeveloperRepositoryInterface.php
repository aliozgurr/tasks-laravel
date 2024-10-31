<?php

namespace App\Repositories\Developer;

use Illuminate\Database\Eloquent\Collection;

interface DeveloperRepositoryInterface
{
    public function getDevelopers(): Collection;
}
