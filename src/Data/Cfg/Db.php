<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */

namespace TeqFw\Lib\Dem\Data\Cfg;

/**
 * Database connection configuration.
 *
 * see http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/configuration.html
 *
 * Use $url only or other parameters all together.
 *
 */
class Db
    extends \TeqFw\Lib\Data
{
    public $dbname;
    public $driver;
    public $host;
    public $password;
    public $url;
    public $user;
}