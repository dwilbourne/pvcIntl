<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace tests\intl;

use PHPUnit\Framework\TestCase;
use pvc\intl\err\InvalidISOCountryCodeMsg;
use pvc\intl\IsoCountryCodes;

class ISOCountryCodesTest extends TestCase
{
    protected IsoCountryCodes $countryCodes;

    public function setUp(): void
    {
        $this->countryCodes = new IsoCountryCodes();
    }

    public function testValidateCode(): void
    {
        self::assertFalse($this->countryCodes->validateCountryCode('ZZ'));
        self::assertTrue($this->countryCodes->getErrMsg() instanceof InvalidISOCountryCodeMsg);
        self::assertTrue($this->countryCodes->validateCountryCode('US'));
        self::assertNull($this->countryCodes->getErrMsg());
    }

    public function testGetCountryCodes(): void
    {
        self::assertTrue(0 < count($this->countryCodes->getCountryCodes()));
    }

    public function testGetCountryCodeFromCountry(): void
    {
        self::assertEquals('US', $this->countryCodes->getCountryCodeFromCountry('United States'));
    }
}
