<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version 1.0
 */

namespace pvc\intl\err;

use pvc\msg\ErrorExceptionMsg;

class InvalidCharsetMsg extends ErrorExceptionMsg
{
    public function __construct(string $badCharset)
    {
        $msgVars = [$badCharset];
        $msgText = 'Invalid charset specified (%s).';
        parent::__construct($msgVars, $msgText);
    }
}
