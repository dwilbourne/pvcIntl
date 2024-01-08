<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

namespace pvcTests\intl;

use PHPUnit\Framework\TestCase;
use pvc\intl\CountryCodes;

class CountryCodesTest extends TestCase
{

    /**
     * testgetCountryCodesNames
     * @covers \pvc\intl\CountryCodes::getCountryCodesNames
     */
    public function testgetCountryCodesNames(): void
    {
        self::assertIsArray(CountryCodes::getCountryCodesNames());
        self::assertTrue(array_key_exists('US', CountryCodes::getCountryCodesNames()));
        self::assertTrue(in_array('United States', CountryCodes::getCountryCodesNames()));
    }

    /**
     * testCountryCodeIsValid
     * @covers \pvc\intl\CountryCodes::countryCodeIsValid
     */
    public function testCountryCodeIsValid(): void
    {
        self::assertTrue(CountryCodes::countryCodeIsValid('US'));
    }

    /**
     * testCountryCodeIsInvalid
     * @covers \pvc\intl\CountryCodes::countryCodeIsValid
     */
    public function testCountryCodeIsInvalid(): void
    {
        self::assertFalse(CountryCodes::countryCodeIsValid('foo'));
    }
}
