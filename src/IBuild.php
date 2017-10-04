<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem;

/**
 * Process to build DB.
 */
interface IBuild
    extends \TeqFw\Lib\Dem\IProcess
{
    /** string Database schema (parsed DEM JSON */
    const IN_SCHEMA = 'schema';
    /** array */
    const OUT_ENTITIES = 'entities';
}