<?php

namespace App\Strategies\TaskProviders;

use App\Adapters\TaskProviders\TaskProviderAdapterInterface;
use App\Adapters\TaskProviders\TrelloAdapter;
use Illuminate\Support\Facades\Http;

class Trello implements TaskProviderInterface
{

    public function retrieveTasks()
    {
        return Http::get(config('services.task_providers.trello'))->json();
    }

    public function getProviderAdapter(array $data): TaskProviderAdapterInterface
    {
        return new TrelloAdapter($data);
    }
}
