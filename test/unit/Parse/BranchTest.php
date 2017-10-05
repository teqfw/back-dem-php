<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Test\Parse;

use \Flancer32\Lib\Data as Data;
use \TeqFw\Lib\Dem\Parse\Branch as Process;
use \TeqFw\Lib\Dem\Config as Cfg;

class BranchTest
    extends \TeqFw\Lib\Test\TestCase
{
    public function testExec()
    {
        /** @var Process $proc */
        $proc = $this->getContainer()->get(Process::class);
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
        /* compose result */
        $result = new \stdClass();
        $entity = new \stdClass();
        $result->{Cfg::A_DATA} = $entity;
        /* compose entity */
        $entity->{Cfg::A_ENTITY_DESC} = 'some entity';
        $attr = new \stdClass();
        $entity->{Cfg::A_ENTITY_ATTR} = $attr;
        $index = new \stdClass();
        $entity->{Cfg::A_ENTITY_INDEX} = $index;
        $relation = new \stdClass();
        $entity->{Cfg::A_ENTITY_RELATION} = $relation;
        /* compose attributes */

        return $result;
    }
}