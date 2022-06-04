<?php

declare(strict_types = 1);

namespace App\Errors;

class ValueException extends \Exception
{
    protected $message = "Value less than 80 or gress than 200";
}