<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace pvcTests\intl;

use PHPUnit\Framework\TestCase;
use pvc\intl\err\InvalidLocaleException;
use pvc\intl\Locale;

class LocaleTest extends TestCase
{
    /**
     * testLocaleExistsSuccess
     * @covers \pvc\intl\Locale::exists
     */
    public function testLocaleExistsSuccess(): void
    {
        self::assertTrue(Locale::exists('en_US'));
    }

    /**
     * testLocaleExistsFailure
     * @covers \pvc\intl\Locale::exists
     */
    public function testLocaleExistsFailureOnLanguageCode(): void
    {
        self::assertFalse(Locale::exists('EN_US'));
    }

    /**
     * testLocaleExistsFailureOnCountryCode
     * @covers \pvc\intl\Locale::exists
     */
    public function testLocaleExistsFailureOnCountryCode(): void
    {
        self::assertFalse(Locale::exists('en_use'));
    }

    /**
     * testConstructSuccess
     * @covers \pvc\intl\Locale::__construct
     */
    public function testConstructSuccess(): void
    {
        self::assertInstanceOf(Locale::class, new Locale('en_US'));
    }

    /**
     * testContrustThrowsExceptionWithBadLocaleString
     * @covers \pvc\intl\Locale::__construct
     */
    public function testContrustThrowsExceptionWithBadLocaleString(): void
    {
        self::expectException(InvalidLocaleException::class);
        $locale = new Locale('foobar');
    }

    /**
     * testToString
     * @throws InvalidLocaleException
     * @covers \pvc\intl\Locale::__toString
     */
    public function testToString(): void
    {
        $testLocale = 'fr_CA';
        $locale = new Locale($testLocale);
        self::assertEquals($testLocale, (string)$locale);
    }
}
