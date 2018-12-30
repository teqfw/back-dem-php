<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Dem\Helper\Doctrine;


class Config
{
    /** @see ./Doctrine/DBAL/Schema/MySqlSchemaManager.php:174 */
    const COL_OPT_AUTOINCREMENT = 'autoincrement';
    const COL_OPT_COMMENT = 'comment';
    const COL_OPT_DEFAULT = 'default';
    const COL_OPT_FIXED = 'fixed';
    const COL_OPT_LENGTH = 'length';
    const COL_OPT_NOTNULL = 'notnull';
    const COL_OPT_PRECISION = 'precision';
    const COL_OPT_SCALE = 'scale';
    const COL_OPT_UNSIGNED = 'unsigned';

    const FKEY_ACT_CASCADE = 'CASCADE';
    const FKEY_ON_DELETE = 'onDelete';
    const FKEY_ON_UPDATE = 'onUpdate';

    const TBL_OPT_COMMENT = 'comment';
}