<?php

namespace App\Adapters\TaskProviders;

use App\Enum\TaskProviders;

readonly class JiraAdapter implements TaskProviderAdapterInterface
{
    public function __construct(private array $data)
    {
    }

    public function getTaskData(): array
    {
        return [
            'name' => 'Jira Task ' . $this->data['id'],
            'difficulty' => $this->data['value'],
            'duration' => $this->data['estimated_duration'],
            'provider' => TaskProviders::JIRA,
            'created_at' => now(),
        ];
    }
}
