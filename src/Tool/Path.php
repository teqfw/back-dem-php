<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Tool;

use \TeqFw\Lib\Dem\Config as Cfg;

class Path
{
    /**
     * Normalize root path (lower case, trim, add leading path separator if missed).
     *
     * @param string $path ' pAth/To/branch '
     * @return string '/path/to/branch'
     */
    public function normalizeRoot(string $path): string
    {
        $result = trim(strtolower($path));
        $firstChar = substr($result, 0, 1);
        $result = ($firstChar != Cfg::PS) ? Cfg::PS . $result : $result;
        return $result;
    }
}