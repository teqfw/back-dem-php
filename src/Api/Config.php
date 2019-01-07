<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2017
 */

namespace TeqFw\Lib\Dem\Api;

/**
 * Module's public configuration (hardcoded parameters).
 *
 * TODO: split these constants to private & public
 *
 */
interface Config
{
    const A_DATA = '.dat';
    const A_ENTITY_ATTR = 'attr';
    const A_ENTITY_DESC = 'desc';
    const A_ENTITY_INDEX = 'index';
    const A_ENTITY_RELATION = 'relation';
    /** Names parts separator in DB. */
    const NS = '_';
    /** Path separator in DEM. */
    const PS = '/';

    /**
     * Attribute types in DEM JSON.
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