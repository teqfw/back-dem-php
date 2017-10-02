<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem;

use \TeqFw\Lib\Dem\Config as Cfg;

class Parse
    implements \TeqFw\Lib\Dem\IProcess
{
    /** string JSON formatted DEM */
    const IN_JSON = 'json';
    /** array */
    const OUT_ENTITIES = 'entities';
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

        foreach ($dem as $key => $item) {
            if ($key == Cfg::KEY_DATA) {
                $path = $this->toolPath->normalize($item);  // use path from DEM
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