<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

namespace pvcTests\intl;

use PHPUnit\Framework\TestCase;
use pvc\intl\err\InvalidTimezoneException;
use pvc\intl\TimeZone;

/**
 * Class TimezoneTest
 */
class TimezoneTest extends TestCase
{
    protected string $goodTzString = 'Europe/Madrid';

    protected string $badTzString = 'foo/bar';

    protected TimeZone $timeZone;

    public function setUp(): void
    {
        $this->timeZone = new TimeZone();
    }

    /**
     * testSetTimeZoneStringThrowsExceptionWithBadTimeZone
     * @throws InvalidTimezoneException
     * @covers \pvc\intl\TimeZone::setTimeZoneString
     */
    public function testSetTimeZoneStringThrowsExceptionWithBadTimeZone(): void
    {
        self::expectException(InvalidTimezoneException::class);
        $this->timeZone->setTimeZoneString($this->badTzString);
    }

    /**
     * testGetTimeZoneStringReturnsDefaultIfNotExplicitlySet
     * @covers \pvc\intl\TimeZone::getTimeZoneString
     */
    public function testGetTimeZoneStringReturnsDefaultIfNotExplicitlySet(): void
    {
        self::assertEquals(date_default_timezone_get(), $this->timeZone->getTimeZoneString());
    }

    /**
     * testSetGetTimeZoneString
     * @throws InvalidTimezoneException
     * @covers \pvc\intl\TimeZone::setTimeZoneString
     * @covers \pvc\intl\TimeZone::getTimeZoneString
     */
    public function testSetGetTimeZoneString(): void
    {
        $this->timeZone->setTimeZoneString($this->goodTzString);
        self::assertEquals($this->goodTzString, $this->timeZone->getTimeZoneString());
    }

    /**
     * testExistsMethodReturnsTrueOnGoodTimeZone
     * @covers \pvc\intl\TimeZone::exists
     */
    public function testExistsMethodReturnsTrueOnGoodTimeZone(): void
    {
        self::assertTrue($this->timeZone::exists($this->goodTzString));
    }

    /**
     * testExistsReturnsFalseOnBadTimeZone
     * @covers \pvc\intl\TimeZone::exists
     */
    public function testExistsReturnsFalseOnBadTimeZone(): void
    {
        self::assertFalse($this->timeZone::exists($this->badTzString));
    }


    public function testGetRawOffset(): void
    {
        /** leave the parameter empty so the offset returned is as of today */
        self::assertIsInt($this->timeZone->getRawOffset());
    }

    /**
     * testGetRawOffsetWhereOffsetVaries
     * @throws InvalidTimezoneException
     * @covers \pvc\intl\TimeZone::getRawOffset
     */
    public function testGetRawOffsetWhereOffsetVaries(): void
    {
        $this->timeZone->setTimeZoneString($this->goodTzString);

        $expectedResult = 3600;
        $actualResult = $this->timeZone->getRawOffset(strtotime('March 31, 2019'));
        self::assertEquals($expectedResult, $actualResult);

        $expectedResult = 7200;
        $actualResult = $this->timeZone->getRawOffset(strtotime('April 1, 2019'));
        self::assertEquals($expectedResult, $actualResult);
    }

    /**
     * testToString
     * @covers \pvc\intl\TimeZone::__toString
     */
    public function testToString(): void
    {
        self::assertIsString((string)$this->timeZone);
    }
}
