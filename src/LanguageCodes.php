<?php

/**
 * @author Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\intl;

use pvc\interfaces\intl\LanguageCodesInterface;
use Symfony\Component\Intl\Languages;

/**
 * Class LanguageCodes
 */
class LanguageCodes implements LanguageCodesInterface
{
    /**
     * @function getLanguageCodes
     * @return array<int, string>
     */
    public static function getLanguageCodes(): array
    {
        /**
         * keys to the array of codes are integers with no special meaning
         */
        return Languages::getLanguageCodes();
    }

    /**
     * validate
     * @param string $code
     * @return bool
     */
    public static function validate(string $code): bool
    {
        return Languages::exists($code);
    }
}
