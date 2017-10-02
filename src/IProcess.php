<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem;

/**
 * TODO: move to \TeqFw\Lib\Base
 */
interface IProcess
{
    public function exec(\Flancer32\Lib\Data $in): \Flancer32\Lib\Data;
}