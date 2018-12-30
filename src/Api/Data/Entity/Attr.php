<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Dem\Api\Data\Entity;


class Attr
    extends \TeqFw\Lib\Data
{
    /**
     * @var string Description (columns's comment).
     */
    public $desc;
    /**
     * @var string Name of the attribute.
     */
    public $name;
    /**
     * @var string @see \TeqFw\Lib\Dem\Helper\Parser\Config::ATTR_TYPE_...
     */
    public $type;
    /**
     * @var int
     */
    public $precision;
    /**
     * 'true' - this column will be primary key (unsigned int with autoincrement).
     * A lot of PK are integers, so 'Identity' is a typical ID column.
     *
     * @var bool
     */
    public $isIdentity = false;
}