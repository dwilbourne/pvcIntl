<?php

declare(strict_types=1);

namespace pvc\intl;

use pvc\interfaces\intl\CharsetInterface;

class Charset implements CharsetInterface
{
    /**
     * getPhpCharsets
     * @return array<int, string>
     */
    public static function getPhpCharsets(): array
    {
        return mb_list_encodings();
    }

    /**
     * isValid
     * @param string $charset
     * @return bool
     */
    public static function isValid(string $charset): bool
    {
        return in_array(strtolower($charset), array_map('strtolower', self::getPhpCharsets()));
    }
}
