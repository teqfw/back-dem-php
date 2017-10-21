<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Api\Fun\Act;

use TeqFw\Lib\Dem\Api\Fun\Act\Build\Data\Request as Request;
use TeqFw\Lib\Dem\Api\Fun\Act\Build\Data\Response as Response;

/**
 * Service to build DB.
 */
interface Build
{
    public function exec(Request $in): Response;
}