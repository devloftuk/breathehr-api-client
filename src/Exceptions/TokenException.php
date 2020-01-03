<?php

namespace devloft\Breathe\Exceptions;

use Exception;

class TokenException extends Exception
{
    /**
     * TokenException constructor.
     */
    public function __construct()
    {
        parent::__construct(sprintf('You must set an API token under BREATHE_API_TOKEN in your .env.'));
    }
}
