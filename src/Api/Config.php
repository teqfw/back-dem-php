<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2017
 */

namespace TeqFw\Lib\Dem\Api;

/**
 * Module's public configuration (hardcoded parameters).
 */
interface Config
{
    /**
     * Attribute types in DEM JSON.
     */
    const ATTR_TYPE_BINARY = 'binary';
    const ATTR_TYPE_BOOLEAN = 'boolean';
    const ATTR_TYPE_DATETIME = 'datetime';
    const ATTR_TYPE_DECIMAL = 'decimal';
    const ATTR_TYPE_IDENTITY = 'identity';
    const ATTR_TYPE_INTEGER = 'integer';
    const ATTR_TYPE_REFERENCE = 'reference';
    const ATTR_TYPE_STRING = 'string';
    const ATTR_TYPE_TEXT = 'text';
}