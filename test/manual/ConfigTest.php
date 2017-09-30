<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem;


class ConfigTest
    extends \TeqFw\Lib\Test\TestCase
{
    public function testInit()
    {
        echo "Running...";

        $container = new \League\Container\Container();
        $container->delegate(new \League\Container\ReflectionContainer());
//        $container->add(\TeqFw\Lib\Dem\Config::class);
        $cfg = $container->get(\TeqFw\Lib\Dem\Config::class);
        $this->assertTrue(true, 'Not ran.');

        /** @var \TeqFw\Lib\Dem\Data\Entity $data */
        $data = $container->get(\TeqFw\Lib\Dem\Data\Entity::class);
        $data->desc = 'bu';

    }
}