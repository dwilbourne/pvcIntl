<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\intl;

use pvc\interfaces\intl\LocaleInterface;
use pvc\intl\err\InvalidLocaleException;
use Symfony\Component\Intl\Locales;

/**
 * Class Locale.
 */
class Locale implements LocaleInterface
{
    public function __construct(protected string $localeString)
    {
    }

    /**
     * exists
     * @param string $locale
     * @return bool
     */
    public static function exists(string $locale): bool
    {
        return Locales::exists(\Locale::canonicalize($locale) ?? '');
    }

    public function setLocaleString(string $localeString): void
    {
        /**
         * canonicalize the string first, e.g. convert hyphens to underscores, ensure the country code is lower case
         * and the language code is upper case (and fix any other segments of the string as well).
         */
        $localeString = \Locale::canonicalize($localeString) ?? '';
        if (!self::exists($localeString)) {
            throw new InvalidLocaleException($localeString);
        }
        $this->localeString = $localeString;
    }

    public function getLocaleString(): string
    {
        return $this->localeString;
    }

    public function getDefaultLocaleString(): string
    {
        return \Locale::getDefault();
    }

    /**
     * __toString
     * @return string
     */
    public function __toString(): string
    {
        return $this->getLocaleString();
    }
}
