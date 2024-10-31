<?php

namespace App\Strategies\TaskProviders;

use App\Adapters\TaskProviders\JiraAdapter;
use App\Adapters\TaskProviders\TaskProviderAdapterInterface;
use Illuminate\Support\Facades\Http;

class Jira implements TaskProviderInterface
{
    public function retrieveTasks()
    {
        return Http::get(config('services.task_providers.jira'))->json();
    }

    public function getProviderAdapter(array $data): TaskProviderAdapterInterface
    {
        return new JiraAdapter($data);
    }
}
