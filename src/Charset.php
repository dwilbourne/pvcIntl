<?php

declare(strict_types=1);

namespace pvc\intl;

class Charset
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
        return in_array($charset, self::getPhpCharsets());
    }
}
