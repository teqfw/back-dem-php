<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2019
 */

namespace TeqFw\Lib\Dem\Api;

/**
 * Place this module's objects into container.
 */
class ContainerBuilder
{
    public static function populate(\TeqFw\Lib\Di\Api\Container $container)
    {
//        $cfgDb = $container->get(\TeqFw\Lib\Db\Api\Data\Cfg\Db::class);
//        $config = new \Doctrine\DBAL\Configuration();
//        $connectionParams = (array)$cfgDb;
//        $connectionParams['wrapperClass'] = \TeqFw\Lib\Dem\Connection::class;
//        /** @var \TeqFw\Lib\Dem\Connection $conn */
//        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
//        $container->add(\TeqFw\Lib\Dem\Api\Connection::class, $conn, true);
//        $container->add(\Doctrine\DBAL\Connection::class, $conn, true);
//        $container->add(\Doctrine\DBAL\Driver\Connection::class, $conn, true);
    }

}