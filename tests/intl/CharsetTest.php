<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace tests\intl;

use pvc\intl\Charset;
use PHPUnit\Framework\TestCase;
use pvc\intl\err\InvalidCharsetException;
use pvc\intl\err\InvalidCharsetMsg;

class CharsetTest extends TestCase
{
    public function testSetCharsetException() : void
    {
        self::expectException(InvalidCharsetException::class);
        $cs = new Charset(65502);
    }

    public function testSetGetCharsetConstant() : void
    {
        $constant = Charset::UTF_8;
        $cs = new Charset($constant);
        self::assertEquals($constant, $cs->getCharsetConstant());
    }

    public function testSetGetCharsetStringAndGetValidCharsets() : void
    {
        $constant = Charset::UTF_8;
        $cs = new Charset($constant);
        $vcs = $cs->getValidCharsets();
        self::assertEquals($cs->getCharsetString(), $vcs[$constant]);
        self::assertEquals('UTF-8', $cs->getCharsetString());
    }

    public function testValidateCharset() : void
    {
        $cs = new Charset();
        self::assertFalse($cs->validateCharset('foo'));
        self::assertTrue($cs->getErrMsg() instanceof InvalidCharsetMsg);
        self::assertTrue($cs->validateCharset('utf-8'));
        self::assertNull($cs->getErrMsg());
        self::assertEquals(Charset::UTF_8, $cs->getCharsetConstant());
    }
}
