<?php

namespace App\Enum;

enum TaskProviders: string
{
    case JIRA = 'jira';
    case TRELLO = 'trello';
}
