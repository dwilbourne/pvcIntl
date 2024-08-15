<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\intl;

use DateTimeZone;
use IntlDateFormatter;
use pvc\intl\err\InvalidCalendarTypeException;
use pvc\intl\err\InvalidDateTimeTypeException;

/**
 * Class IntlDateFrmtrFactory
 * a simple wrapper so that pvc exceptions are thrown for invalid arguments to the makeFrmtr method
 */
class IntlDateFrmtrFactory
{
    /**
     * @var int[]
     */
    protected static array $validDateTimeTypes = [
        IntlDateFormatter::NONE,
        IntlDateFormatter::FULL,
        IntlDateFormatter::LONG,
        IntlDateFormatter::MEDIUM,
        IntlDateFormatter::SHORT,
    ];

    /**
     * @var int[]
     * there are other calendars that the international date formatter will use, but they must be specified in the
     * locale.  See the documentation for the IntlDateFormatter class.
     */
    protected static array $validCalendarTypes = [
        IntlDateFormatter::TRADITIONAL,
        IntlDateFormatter::GREGORIAN,
    ];

    /**
     * makeFrmtr
     * @param Locale $locale
     * @param int $dateFormat
     * @param int $timeFormat
     * @param DateTimeZone $tz
     * @param int $calendar |null
     * @return IntlDateFormatter
     * @throws InvalidCalendarTypeException
     * @throws InvalidDateTimeTypeException
     */
    public static function makeFrmtr(
        Locale $locale,
        int $dateFormat,
        int $timeFormat,
        DateTimeZone $tz,
        int $calendar = null
    ): IntlDateFormatter {
        if (!in_array($dateFormat, self::$validDateTimeTypes)) {
            throw new InvalidDateTimeTypeException();
        }
        if (!in_array($timeFormat, self::$validDateTimeTypes)) {
            throw new InvalidDateTimeTypeException();
        }
        if (is_null($calendar)) {
            $calendar = IntlDateFormatter::GREGORIAN;
        }
        if (!in_array($calendar, self::$validCalendarTypes)) {
            throw new InvalidCalendarTypeException();
        }
        return new IntlDateFormatter((string)$locale, $dateFormat, $timeFormat, $tz, $calendar);
    }
}
