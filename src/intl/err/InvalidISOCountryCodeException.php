<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version 1.0
 */

namespace pvc\intl\err;

use pvc\err\throwable\ErrorExceptionConstants as ec;
use pvc\err\throwable\exception\stock_rebrands\ErrorException;
use pvc\err\throwable\Throwable;

class InvalidISOCountryCodeException extends ErrorException
{
    public function __construct(string $badISOCountryCode, Throwable $previous = null)
    {
        $msg = new InvalidISOCountryCodeMsg($badISOCountryCode);
        $code = ec::INVALID_ISO_COUNTRY_CODE_EXCEPTION;
        parent::__construct($msg, $code, $previous);
    }
}
