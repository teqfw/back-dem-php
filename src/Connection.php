<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Dem;


/**
 * Module's wrapper for database connection (Doctrine based).
 */
class Connection
    extends \Doctrine\DBAL\Connection
    implements \TeqFw\Lib\Dem\Api\Connection
{
}