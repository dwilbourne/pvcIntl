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
    protected Locale $locale;

    public function setUp(): void
    {
        $this->locale = new Locale();
    }

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
    public function testLocaleExistsCanonicalizesBeforeTesting(): void
    {
        self::assertTrue(Locale::exists('EN_US'));
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
     * testContrustThrowsExceptionWithBadLocaleString
     * @covers \pvc\intl\Locale::setLocaleString
     */
    public function testSetterThrowsExceptionWithBadLocaleString(): void
    {
        self::expectException(InvalidLocaleException::class);
        $this->locale->setLocaleString('foobar');
    }

    /**
     * testSetGetLocaleString
     * @throws InvalidLocaleException
     * @covers \pvc\intl\Locale::setLocaleString
     * @covers \pvc\intl\Locale::getLocaleString
     */
    public function testSetGetLocaleString(): void
    {
        $testString = 'fr_CA';
        $this->locale->setLocaleString($testString);
        self::assertEquals($testString, $this->locale->getLocaleString());
    }

    /**
     * testGetterReturnsDefaultLocaleIfNotExplicitlyInitialized
     * @covers \pvc\intl\Locale::getLocaleString
     */
    public function testGetterReturnsDefaultLocaleIfNotExplicitlyInitialized(): void
    {
        self::assertEquals(\Locale::getDefault(), $this->locale->getLocaleString());
    }

    /**
     * testToString
     * @throws InvalidLocaleException
     * @covers \pvc\intl\Locale::__toString
     */
    public function testToString(): void
    {
        $testLocale = 'fr_CA';
        $this->locale->setLocaleString($testLocale);
        self::assertEquals($testLocale, (string)$this->locale);
    }
}
