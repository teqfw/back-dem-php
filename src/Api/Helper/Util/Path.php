<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2019
 */

namespace TeqFw\Lib\Dem\Api\Helper\Util;


/**
 * Functionality to operate with DEM paths.
 */
interface Path
{
    /**
     * Normalize attribute name (" Any_Attr " => "any_attr").
     *
     * @param string $name
     * @return string
     */
    public function normalizeAttribute(string $name): string;

    /**
     * Normalize root path (lower case, trim, add leading path separator if missed).
     *
     * @param string $path ' pAth/To/branch '
     * @param string $namespace ' name/sPace '
     * @return string '/name/space/path/to/branch'
     */
    public function normalizeRoot(string $path, $namespace = null): string;

    /**
     * Convert path to entity (DEM) into the table name (DB).
     *
     * @param string $path '/path/to/branch'
     * @return string 'path_to_branch'
     */
    public function toName(string $path): string;
}