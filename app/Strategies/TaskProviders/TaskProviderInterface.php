<?php

namespace App\Strategies\TaskProviders;

use App\Adapters\TaskProviders\TaskProviderAdapterInterface;

interface TaskProviderInterface
{
    public function retrieveTasks();

    public function getProviderAdapter(array $data): TaskProviderAdapterInterface;
}
