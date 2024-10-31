<?php

namespace App\Adapters\TaskProviders;

interface TaskProviderAdapterInterface
{
    public function getTaskData(): array;
}
