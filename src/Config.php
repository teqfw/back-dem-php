<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2019
 */

namespace TeqFw\Lib\Dem;

/**
 * Module's configuration (hardcoded parameters) contains 'public' & 'private' constants.
 */
interface Config
    extends \TeqFw\Lib\Dem\Api\Config
{
    const JSON_NODE_ATTR_DEFAULT = 'default';
    const JSON_NODE_ATTR_DESC = 'desc';
    const JSON_NODE_ATTR_NULLABLE = 'nullable';
    const JSON_NODE_ATTR_PRECISION = 'precision';
    const JSON_NODE_ATTR_SCALE = 'scale';
    const JSON_NODE_ATTR_LENGTH = 'size';
    const JSON_NODE_ATTR_SMALL = 'small';
    const JSON_NODE_ATTR_TYPE = 'type';
    const JSON_NODE_ATTR_UNSIGNED = 'unsigned';

    const JSON_NODE_DEM = 'DEM';
    const JSON_NODE_DOT = '.';

    const JSON_NODE_ENTITY_ATTR = 'attr';
    const JSON_NODE_ENTITY_DESC = 'desc';
    const JSON_NODE_ENTITY_INDEX = 'index';
    const JSON_NODE_ENTITY_RELATION = 'relation';

    const JSON_NODE_INDEX_ATTRS = 'attrs';
    const JSON_NODE_INDEX_TYPE = 'type';

    const JSON_NODE_RELATION_FOREIGN = 'foreign';
    const JSON_NODE_RELATION_ON = 'on';
    const JSON_NODE_RELATION_ON_DELETE = 'delete';
    const JSON_NODE_RELATION_ON_UPDATE = 'update';
    const JSON_NODE_RELATION_OWN = 'own';
    const JSON_NODE_RELATION_PATH = 'path';

    /** Names parts separator in DB. */
    const NS = '_';

    /** Path separator for namespaces (DEM JSON). */
    const PS = '/';
}