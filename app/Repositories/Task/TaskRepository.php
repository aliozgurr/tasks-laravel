<?php

namespace App\Repositories\Task;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class TaskRepository implements TaskRepositoryInterface
{
    public function getUnassignedTasks(): Collection
    {
        return Task::query()
            ->whereNull('developer_id')
            ->get();
    }

    public function assignTask($task, $developer, $sprint, $estimatedCompletionDate): void
    {
        $task->update([
            'developer_id' => $developer->id,
            'sprint_id' => $sprint->id,
            'estimated_completion_date' => $estimatedCompletionDate,
        ]);
    }

    public function getSprintTasks(?int $sprintId, ?int $developerId): Collection
    {
        return Task::query()
            ->when($sprintId, fn ($query, $sprintId) => $query->where('sprint_id', $sprintId))
            ->when($developerId, fn ($query, $developerId) => $query->where('developer_id', $developerId))
            ->with(['developer', 'sprint'])
            ->get();
    }

    public function getLatestFinishingTask(): Task
    {
        return Task::query()
            ->whereNotNull('estimated_completion_date')
            ->orderBy('estimated_completion_date', 'desc')
            ->first();
    }
}
