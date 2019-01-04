<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Dem\Api;

/**
 * Build database connection and place it into IoC-container.
 */
class ConnectionBuilder
{
    /** @var  \League\Container\Container */
    private $container;

    public function __construct(
        \Psr\Container\ContainerInterface $container,
        \TeqFw\Lib\Dem\Api\Data\Cfg\Db $cfg = null
    ) {
        assert($container instanceof \League\Container\Container);
        $this->container = $container;
        if ($cfg) {
            $this->build($cfg);
        }
    }

    /**
     * Build database connection and place it into IoC-container.
     * Replace existing connection if exist.
     *
     * @param \TeqFw\Lib\Dem\Api\Data\Cfg\Db $in
     * @throws \Doctrine\DBAL\DBALException
     */
    public function build(\TeqFw\Lib\Dem\Api\Data\Cfg\Db $in)
    {
        $config = new \Doctrine\DBAL\Configuration();
        $connectionParams = (array)$in;
        $connectionParams['wrapperClass'] = \TeqFw\Lib\Dem\Connection::class;
        /** @var \TeqFw\Lib\Dem\Connection $conn */
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
        $this->container->add(\TeqFw\Lib\Dem\Api\Connection::class, $conn, true);
        $this->container->add(\Doctrine\DBAL\Connection::class, $conn, true);
        $this->container->add(\Doctrine\DBAL\Driver\Connection::class, $conn, true);
    }
}