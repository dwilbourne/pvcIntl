<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version 1.0
 */

namespace pvc\intl\err;

use pvc\msg\ErrorExceptionMsg;

class InvalidISOCountryCodeMsg extends ErrorExceptionMsg
{
    public function __construct(string $badCountryCode)
    {
        $msgVars = [$badCountryCode];
        $msgText = 'Invalid ISO country code specified (%s).';
        parent::__construct($msgVars, $msgText);
    }
}
