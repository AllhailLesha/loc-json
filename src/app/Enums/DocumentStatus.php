<?php

namespace App\Enums;

enum DocumentStatus: string
{
    case CREATE = 'create';

    case IN_PROGRESS = 'in progress';

    case COMPLETED = 'completed';
}
