<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\intl\err;

use pvc\err\stock\LogicException;
use Throwable;

/**
 * Class InvalidLanguageCodeException
 */
class InvalidLanguageCodeException extends LogicException
{
    public function __construct(string $badLanguageCode, Throwable $prev = null)
    {
        parent::__construct($badLanguageCode, $prev);
    }
}