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
}