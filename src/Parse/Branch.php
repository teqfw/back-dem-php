<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Parse;

class Branch
    implements \TeqFw\Lib\Dem\IProcess
{
    /** string Root path to the current branch */
    const IN_PATH = 'path';
    /** string Name of the current branch */
    const IN_NAME = 'name';
    /** branch data */
    const IN_BRANCH = 'branch';
    const OUT_ENTITIES = 'entities';

    public function exec(\Flancer32\Lib\Data $in): \Flancer32\Lib\Data
    {
        /* get working data from input */
        $path = $in->get(self::IN_PATH);
        $name = $in->get(self::IN_NAME);
        $branch = $in->get(self::IN_BRANCH);

        /* define local working data */
        $k = $path * 2;
        /* prepare output vars */
        $out = null;
        /**
         * perform processing
         */
        $out = 100 * $k;
        /* put result data into output */
        $result = new \Flancer32\Lib\Data();
        $result->set(self::OUT_ENTITIES, $out);
        return $result;
    }
}