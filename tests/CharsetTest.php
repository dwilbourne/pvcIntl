<?php

declare(strict_types=1);

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

namespace pvcTests\intl;

use PHPUnit\Framework\TestCase;
use pvc\intl\Charset;

class CharsetTest extends TestCase
{
    /**
     * testGetPhpCharsets
     * @covers \pvc\intl\Charset::getPhpCharsets
     */
    public function testGetPhpCharsets(): void
    {
        self::assertIsArray(Charset::getPhpCharsets());
    }

    /**
     * testIsValid
     * @covers \pvc\intl\Charset::isValid
     */
    public function testIsValid(): void
    {
        self::assertTrue(Charset::isValid('UTF-8'));
    }

    /**
     * testIsValid
     * @covers \pvc\intl\Charset::isValid
     */
    public function testIsNotValid(): void
    {
        self::assertFalse(Charset::isValid('foo'));
    }
}
