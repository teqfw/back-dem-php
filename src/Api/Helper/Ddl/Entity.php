<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2019
 */

namespace TeqFw\Lib\Dem\Api\Helper\Ddl;

/**
 * Interface Entity
 * @package TeqFw\Lib\Dem\Api\Helper\Ddl
 */
interface Entity
{
    /**
     * Create entity table and attributes tables.
     *
     * @param \Doctrine\DBAL\Schema\Schema $schema
     * @param \TeqFw\Lib\Dem\Api\Data\Entity $entity
     * @return \Doctrine\DBAL\Schema\Schema
     */
    public function create(\Doctrine\DBAL\Schema\Schema $schema, \TeqFw\Lib\Dem\Api\Data\Entity $entity);

    /**
     * Create entity with attributes aggregation (view).
     *
     * @param \Doctrine\DBAL\Schema\AbstractSchemaManager $man
     * @param \TeqFw\Lib\Dem\Api\Data\Entity $entity
     */
    public function view(\Doctrine\DBAL\Schema\AbstractSchemaManager $man, \TeqFw\Lib\Dem\Api\Data\Entity $entity);
}