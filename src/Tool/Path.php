<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Tool;

use \TeqFw\Lib\Dem\Config as Cfg;

class Path
{
    /**
     * Normalize root path (add leading path separator if missed).
     *
     * @param string $path 'path/to/branch'
     * @return string '/path/to/branch'
     */
    public function normalizeRoot(string $path): string
    {
        $firstChar = substr($path, 0, 1);
        $result = ($firstChar != Cfg::PS) ? Cfg::PS . $path : $path;
        return $result;
    }
}