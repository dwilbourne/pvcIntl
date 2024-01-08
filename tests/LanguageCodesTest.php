<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace pvcTests\intl;

use PHPUnit\Framework\TestCase;
use pvc\intl\LanguageCodes;

class LanguageCodesTest extends TestCase
{
    /**
     * testGetLanguageCodes
     * @covers \pvc\intl\LanguageCodes::getLanguageCodes
     */
    public function testGetLanguageCodes(): void
    {
        $languageCodes = LanguageCodes::getLanguageCodes();
        self::assertTrue(in_array('en', LanguageCodes::getLanguageCodes()));
    }

    /**
     * testValidateCodeSucceeds
     * @covers \pvc\intl\LanguageCodes::validate
     */
    public function testValidateCodeSucceeds(): void
    {
        self::assertTrue(LanguageCodes::validate('en'));
    }

    /**
     * testValidateCodeFails
     * @covers \pvc\intl\LanguageCodes::validate
     */
    public function testValidateCodeFails(): void
    {
        self::assertFalse(LanguageCodes::validate('foo'));
    }

}
