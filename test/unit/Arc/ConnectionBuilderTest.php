<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace Test\TeqFw\Lib\Dem\Arc;

use \TeqFw\Lib\Dem\Data\Cfg\Db as DCfgDb;
use \TeqFw\Lib\Dem\Arc\ConnectionBuilder as Builder;

class ConnectionBuilderTest
    extends \TeqFw\Lib\Test\TestCase
{
    public function testBuild()
    {
        /** @var Builder $bld */
        $bld = $this->getContainer()->get(Builder::class);

        $in = new DCfgDb();
        $in->url = 'mysql://www:v8JBejI8Moyfrn7ldh02@localhost/dem';
        $out = $bld->build($in);

        $this->assertTrue(true, 'Not ran.');

    }
}