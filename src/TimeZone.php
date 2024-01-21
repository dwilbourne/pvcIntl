<?php

declare(strict_types=1);

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

namespace pvc\intl;

use pvc\interfaces\intl\TimeZoneInterface;
use pvc\intl\err\InvalidTimezoneException;
use Symfony\Component\Intl\Timezones;

/**
 * Class TimeZone
 */
class TimeZone implements TimeZoneInterface
{
    /**
     * exists
     * @param string $tz
     * @return bool
     */
    public static function exists(string $tz): bool
    {
        return Timezones::exists($tz);
    }

    /**
     * getRawOffset
     * @param string $tz
     * @return int
     * @throws InvalidTimezoneException
     * the offset from GMT can vary based on the date because of daylight savings time.  If no second parameter is
     * supplied, the offset will be from the current date (e.g. the time function, which gets the current timestamp
     * on the host).  If you supply a timestamp, you get the offset on that day.
     */
    public static function getRawOffset(string $tz, int $timeStamp = null): int
    {
        if (!TimeZone::exists($tz)) {
            throw new InvalidTimezoneException($tz);
        }
        return Timezones::getRawOffset($tz, $timeStamp);
    }
}
