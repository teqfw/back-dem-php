<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace Test\TeqFw\Lib\Dem\Fun\Util;


class PathTest
    extends \TeqFw\Lib\Test\TestCase
{
    public function testNormalizeRoot()
    {
        /** @var \TeqFw\Lib\Dem\Fun\Util\Path $obj */
        $obj = $this->getContainer()->get(\TeqFw\Lib\Dem\Fun\Util\Path::class);
        $res = $obj->normalizeRoot(' pAth/tO/Branch ');
        $this->assertEquals('/path/to/branch', $res);
    }

    public function testToName()
    {
        /** @var \TeqFw\Lib\Dem\Fun\Util\Path $obj */
        $obj = $this->getContainer()->get(\TeqFw\Lib\Dem\Fun\Util\Path::class);
        $res = $obj->toName('/path/to/branch');
        $this->assertEquals('path_to_branch', $res);
    }
}