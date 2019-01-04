<?php
/**
 * Module's public configuration (hardcoded parameters).
 *
 * TODO: split these constants to private & public
 *
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2017
 */

namespace TeqFw\Lib\Dem\Api;


class Config
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
}