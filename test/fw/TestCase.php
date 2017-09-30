<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Test;


class TestCase
    extends \PHPUnit\Framework\TestCase
{

    /** @var  \Psr\Container\ContainerInterface */
    protected $container;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->container = new \League\Container\Container();
        $this->container->delegate(new \League\Container\ReflectionContainer());
    }

    protected function getContainer(): \Psr\Container\ContainerInterface
    {
        return $this->container;
    }
}