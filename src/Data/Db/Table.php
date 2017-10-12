<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Data\Db;

/**
 * Structure to describe Database table (not DEM entity).
 */
class Table
    extends \TeqFw\Lib\Base\Data
{
    public $attributes;
    /**
     * Table comment to be saved in DB.
     *
     * @var string
     */
    public $comment;
    public $foreigns;
    public $indexes;
    /**
     * Full name of the table in DB.
     *
     * @var  string
     */
    public $name;
}