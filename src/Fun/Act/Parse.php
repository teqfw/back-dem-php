<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Fun\Act;

use \TeqFw\Lib\Dem\Api\Config as Cfg;
use TeqFw\Lib\Dem\Api\Fun\Act\Parse\Data\Request as Request;
use TeqFw\Lib\Dem\Api\Fun\Act\Parse\Data\Response as Response;

class Parse
    implements \TeqFw\Lib\Dem\Api\Fun\Act\Parse
{

    /** @var \TeqFw\Lib\Dem\Fun\Util\Path */
    private $toolPath;

    public function __construct(
        \TeqFw\Lib\Dem\Fun\Util\Path $toolPath
    )
    {
        $this->toolPath = $toolPath;
    }


    public function exec(Request $in): Response
    {
        /* get working data from input */
        $json = $in->get(self::IN_JSON);
        /* define local working data */
        $path = Cfg::PS;    // use root path by default
        /* prepare output vars */
        $outEntities = [];
        /**
         * perform processing
         */
        $decoded = json_decode($json);
        $dem = $decoded->DEM;

        /* parse root nodes of the DEM (path data & root branches) */
        foreach ($dem as $key => $item) {
            if ($key == Cfg::A_DATA) {
                $path = $this->toolPath->normalizeRoot($item);  // use path from DEM
            } else {
                $branch = $item;
                $outEntities[] = $branch;
            }
        }

        /* put result data into output */
        $result = new \TeqFw\Lib\Data();
        return $result;
    }
}