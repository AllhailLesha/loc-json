<?php

namespace App\Exceptions\Document;

use Exception;

class NotFoundException extends Exception
{
    protected $message = "Document not found";
}
