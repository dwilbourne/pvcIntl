<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @noinspection PhpCSValidationInspection
 */

declare (strict_types=1);

namespace pvc\intl\err;

use pvc\err\XDataAbstract;

/**
 * Class _HtmlXData
 */
class _IntlXData extends XDataAbstract
{

    public function getLocalXCodes(): array
    {
        return [
            InvalidLocaleException::class => 1000,
            InvalidTimezoneException::class => 1001,
        ];
    }

    public function getXMessageTemplates(): array
    {
        return [
            InvalidLocaleException::class => 'Invalid locale string: ${locale}',
            InvalidTimezoneException::class => 'Invalid timezone: ${badTimezone}',
        ];
    }
}