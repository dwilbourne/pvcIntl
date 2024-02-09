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
    protected string $tzString;

    /**
     * getTimeZoneString
     * @return string
     */
    public function getTimeZoneString(): string
    {
        return $this->tzString ?? date_default_timezone_get();
    }

    /**
     * setTimeZoneString
     * @param string $tzString
     * @throws InvalidTimezoneException
     */
    public function setTimeZoneString(string $tzString): void
    {
        if (!$this->exists($tzString)) {
            throw new InvalidTimezoneException($tzString);
        }
        $this->tzString = $tzString;
    }

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
     * __toString
     * @return string
     */
    public function __toString(): string
    {
        return $this->getTimeZoneString();
    }

    /**
     * getRawOffset
     * @param int|null $timeStamp
     * @return int
     * @throws InvalidTimezoneException
     * the offset from GMT can vary based on the date because of daylight savings time.  If no parameter is
     * supplied, the offset will be from the current date (e.g. the time function, which gets the current timestamp
     * on the host).  If you supply a timestamp, you get the offset on that day.
     */
    public function getRawOffset(int $timeStamp = null): int
    {
        return Timezones::getRawOffset($this->getTimeZoneString(), $timeStamp);
    }
}
