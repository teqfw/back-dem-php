<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2019
 */

namespace TeqFw\Lib\Dem\Api;

/**
 * Convert JSON string to DEM structure (PHP objects).
 */
interface Parser
{
    public function parseJson(string $json): \TeqFw\Lib\Dem\Api\Data\EntityCollection;
}