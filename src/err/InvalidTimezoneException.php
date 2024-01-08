<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\intl\err;

use pvc\err\stock\LogicException;
use Throwable;

/**
 * Class InvalidTimezoneException
 */
class InvalidTimezoneException extends LogicException
{
    public function __construct(string $badTimezone, Throwable $previous = null)
    {
        parent::__construct($badTimezone, $previous);
    }
}
