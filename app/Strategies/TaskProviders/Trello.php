<?php

namespace App\Strategies\TaskProviders;

use App\Adapters\TaskProviders\TaskProviderAdapterInterface;
use App\Adapters\TaskProviders\TrelloAdapter;
use Illuminate\Support\Facades\Http;

class Trello implements TaskProviderInterface
{

    public function retrieveTasks()
    {
        return Http::get('https://jsonblob.com/api/jsonBlob/1301321241334767616')->json();
    }

    public function getProviderAdapter(array $data): TaskProviderAdapterInterface
    {
        return new TrelloAdapter($data);
    }
}
