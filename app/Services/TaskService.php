<?php

namespace App\Services;

use App\Models\Task;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public function __construct(private readonly TaskRepositoryInterface $taskRepository)
    {
    }

    public function getUnassignedTasks(): Collection
    {
        return $this->taskRepository->getUnassignedTasks();
    }

    public function assignTask($task, $developer, $sprint, $estimatedHours): void
    {
        $this->taskRepository->assignTask($task, $developer, $sprint, $estimatedHours);
    }

    public function getSprintTasks(?int $sprintId, ?int $developerId): Collection
    {
        return $this->taskRepository->getSprintTasks($sprintId, $developerId);
    }

    public function getLatestFinishingTask(): ?Task
    {
        return $this->taskRepository->getLatestFinishingTask();
    }
}
