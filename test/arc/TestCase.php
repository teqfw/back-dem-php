<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Test\Dem;

class TestCase
    extends \TeqFw\Lib\Test\TestCase
{
    /**
     * TODO: this temporal code to connect to DB.
     */
    /** @var bool there is one only connection in the tests for the moment */
    private static $isConnectionBuilt = false;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->init();
    }

    private function init()
    {
        /* init DB connection */
        if (!self::$isConnectionBuilt) {
            /** @var \TeqFw\Lib\Dem\Arc\ConnectionBuilder $bldConn */
            $bldConn = $this->getContainer()->get(\TeqFw\Lib\Dem\Arc\ConnectionBuilder::class);
            $in = new \TeqFw\Lib\Dem\Data\Cfg\Db();
            $in->url = 'mysql://www:v8JBejI8Moyfrn7ldh02@localhost/dem';
            $bldConn->build($in);
            self::$isConnectionBuilt = true;
        }

    }
}