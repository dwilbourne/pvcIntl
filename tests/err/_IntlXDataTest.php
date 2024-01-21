<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare (strict_types=1);

namespace pvcTests\intl\err;

use pvc\err\XDataTestMaster;
use pvc\intl\err\_IntlXData;

/**
 * Class _IntlXDataTest
 */
class _IntlXDataTest extends XDataTestMaster
{
    /**
     * @function testPvcIntlExceptionLibrary
     * @covers \pvc\intl\err\_IntlXData::getXMessageTemplates
     * @covers \pvc\intl\err\_IntlXData::getLocalXCodes
     * @covers \pvc\intl\err\InvalidLocaleException::__construct
     * @covers \pvc\intl\err\InvalidTimezoneException::__construct
     * @covers \pvc\intl\err\InvalidCharsetException::__construct
     * @covers \pvc\intl\err\InvalidCountryCodeException::__construct
     * @covers \pvc\intl\err\InvalidLanguageCodeException::__construct
     */
    public function testPvcIntlExceptionLibrary(): void
    {
        $xData = new _IntlXData();
        self::assertTrue($this->verifylibrary($xData));
    }
}