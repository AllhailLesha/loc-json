<?php

namespace App\Exceptions\Project;

use Exception;

class NotFoundException extends Exception
{
    protected $message = "Project not found";

}
