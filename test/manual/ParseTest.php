<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem;


use TeqFw\Lib\Base\Data as Data;
use \TeqFw\Lib\Dem\Parse as Process;

class ParseTest
    extends \TeqFw\Lib\Test\TestCase
{
    public function testExec()
    {
        /** @var \TeqFw\Lib\Dem\Parse $proc */
        $proc = $this->getContainer()->get(\TeqFw\Lib\Dem\Parse::class);
        $in = new Data();
        $json = $this->loadJson();
        $in->set(Process::IN_JSON, $json);
        $out = $proc->exec($in);
        $schema = $out->get(Process::OUT_SCHEMA);
        $this->build($schema);
        $this->assertTrue(true);

    }

    private function build($db)
    {
        $conn = $this->getContainer()->get(\Doctrine\DBAL\Connection::class);
        $conn->connect();
        $sm = $conn->getSchemaManager();
        $schema = $sm->createSchema();
        print_r($schema);
        $conn->close();
    }

    private function loadJson(): string
    {
        $result = file_get_contents(__DIR__ . '/../data/sample.json');
        return $result;
    }
}