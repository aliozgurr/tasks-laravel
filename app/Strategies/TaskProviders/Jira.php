<?php

namespace App\Strategies\TaskProviders;

use App\Adapters\TaskProviders\JiraAdapter;
use App\Adapters\TaskProviders\TaskProviderAdapterInterface;
use Illuminate\Support\Facades\Http;

class Jira implements TaskProviderInterface
{
    public function retrieveTasks()
    {
        return Http::get('https://jsonblob.com/api/jsonBlob/1301320603813142528')->json();
    }

    public function getProviderAdapter(array $data): TaskProviderAdapterInterface
    {
        return new JiraAdapter($data);
    }
}
