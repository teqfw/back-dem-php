<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem;


class SimpleTest
    extends \TeqFw\Lib\Test\TestCase
{
    public function testInit()
    {
        $data = $this->getContainer()->get(\TeqFw\Lib\Dem\Data\Entity::class);

        $this->assertTrue(true, 'Not ran.');

    }
}