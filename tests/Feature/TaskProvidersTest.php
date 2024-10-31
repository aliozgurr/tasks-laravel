<?php

namespace Tests\Feature;

use App\Services\TaskService;
use Psy\Command\Command;
use Tests\TestCase;

class TaskProvidersTest extends TestCase
{
    public function testRetrieveTasksFromProviders(): void
    {
        $this->artisan('retrieve-tasks-from-providers-command')
            ->assertExitCode(Command::SUCCESS);
    }

    public function testAssignUnassignedTasks(): void
    {
        $this->artisan('assign-unassigned-tasks-command')
            ->assertExitCode(Command::SUCCESS);

        /** @var TaskService $taskService */
        $taskService = app(TaskService::class);
        $unassignedTasks = $taskService->getUnassignedTasks();

        $this->assertCount(0, $unassignedTasks);
    }
}
