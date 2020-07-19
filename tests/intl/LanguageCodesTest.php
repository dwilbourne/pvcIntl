<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace tests\intl;

use PHPUnit\Framework\TestCase;
use pvc\intl\IsoLanguageCodes;
use pvc\msg\UserMsg;

class LanguageCodesTest extends TestCase
{
    protected IsoLanguageCodes $codes;

    public function setUp() : void
    {
        $this->codes = new IsoLanguageCodes();
    }

    public function testValidateCode() : void
    {
        self::assertTrue(IsoLanguageCodes::validateLanguageCode('en'));
    }

    public function testGetLanguageCodes() : void
    {
        self::assertTrue(0 < count(IsoLanguageCodes::getLanguageCodes()));
    }

    public function testGetLanguageCodeFromLanguage() : void
    {
        self::assertEquals('en', IsoLanguageCodes::getLanguageCodeFromLanguage('English'));
    }

    public function testValidate() : void
    {
        self::assertNull($this->codes->getErrMsg());

        $input = 'en';
        self::assertTrue($this->codes->validate($input));
        self::assertNull($this->codes->getErrMsg());

        $input = 'foo';
        self::assertFalse($this->codes->validate($input));
        self::assertInstanceOf(UserMsg::class, $this->codes->getErrMsg());

        // now test a valiod input again and make sure error message is null
        $input = 'en';
        self::assertTrue($this->codes->validate($input));
        self::assertNull($this->codes->getErrMsg());
    }
}
