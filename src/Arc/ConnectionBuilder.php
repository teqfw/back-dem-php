<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Arc;

/**
 * Build database connection and place it into the Container.
 */
class ConnectionBuilder
{
    /** @var  \League\Container\Container */
    private $container;

    public function __construct(\Psr\Container\ContainerInterface $container)
    {
        assert($container instanceof \League\Container\Container);
        $this->container = $container;
    }

    public function build(\TeqFw\Lib\Dem\Data\Cfg\Db $in)
    {
        $config = new \Doctrine\DBAL\Configuration();
        $connectionParams = (array)$in;
        /** @var  $conn */
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
        $this->container->add(\Doctrine\DBAL\Connection::class, $conn, true);
    }
}