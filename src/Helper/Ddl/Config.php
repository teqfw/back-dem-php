<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2018
 */

namespace TeqFw\Lib\Dem\Helper\Ddl;

/**
 * Data definitions related constants.
 */
interface Config
{
    /** Alias for entity table in SQL statements */
    const AS_ENTITY = 'entity';
    /** Default name for identity columns of entity tables (entity primary key) */
    const ATTR_ID = 'id';
    /** Default name for identity columns of attribute tables (attribute foreign key) */
    const ATTR_REF = 'ref';
    /** Default name for value columns of attribute tables (attribute data) */
    const ATTR_VALUE = 'value';
    /** Attribute mark in table name (vendor_project_module_e_entity_a_attribute) */
    const DIV_ATTR = 'a';
    /** Entity mark in table name (vendor_project_module_e_entity) */
    const DIV_ENTITY = 'e';
    /** Entity mark in view name (vendor_project_module_v_entity) */
    const DIV_VIEW = 'v';
}