<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.21.10
 * Time: 14:10
 */

namespace TeqFw\Lib\Dem\Api\Fun\Util;


/**
 * Functionality to operate with DEM paths.
 */
interface Path
{
    /**
     * Normalize root path (lower case, trim, add leading path separator if missed).
     *
     * @param string $path ' pAth/To/branch '
     * @return string '/path/to/branch'
     */
    public function normalizeRoot(string $path): string;

    /**
     * Convert path to entity (DEM) into the table name (DB).
     *
     * @param string $path '/path/to/branch'
     * @return string 'path_to_branch'
     */
    public function toName(string $path): string;
}