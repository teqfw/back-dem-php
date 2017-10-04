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

    /**
     * Convert path to entity (DEM) into the table name (DB).
     *
     * @param string $path '/path/to/branch'
     * @return string 'path_to_branch'
     */
    public function toName(string $path): string
    {
        $result = trim(strtolower($path));
        $firstChar = substr($result, 0, 1);
        if ($firstChar == Cfg::PS) {
            $length = strlen($result);
            $result = substr($result, 1, $length);
        }
        $result = str_replace(Cfg::PS, Cfg::NS, $result);
        return $result;
    }
}