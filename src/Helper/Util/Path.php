<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Dem\Helper\Util;

use TeqFw\Lib\Dem\Config as Cfg;

/**
 * Functionality to operate with DEM paths.
 */
class Path
    implements \TeqFw\Lib\Dem\Api\Helper\Util\Path
{

    public function normalizeAttribute(string $name): string
    {
        $result = trim(strtolower($name));
        return $result;
    }

    public function normalizeRoot(string $path, $namespace = null): string
    {
        /* concatenate NS & path */
        $normPath = trim(strtolower($path));
        $normNs = trim(strtolower($namespace));
        $result = $normNs . Cfg::PS . $normPath;
        /* replace all "//" with "/" */
        $search = Cfg::PS . Cfg::PS;
        $replace = Cfg::PS;
        do {
            $result = str_replace($search, $replace, $result, $count);
        } while ($count > 0);
        /* add leading "/" if missed */
        $firstChar = substr($result, 0, 1);
        $result = ($firstChar != Cfg::PS) ? Cfg::PS . $result : $result;
        return $result;
    }

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