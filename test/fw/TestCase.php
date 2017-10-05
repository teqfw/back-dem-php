<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Test;


class TestCase
    extends \PHPUnit\Framework\TestCase
{

    /** @var  \Psr\Container\ContainerInterface */
    private $container;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->init();
    }

    private function init()
    {
        /* create DI container for the module */
        $this->container = new \League\Container\Container();
        $this->container->delegate(new \League\Container\ReflectionContainer());
        $this->container->add(\Psr\Container\ContainerInterface::class, $this->container, true);

        /* init DB connection */
        /** @var \TeqFw\Lib\Dem\Arch\ConnectionBuilder $bldConn */
        $bldConn = $this->container->get(\TeqFw\Lib\Dem\Arch\ConnectionBuilder::class);
        $in = new \TeqFw\Lib\Dem\Data\Cfg\Db();
        $in->url = 'mysql://www:v8JBejI8Moyfrn7ldh02@localhost/dem';
        $bldConn->build($in);
    }

    protected function getContainer(): \Psr\Container\ContainerInterface
    {
        return $this->container;
    }
}