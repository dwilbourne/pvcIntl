<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\intl\err;

use pvc\err\stock\LogicException;
use Throwable;

/**
 * Class InvalidLocaleException
 */
class InvalidLocaleException extends LogicException
{
    public function __construct(string $locale, Throwable $previous = null)
    {
        parent::__construct($locale, $previous);
    }
}
