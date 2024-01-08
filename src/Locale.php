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
 * The format uses underscores, not hyphens (e.g. fr_FR, not fr-FR).  The language code cannot be capitalized, the
 * country code (second part of the string) must be capitalized.
 */
class Locale implements LocaleInterface
{
    /**
     * @var string
     */
    protected string $localeString;

    /**
     * @param string $localeString
     * @throws InvalidLocaleException
     */
    public function __construct(string $localeString)
    {
        if (!self::exists($localeString)) {
            throw new InvalidLocaleException($localeString);
        }
        $this->localeString = $localeString;
    }

    /**
     * exists
     * @param string $locale
     * @return bool
     */
    public static function exists(string $locale): bool
    {
        return Locales::exists($locale);
    }

    /**
     * __toString
     * @return string
     */
    public function __toString(): string
    {
        return $this->localeString;
    }
}
