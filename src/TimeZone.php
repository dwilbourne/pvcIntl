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
     */
    public static function getRawOffset(string $tz): int
    {
        if (!TimeZone::exists($tz)) {
            throw new InvalidTimezoneException($tz);
        }
        return Timezones::getRawOffset($tz);
    }
}
