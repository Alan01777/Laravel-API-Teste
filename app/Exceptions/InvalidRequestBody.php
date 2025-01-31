<?php

namespace App\Exceptions;
use Exception;

class InvalidRequestBody extends Exception
{
    public function __construct($message = 'Invalid Request Body', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render()
    {
        return response()->json([
            'error' => $this->getMessage(),
        ], 400);
    }
}
