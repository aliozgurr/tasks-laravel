<?php

namespace App\Adapters\TaskProviders;

use App\Enum\TaskProviders;

readonly class TrelloAdapter implements TaskProviderAdapterInterface
{
    public function __construct(private array $data)
    {
    }

    public function getTaskData(): array
    {
        return [
            'name' => 'Trello Task ' . $this->data['id'],
            'difficulty' => $this->data['sure'],
            'duration' => $this->data['zorluk'],
            'provider' => TaskProviders::TRELLO,
            'created_at' => now(),
        ];
    }
}
