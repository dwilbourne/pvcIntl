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
    /**
     * testExists
     * @covers \pvc\intl\TimeZone::exists
     */
    public function testExists() : void
    {
        $tzString = 'America/Los_Angeles';
        self::assertTrue(TimeZone::exists($tzString));

        $tzString = 'foo/bar';
        self::assertFalse(TimeZone::exists($tzString));
    }

    public function testGetRawOffset(): void
    {
        self::assertIsInt(TimeZone::getRawOffset('America/Los_Angeles'));
    }

    /**
     * testGetRawOffsetThrowsExceptionWithInvalidTimezone
     * @throws InvalidTimezoneException
     * @covers \pvc\intl\TimeZone::getRawOffset
     */
    public function testGetRawOffsetThrowsExceptionWithInvalidTimezone(): void
    {
        self::expectException(InvalidTimezoneException::class);
        TimeZone::getRawOffset('foobar');
    }

    /**
     * testGetRawOffsetWhereOffsetVaries
     * @throws InvalidTimezoneException
     * @covers \pvc\intl\TimeZone::getRawOffset
     */
    public function testGetRawOffsetWhereOffsetVaries(): void
    {
        $expectedResult = 3600;
        $actualResult = Timezone::getRawOffset('Europe/Madrid', strtotime('March 31, 2019'));
        self::assertEquals($expectedResult, $actualResult);

        $expectedResult = 7200;
        $actualResult = Timezone::getRawOffset('Europe/Madrid', strtotime('April 1, 2019'));
        self::assertEquals($expectedResult, $actualResult);
    }
}
