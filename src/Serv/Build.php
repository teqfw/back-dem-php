<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Api\Serv;


use TeqFw\Lib\Dem\Api\Serv\Build\Data\Request;
use TeqFw\Lib\Dem\Api\Serv\Build\Data\Response;

class Build
    implements IBuild
{

    public function exec(Request $in): Response
    {
        $result = new Response();
        return $result;
    }
}