<?php

namespace App\Repositories\Task;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public function getUnassignedTasks(): Collection;

    public function assignTask($task, $developer, $sprint, $estimatedCompletionDate): void;

    public function getSprintTasks(?int $sprintId, ?int $developerId): Collection;

    public function getLatestFinishingTask(): ?Task;
}
