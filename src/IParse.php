<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem;

/**
 * Process to parse DEM JSON.
 */
interface IParse
    extends \TeqFw\Lib\Dem\IProcess
{
    /** string JSON formatted DEM */
    const IN_JSON = 'json';
    /** array */
    const OUT_SCHEMA = 'schema';
}