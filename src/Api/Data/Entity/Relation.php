<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Dem\Api\Data\Entity;


class Relation
    extends \TeqFw\Lib\Data
{
    /**
     * Ordered set of foreign entity attributes to be bound to the own attributes.
     *
     * @var string[]
     */
    public $foreignAttrs;
    /**
     * Ordered set of own attributes to be bound to the foreign entity attributes.
     *
     * @var string[]
     */
    public $ownAttrs;
    /**
     * 'On Update' actions.
     *
     * @var string
     */
    public $onUpdate;
    /**
     * 'On Delete' actions.
     *
     * @var string
     */
    public $onDelete;
    /**
     * Full path to foreign entity.
     *
     * @var string
     */
    public $pathToForeign;
}