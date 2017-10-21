<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Api\Fun\Act;

use TeqFw\Lib\Dem\Api\Fun\Act\Parse\Data\Request as Request;
use TeqFw\Lib\Dem\Api\Fun\Act\Parse\Data\Response as Response;

/**
 * Process to parse DEM JSON.
 */
interface Parse
{
    public function exec(Request $in): Response;
}