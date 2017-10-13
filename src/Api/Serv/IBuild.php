<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Api\Serv;

use TeqFw\Lib\Dem\Api\Serv\Build\Data\Request as Request;
use TeqFw\Lib\Dem\Api\Serv\Build\Data\Response as Response;

/**
 * Service to build DB.
 */
interface IBuild
{
    public function exec(Request $in): Response;
}