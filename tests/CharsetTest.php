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
     * @dataProvider dataProvider
     */
    public function testIsValid(string $input, bool $expectedResult, string $comment): void
    {
        self::assertTrue(Charset::isValid('UTF-8'));
    }

    public function dataProvider(): array
    {
        return [
            ['utf-8', true, 'failed to validate utf-8'],
            ['UTF-8', true, 'failed to validate UTF-8'],
            ['foo', false, 'wrongly validated foo'],
        ];
    }
}
