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
            InvalidCountryCodeException::class => 1002,
            InvalidLanguageCodeException::class => 1003,
            InvalidCharsetException::class => 1004,
            InvalidDateTimeTypeException::class => 1005,
            InvalidCalendarTypeException::class => 1006,
        ];
    }

    public function getXMessageTemplates(): array
    {
        return [
            InvalidLocaleException::class => 'Invalid locale string: ${locale}',
            InvalidTimezoneException::class => 'Invalid timezone: ${badTimezone}',
            InvalidCountryCodeException::class => 'Invalid country code: ${badCountryCode}',
            InvalidLanguageCodeException::class => 'Invalid language code: ${badLanguageCode}',
            InvalidCharsetException::class => 'Invalid charset: ${badCharset}',
            InvalidDateTimeTypeException::class => 'Invalid Date Type / Time Type - see the IntlDateFormatter documentation',
            InvalidCalendarTypeException::class => 'Invalid calendar type - see the IntlDateFormatter documentation',
        ];
    }
}