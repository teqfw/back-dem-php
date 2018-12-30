<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Dem;


class ZendTest
    extends \PHPUnit\Framework\TestCase
{
    private const TABLE = 'e_user';

    private function ddlQuery(\Zend\Db\Sql\SqlInterface $ddl)
    {
        try {
            $container = \TeqFw\Lib\Di\Api\ContainerFactory::getContainer();
            $db = $container->get(\Zend\Db\Adapter\Adapter::class);
            /** @var \Zend\Db\Sql\Sql $sql */
            $sql = $container->get(\Zend\Db\Sql\Sql::class);
//        $sql = new \Zend\Db\Sql\Sql($adapter);
            $query = $sql->buildSqlString($ddl);
            $db->query($query, \Zend\Db\Adapter\Adapter::QUERY_MODE_EXECUTE);
        } catch (\Throwable $e) {
            $e->getMessage();
        }
    }

    public function testSmth()
    {
        $obj = \TeqFw\Lib\Di\Api\ContainerFactory::getContainer();

        $config = [
            'driver' => 'Mysqli',
            'database' => 'dem',
            'username' => 'www',
            'password' => 'R9QfcvqSfpcYlIoaYCRx',
        ];
        $adapter = new \Zend\Db\Adapter\Adapter($config);
        $obj->add(\Zend\Db\Adapter\AdapterInterface::class, $adapter, true);
        $obj->add(\Zend\Db\Adapter\Adapter::class, $adapter, true);


        $drop = new \Zend\Db\Sql\Ddl\DropTable(self::TABLE);
        $this->ddlQuery($drop);

        $create = new \Zend\Db\Sql\Ddl\CreateTable();
        $create->setTable(self::TABLE);
        $col = new \Zend\Db\Sql\Ddl\Column\Integer();
        $col->setName('id');
        $col->setNullable(false);
        $col->setOption('AUTO_INCREMENT', true);
//        $col->setOption('UNSIGNED', true);
        $create->addColumn($col);
        $this->ddlQuery($create);

        $this->assertNotNull($obj);
        /* container should has PSR-11 implementation */
        $hasPsr11 = $obj->has(\Psr\Container\ContainerInterface::class);
        $this->assertTrue($hasPsr11);
    }
}