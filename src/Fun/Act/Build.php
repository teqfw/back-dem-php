<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Fun\Act;


use TeqFw\Lib\Dem\Api\Fun\Act\Build\Data\Request;
use TeqFw\Lib\Dem\Api\Fun\Act\Build\Data\Response;

class Build
    implements \TeqFw\Lib\Dem\Api\Fun\Act\Build
{

    public function exec(Request $in): Response
    {
        $result = new Response();
        return $result;
    }
}