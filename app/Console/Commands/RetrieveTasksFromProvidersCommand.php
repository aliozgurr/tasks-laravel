<?php

namespace App\Console\Commands;

use App\Enum\TaskProviders;
use App\Factories\ProviderFactory;
use App\Models\Task;
use App\Strategies\TaskProviders\TaskProviderInterface;
use Illuminate\Console\Command;

class RetrieveTasksFromProvidersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'retrieve-tasks-from-providers-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieves tasks from current providers and bulk inserts them into the database.';

    public function __construct(private readonly ProviderFactory $providerFactory)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @throws \Exception
     */
    public function handle()
    {
        $tasksToBeBulkInserted = collect();

        foreach (TaskProviders::cases() as $provider) {
            $provider = $this->providerFactory->getTaskProvider($provider);

            foreach ($provider->retrieveTasks() as $task) {
                $adapter = $provider->getProviderAdapter($task);

                $tasksToBeBulkInserted->push($adapter->getTaskData());
            }
        }

        Task::insert($tasksToBeBulkInserted->toArray());

        return Command::SUCCESS;
    }
}
