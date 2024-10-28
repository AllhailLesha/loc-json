<?php

namespace App\Exceptions\Account;

use Exception;

class NotAccessToOperationException extends Exception
{
    protected $message = "Not access to operation";
}
