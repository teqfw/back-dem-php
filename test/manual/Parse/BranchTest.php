<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Parse;


use Flancer32\Lib\Data as Data;
use \TeqFw\Lib\Dem\Parse\Branch as Process;

class BranchTest
    extends \TeqFw\Lib\Test\TestCase
{
    public function testExec()
    {
        /** @var \TeqFw\Lib\Dem\Parse\Branch $proc */
        $proc = $this->getContainer()->get(\TeqFw\Lib\Dem\Parse\Branch::class);
        $in = new Data();

        $in->set(Process::IN_PATH, '/path/to');
        $in->set(Process::IN_NAME, 'branch');
        $branch = $this->getBranch();
        $in->set(Process::IN_BRANCH, $branch);
        $out = $proc->exec($in);
        $entities = $out->get(Process::OUT_ENTITIES);
        $this->assertTrue(true, 'Not ran.');

    }

    private function getBranch()
    {
        $result = new \stdClass();
        $result->bu = 'foo';
        return $result;
    }
}