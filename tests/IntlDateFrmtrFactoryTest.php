<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\intl;

use IntlDateFormatter;
use PHPUnit\Framework\TestCase;
use pvc\intl\err\InvalidCalendarTypeException;
use pvc\intl\err\InvalidDateTimeTypeException;
use pvc\intl\IntlDateFrmtrFactory;
use pvc\intl\Locale;
use pvc\intl\TimeZone;

class IntlDateFrmtrFactoryTest extends TestCase
{
    protected Locale $locale;

    protected int $goodDateTimeType = IntlDateFormatter::SHORT;

    protected int $badDateTimeType = 9;

    protected TimeZone $tz;

    protected int $goodCalendarType = IntlDateFormatter::TRADITIONAL;

    protected int $badCalendarType = 4;

    public function setUp(): void
    {
        $this->locale = new Locale();
        $this->tz = new TimeZone();
    }

    /**
     * testValidateDateTimeTypesSucceeds
     * @throws InvalidDateTimeTypeException
     * @throws InvalidCalendarTypeException
     * @covers \pvc\intl\IntlDateFrmtrFactory::makeFrmtr
     */
    public function testValidateDateTimeTypesSucceeds(): void
    {
        $frmtr = IntlDateFrmtrFactory::makeFrmtr(
            $this->locale,
            $this->goodDateTimeType,
            $this->goodDateTimeType,
            $this->tz
        );
        self::assertInstanceOf(IntlDateFormatter::class, $frmtr);
    }

    /**
     * testValidateDateTimeTypeFailsWithBadDateFormat
     * @throws InvalidDateTimeTypeException
     * @throws InvalidCalendarTypeException
     * @covers \pvc\intl\IntlDateFrmtrFactory::makeFrmtr
     */
    public function testValidateDateTimeTypeFailsWithBadDateFormat(): void
    {
        self::expectException(InvalidDateTimeTypeException::class);
        $frmtr = IntlDateFrmtrFactory::makeFrmtr(
            $this->locale,
            $this->badDateTimeType,
            $this->goodDateTimeType,
            $this->tz
        );
        unset($frmtr);
    }

    /**
     * testValidateDateTimeTypeFailsWithBadTimeFormat
     * @throws InvalidDateTimeTypeException
     * @throws InvalidCalendarTypeException
     * @covers \pvc\intl\IntlDateFrmtrFactory::makeFrmtr
     */
    public function testValidateDateTimeTypeFailsWithBadTimeFormat(): void
    {
        self::expectException(InvalidDateTimeTypeException::class);
        $frmtr = IntlDateFrmtrFactory::makeFrmtr(
            $this->locale,
            $this->goodDateTimeType,
            $this->badDateTimeType,
            $this->tz
        );
        unset($frmtr);
    }

    /**
     * testValidateCalendarTypeSucceedsWithGoodCalendarType
     * @throws InvalidDateTimeTypeException
     * @throws InvalidCalendarTypeException
     * @covers \pvc\intl\IntlDateFrmtrFactory::makeFrmtr
     */
    public function testValidateCalendarTypeSucceedsWithGoodCalendarType(): void
    {
        $frmtr = IntlDateFrmtrFactory::makeFrmtr(
            $this->locale,
            $this->goodDateTimeType,
            $this->goodDateTimeType,
            $this->tz,
            $this->goodCalendarType
        );
        self::assertInstanceOf(IntlDateFormatter::class, $frmtr);
    }

    /**
     * testValidateCalendarTypeSucceedsWithBadCalendarType
     * @throws InvalidCalendarTypeException
     * @throws InvalidDateTimeTypeException
     * @covers \pvc\intl\IntlDateFrmtrFactory::makeFrmtr
     */
    public function testValidateCalendarTypeFailsWithBadCalendarType(): void
    {
        self::expectException(InvalidCalendarTypeException::class);

        $frmtr = IntlDateFrmtrFactory::makeFrmtr(
            $this->locale,
            $this->goodDateTimeType,
            $this->goodDateTimeType,
            $this->tz,
            $this->badCalendarType
        );
        unset($frmtr);
    }
}
