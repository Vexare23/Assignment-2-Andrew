<?php
declare(strict_types=1);
namespace App\Exception;

class ConnectionException extends \Exception
{
    public function __construct($message, \Throwable $previous = null)
    {
        parent::__contruct('There was a connection issue with MySQL', 0, $previous);
    }
}
