<?php

namespace App\Console\Commands;

use App\Models\Developer;
use App\Models\Sprint;
use App\Services\DeveloperService;
use App\Services\SprintService;
use App\Services\TaskService;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class AssignUnassignedTasksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign-unassigned-tasks-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign unassigned tasks to developers.';

    public function __construct(
        private readonly TaskService      $taskService,
        private readonly DeveloperService $developerService,
        private readonly SprintService    $sprintService
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $unassignedTasks = $this->taskService->getUnassignedTasks();
        $developers = $this->developerService->getDevelopers();

        $sprint = $this->sprintService->createNewSprint();
        $sprintStart = Carbon::parse($sprint->start_date)->next(Carbon::MONDAY)->setHour(9);

        foreach ($unassignedTasks as $task) {
            $taskAssigned = false;

            while (!$taskAssigned) {
                /** @var Developer $developer */
                foreach ($developers as $developer) {
                    $taskFinishRateForDifficulty = $task->difficulty / $developer->difficulty_handling * $task->duration;

                    $currentWorkloadHour = $developer->currentWorkLoadHour($sprint->id);

                    $start = $sprintStart->clone();
                    $end = $start->addHours($taskFinishRateForDifficulty);

                    if ($end->hour > 17) {
                        $extraHours = $end->hour - 17;
                        $end->addDay()->setHour(9 + $extraHours);
                    } elseif ($end->hour < 9) {
                        $end->setHour(9);
                    }

                    while ($end->isWeekend()) {
                        $end->addDay()->setHour(9);
                    }

                    if ($developer->weekly_working_hours >= $currentWorkloadHour + $taskFinishRateForDifficulty) {
                        $this->taskService->assignTask($task, $developer, $sprint, $end);
                        $sprintStart = $end;
                        $taskAssigned = true;
                        break;
                    }
                }

                if (!$taskAssigned) {
                    $sprint = $this->sprintService->createNewSprint();
                    $sprintStart = Carbon::parse($sprint->start_date)->next(Carbon::MONDAY)->setHour(9);
                }
            }
        }
    }
}
