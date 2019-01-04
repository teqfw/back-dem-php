<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace Test\TeqFw\Lib\Dem;

use TeqFw\Lib\Dem\Helper\Parser\Config as ParserCfg;

class DoctrineTest
    extends \PHPUnit\Framework\TestCase
{
    private const A_ID = 'id';
    private const A_REF = 'ref';
    private const A_VALUE = 'value';
    private const E_USER = 'e_user';
    private const E_USER_A_LOGIN = 'e_user_a_login';
    private const E_USER_A_NAME = 'e_user_a_name';
    private const E_USER_A_PASSWORD = 'e_user_a_password';

    private function composeEntity()
    {
        $result = new \TeqFw\Lib\Dem\Api\Data\Entity();
        $result->desc = 'Point of interest.';
        $result->name = 'poi';
        $result->namespace = '/fl32/pythonizer';

        /* name */
        $attrName = new \TeqFw\Lib\Dem\Api\Data\Entity\Attr();
        $attrName->name = 'name';
        $attrName->desc = 'Name of the POI.';
        $attrName->type = ParserCfg::ATTR_TYPE_TEXT;
        $result->attrs [] = $attrName;

        /* latitude */
        $attrLat = new \TeqFw\Lib\Dem\Api\Data\Entity\Attr();
        $attrLat->name = 'latitude';
        $attrLat->desc = 'Latitude for POI.';
        $attrLat->type = ParserCfg::ATTR_TYPE_NUMERIC;
        $attrLat->type = ParserCfg::ATTR_TYPE_NUMERIC;
        $result->attrs [] = $attrLat;

        return $result;
    }

    private function createUser(\Doctrine\DBAL\Schema\Schema $schema)
    {
        $table = $schema->createTable(self::E_USER);
        $table->addColumn(
            self::A_ID,
            \Doctrine\DBAL\Types\Type::INTEGER,
            [
                'unsigned' => true,
                'autoincrement' => true
            ]);
        $table->setPrimaryKey([self::A_ID]);

        return $schema;
    }

    private function createUserLogin(\Doctrine\DBAL\Schema\Schema $schema)
    {
        $table = $schema->createTable(self::E_USER_A_LOGIN);

        $table->addColumn(
            self::A_REF,
            \Doctrine\DBAL\Types\Type::INTEGER,
            ['unsigned' => true]);

        $table->addColumn(
            self::A_VALUE,
            \Doctrine\DBAL\Types\Type::STRING,
            []);

        $table->setPrimaryKey([self::A_REF]);

        $table->addForeignKeyConstraint(
            self::E_USER,
            [self::A_REF],
            [self::A_ID],
            ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']
        );

        return $schema;
    }

    private function createUserName(\Doctrine\DBAL\Schema\Schema $schema)
    {
        $table = $schema->createTable(self::E_USER_A_NAME);

        $table->addColumn(
            self::A_REF,
            \Doctrine\DBAL\Types\Type::INTEGER,
            ['unsigned' => true]);

        $table->addColumn(
            self::A_VALUE,
            \Doctrine\DBAL\Types\Type::STRING,
            []);

        $table->setPrimaryKey([self::A_REF]);

        $table->addForeignKeyConstraint(
            self::E_USER,
            [self::A_REF],
            [self::A_ID],
            ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']
        );

        return $schema;
    }

    private function createUserPassword(\Doctrine\DBAL\Schema\Schema $schema)
    {
        $table = $schema->createTable(self::E_USER_A_PASSWORD);

        $table->addColumn(
            self::A_REF,
            \Doctrine\DBAL\Types\Type::INTEGER,
            ['unsigned' => true]);

        $table->addColumn(
            self::A_VALUE,
            \Doctrine\DBAL\Types\Type::STRING,
            []);

        $table->setPrimaryKey([self::A_REF]);

        $table->addForeignKeyConstraint(
            self::E_USER,
            [self::A_REF],
            [self::A_ID],
            ['onDelete' => 'CASCADE', 'onUpdate' => 'CASCADE']
        );

        return $schema;
    }

    public function createView(\Doctrine\DBAL\Schema\AbstractSchemaManager $man)
    {
        $sql = "
        SELECT
	e.id,
	n.value as name,
	l.value as login,
	p.value as password
FROM
	e_user as e
LEFT JOIN e_user_a_name as n ON
	n.`ref` = e.id
LEFT JOIN e_user_a_login as l ON
	l.`ref` = e.id
LEFT JOIN e_user_a_password as p ON
	p.`ref` = e.id
        ";
        $view = new \Doctrine\DBAL\Schema\View('user', $sql);
        $man->dropAndCreateView($view);
    }

    /**
     * @return \TeqFw\Lib\Di\Api\Container
     * @throws \Doctrine\DBAL\DBALException
     */
    private function initDi()
    {
        /* create DI container */
        $result = \TeqFw\Lib\Di\Api\ContainerFactory::getContainer();
        /* init DB connection */
        $dbCfg = new \TeqFw\Lib\Dem\Api\Data\Cfg\Db();
        $dbCfg->url = 'mysql://www:R9QfcvqSfpcYlIoaYCRx@localhost/dem';
        $result->add(\TeqFw\Lib\Dem\Api\Data\Cfg\Db::class, $dbCfg, true);
        /** @var \TeqFw\Lib\Dem\Api\ConnectionBuilder $connBuilder */
        $connBuilder = $result->get(\TeqFw\Lib\Dem\Api\ConnectionBuilder::class);
        $connBuilder->build($dbCfg);

        return $result;
    }

    public function testTable()
    {
        $di = $this->initDi();
        /** @var \TeqFw\Lib\Dem\Connection $conn */
        $conn = $di->get(\TeqFw\Lib\Dem\Api\Connection::class);
        $conn->beginTransaction();
        /** @var \Doctrine\DBAL\Schema\AbstractSchemaManager $man */
        $man = $conn->getSchemaManager();
        $schema = new \Doctrine\DBAL\Schema\Schema();
        $schema = $this->createUser($schema);
        $schema = $this->createUserLogin($schema);
        $schema = $this->createUserName($schema);
        $schema = $this->createUserPassword($schema);

        $entity = $this->composeEntity();
        /** @var \TeqFw\Lib\Dem\Helper\Ddl\Entity $ddl */
        $ddl = $di->get(\TeqFw\Lib\Dem\Helper\Ddl\Entity::class);
        $ddl->create($schema, $entity);


        /** @var \Doctrine\DBAL\Schema\Synchronizer\SingleDatabaseSynchronizer $sync */
        $sync = $di->get(\Doctrine\DBAL\Schema\Synchronizer\SingleDatabaseSynchronizer::class);
        $sync->updateSchema($schema);


        $ddl->view($man, $entity);
        $this->createView($man);


        $conn->commit();
        $this->assertNotNull($di);
    }
}