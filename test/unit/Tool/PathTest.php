<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Test;


class PathTest
    extends \TeqFw\Lib\Test\TestCase
{
    public function testNormalizeRoot()
    {
        /** @var \TeqFw\Lib\Dem\Tool\Path $obj */
        $obj = $this->container->get(\TeqFw\Lib\Dem\Tool\Path::class);
        $res = $obj->normalizeRoot(' pAth/tO/Branch ');
        $this->assertEquals('/path/to/branch', $res);
    }

    public function testToName()
    {
        /** @var \TeqFw\Lib\Dem\Tool\Path $obj */
        $obj = $this->container->get(\TeqFw\Lib\Dem\Tool\Path::class);
        $res = $obj->toName('/path/to/branch');
        $this->assertEquals('path_to_branch', $res);
    }
}