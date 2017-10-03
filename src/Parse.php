<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem;

use \TeqFw\Lib\Dem\Config as Cfg;

class Parse
    implements \TeqFw\Lib\Dem\IParse
{

    /** @var \TeqFw\Lib\Dem\Tool\Path */
    private $toolPath;

    public function __construct(
        \TeqFw\Lib\Dem\Tool\Path $toolPath
    )
    {
        $this->toolPath = $toolPath;
    }


    public function exec(\Flancer32\Lib\Data $in): \Flancer32\Lib\Data
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
        $result = new \Flancer32\Lib\Data();
        return $result;
    }
}