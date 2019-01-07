<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Dem\Helper\Parser;


interface Config
{
    /**
     * attribute types in DEM JSON.
     */
    const ATTR_TYPE_BINARY = 'binary';
    const ATTR_TYPE_BOOLEAN = 'boolean';
    const ATTR_TYPE_DATETIME = 'datetime';
    const ATTR_TYPE_IDENTITY = 'identity';
    const ATTR_TYPE_INTEGER = 'integer';
    const ATTR_TYPE_NUMERIC = 'numeric';
    const ATTR_TYPE_OPTION = 'option';
    const ATTR_TYPE_TEXT = 'text';
}