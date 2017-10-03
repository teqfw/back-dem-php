<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Parse;

use \TeqFw\Lib\Dem\Config as Cfg;

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
        $pathRoot = $in->get(self::IN_PATH);
        $name = $in->get(self::IN_NAME);
        $branch = $in->get(self::IN_BRANCH);

        /* define local working data */
        $pathCur = $pathRoot . Cfg::PS . $name;
        $pathCur = $this->toolPath->normalizeRoot($pathCur);
        /* prepare output vars */
        $out = [];
        /**
         * perform processing
         */
        if ($branch instanceof \stdClass) {
            foreach ($branch as $key => $item) {
                if ($key == Cfg::A_DATA) {
                    /* parse entity data */
                    $entity = $this->parseEntity($item);
                } else {
                    $inSub = new \Flancer32\Lib\Data();
                    $inSub->set(self::IN_PATH, $pathCur);
                    $inSub->set(self::IN_NAME, $key);
                    $inSub->set(self::IN_BRANCH, $item);
                    $outSub = $entities = $this->exec($inSub);
                }
            }
        }
        /* put result data into output */
        $result = new \Flancer32\Lib\Data();
        $result->set(self::OUT_ENTITIES, $out);
        return $result;
    }

    private function parseEntity($item)
    {
        $result = new \stdClass();
        return $result;
    }
}