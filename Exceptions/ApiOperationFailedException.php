<?php

namespace App\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\Response;

class ApiOperationFailedException extends Exception
{
    public mixed $data;

    /**
     * ApiOperationFailedException constructor.
     *
     * @param  Exception  $previous
     */
    #[Pure]
    public function __construct(string $message = '', int $code = 0, Exception $previous = null, $data = null)
    {
        if ($code == 0) {
            $code = Response::HTTP_BAD_REQUEST;
        }
        parent::__construct($message, $code, $previous);
        $this->data = $data;
    }
}
