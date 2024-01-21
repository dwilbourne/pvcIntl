<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\intl\err;

use pvc\err\stock\LogicException;
use Throwable;

/**
 * Class InvalidCountryCodeException
 */
class InvalidCountryCodeException extends LogicException
{
    public function __construct(string $badCountryCode, Throwable $prev = null)
    {
        parent::__construct($badCountryCode, $prev);
    }
}