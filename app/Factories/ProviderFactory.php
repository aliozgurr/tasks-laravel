<?php

namespace App\Factories;

use App\Enum\TaskProviders;
use App\Strategies\TaskProviders\Jira;
use App\Strategies\TaskProviders\TaskProviderInterface;
use App\Strategies\TaskProviders\Trello;
use Exception;

class ProviderFactory
{
    /**
     * @throws Exception
     */
    public function getTaskProvider(TaskProviders $provider): TaskProviderInterface
    {
        return match ($provider) {
            TaskProviders::JIRA => new Jira(),
            TaskProviders::TRELLO => new Trello(),
            default => throw new Exception('Invalid task provider'),
        };
    }
}
