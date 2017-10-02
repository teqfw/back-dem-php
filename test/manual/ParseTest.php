<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem;


use Flancer32\Lib\Data as Data;
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
        $entities = $out->get(Process::OUT_ENTITIES);
        $this->assertTrue(true, 'Not ran.');

    }

    private function loadJson(): string
    {
        $result = file_get_contents(__DIR__ . '/../data/sample.json');
        return $result;
    }
}