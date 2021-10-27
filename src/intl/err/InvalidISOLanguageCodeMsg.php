<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version 1.0
 */

namespace pvc\intl\err;

use pvc\msg\ErrorExceptionMsg;

class InvalidISOLanguageCodeMsg extends ErrorExceptionMsg
{
    public function __construct(string $badLanguageCode)
    {
        $msgVars = [$badLanguageCode];
        $msgText = 'Invalid ISO language code specified (%s).';
        parent::__construct($msgVars, $msgText);
    }
}
