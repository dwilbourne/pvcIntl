<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\intl\err;

use pvc\err\stock\LogicException;
use Throwable;

/**
 * Class InvalidCharsetException
 */
class InvalidCharsetException extends LogicException
{
    public function __construct(string $badCharset, Throwable $prev = null)
    {
        parent::__construct($badCharset, $prev);
    }
}