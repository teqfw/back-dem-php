<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Dem\Api\Data\Entity;


class Index
    extends \TeqFw\Lib\Data
{
    const TYPE_PRIMARY = 'primary';
    const TYPE_SIMPLE = 'simple';
    const TYPE_TEXT = 'text';
    const TYPE_UNIQUE = 'unique';
    public $attrs;
    public $type;
}