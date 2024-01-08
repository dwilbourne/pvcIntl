<?php

declare(strict_types=1);

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

namespace pvc\intl;

use pvc\interfaces\intl\CountryCodesInterface;
use Symfony\Component\Intl\Countries;

/**
 * Class CountryCodes
 */
class CountryCodes implements CountryCodesInterface
{
    /**
     * countryCodeIsValid
     * @param string $code
     * @return bool
     */
    public static function countryCodeIsValid(string $code): bool
    {
        return array_key_exists($code, self::getCountryCodesNames());
    }

    /**
     * getCountryCodesNames
     * @return array<string, string>
     */
    public static function getCountryCodesNames(): array
    {
        return Countries::getNames();
    }
}
