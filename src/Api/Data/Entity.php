<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Dem\Api\Data;

/**
 * Structure of Entity data object.
 *
 * TODO: does this DO is module's public or internal?
 */
class Entity
    extends \TeqFw\Lib\Data
{
    /**
     * @var \TeqFw\Lib\Dem\Api\Data\Entity\Attr[]
     */
    public $attrs = [];
    /**
     * @var string Description (table's comment).
     */
    public $desc;
    /**
     * @var string
     */
    public $namespace;
    /**
     * @var \TeqFw\Lib\Dem\Api\Data\Entity\Index[]
     */
    public $indexes = [];
    /**
     * @var string Name of the entity.
     */
    public $name;
    /**
     * Full path to the entity ('/path/to/entity').
     * @var string
     */
    public $path;
    /**
     * @var \TeqFw\Lib\Dem\Api\Data\Entity\Relation[]
     */
    public $relations = [];
}