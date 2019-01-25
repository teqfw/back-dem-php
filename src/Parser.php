<?php
/**
 * Authors: Alex Gusev <alex@flancer64.com>
 * Since: 2019
 */

namespace TeqFw\Lib\Dem;

use TeqFw\Lib\Dem\Config as Cfg;

class Parser
    implements \TeqFw\Lib\Dem\Api\Parser
{
    /** @var \TeqFw\Lib\Dem\Api\Helper\Util\Path */
    private $hlpPath;

    public function __construct(
        \TeqFw\Lib\Dem\Api\Helper\Util\Path $hlpPath
    ) {
        $this->hlpPath = $hlpPath;
    }

    public function normalizeAttrType(string $type): string
    {
        $result = trim(strtolower($type));
        return $result;
    }

    /**
     * Normalize database structure related name (table, field, ...).
     *
     * @param string $name
     * @return string
     */
    public function normalizeName(string $name): string
    {
        $result = trim(strtolower($name));
        return $result;
    }

    private function parseAttributes($attrs)
    {
        $result = [];
        foreach ($attrs as $name => $one) {
            $attr = new \TeqFw\Lib\Dem\Api\Data\Entity\Attr();
            $attr->name = $this->normalizeName($name);

            if (isset($one[Cfg::JSON_NODE_ATTR_DEFAULT]))
                $attr->default = $one[Cfg::JSON_NODE_ATTR_DEFAULT];
            if (isset($one[Cfg::JSON_NODE_ATTR_DESC]))
                $attr->desc = $one[Cfg::JSON_NODE_ATTR_DESC];
            if (isset($one[Cfg::JSON_NODE_ATTR_LENGTH]))
                $attr->length = $one[Cfg::JSON_NODE_ATTR_LENGTH];
            if (isset($one[Cfg::JSON_NODE_ATTR_NULLABLE]))
                $attr->nullable = $one[Cfg::JSON_NODE_ATTR_NULLABLE];
            if (isset($one[Cfg::JSON_NODE_ATTR_PRECISION]))
                $attr->precision = $one[Cfg::JSON_NODE_ATTR_PRECISION];
            if (isset($one[Cfg::JSON_NODE_ATTR_SCALE]))
                $attr->scale = $one[Cfg::JSON_NODE_ATTR_SCALE];
            if (isset($one[Cfg::JSON_NODE_ATTR_SMALL]))
                $attr->small = $one[Cfg::JSON_NODE_ATTR_SMALL];
            if (isset($one[Cfg::JSON_NODE_ATTR_TYPE]))
                $attr->type = $this->normalizeAttrType($one[Cfg::JSON_NODE_ATTR_TYPE]);
            if (isset($one[Cfg::JSON_NODE_ATTR_UNSIGNED]))
                $attr->unsigned = $this->normalizeAttrType($one[Cfg::JSON_NODE_ATTR_UNSIGNED]);

            $result[$name] = $attr;
        }
        return $result;
    }

    private function parseBranch($branch, $namespace)
    {
        $results = [];
        foreach ($branch as $name => $node) {
            if ($name == Cfg::JSON_NODE_DOT) {
                $entity = $this->parseEntity($node, $namespace);
                $results[] = $entity;
            } else {
                $path = $this->hlpPath->normalizeRoot($name, $namespace);
                $entities = $this->parseBranch($node, $path);
                if (count($entities))
                    $results = array_merge($results, $entities);
            }
        }
        return $results;
    }

    private function parseEntity($entity, $namespace)
    {
        $result = new \TeqFw\Lib\Dem\Api\Data\Entity();
        $result->path = $namespace;
        foreach ($entity as $node => $data) {
            if ($node == Cfg::JSON_NODE_ENTITY_DESC) {
                $result->desc = trim($data);
            } elseif ($node == Cfg::JSON_NODE_ENTITY_ATTR) {
                /* parse attributes */
                $result->attrs = $this->parseAttributes($data);
            } elseif ($node == Cfg::JSON_NODE_ENTITY_INDEX) {
                /* parse indexes */
                $result->indexes = $this->parseIndexes($data);
            } elseif ($node == Cfg::JSON_NODE_ENTITY_RELATION) {
                /* parse relations */
                $result->relations = $this->parseRelations($data, $namespace);
            }
        }
        return $result;
    }

    private function parseIndexes(array $indexes)
    {
        $result = [];
        foreach ($indexes as $key => $one) {
            if (
                isset($one[Cfg::JSON_NODE_INDEX_TYPE]) &&
                isset($one[Cfg::JSON_NODE_INDEX_ATTRS])
            ) {
                $type = $one[Cfg::JSON_NODE_INDEX_TYPE];
                $attrs = $one[Cfg::JSON_NODE_INDEX_ATTRS];
                $index = new \TeqFw\Lib\Dem\Api\Data\Entity\Index();
                $index->type = $type;
                $index->attrs = $attrs;
                $result[] = $index;
            }
        }
        return $result;
    }

    public function parseJson(string $json): \TeqFw\Lib\Dem\Api\Data\EntityCollection
    {
        $result = new \TeqFw\Lib\Dem\Api\Data\EntityCollection();
        /* convert string to array */
        $parsed = json_decode($json, true);
        if (!isset($parsed[Cfg::JSON_NODE_DEM]))
            throw new \Exception('There is no root node \'DEM\' in source structure.');
        $dem = $parsed[Cfg::JSON_NODE_DEM];
        $namespace = Cfg::PS;
        if (isset($dem[Cfg::JSON_NODE_DOT])) {
            $namespace = $this->hlpPath->normalizeRoot($dem[Cfg::JSON_NODE_DOT]);
        }
        foreach ($dem as $node => $data) {
            /* skip DEM root dot-node (namespace label). */
            if ($node == Cfg::JSON_NODE_DOT)
                continue;
            /* parse branch and merge to results*/
            $path = $this->hlpPath->normalizeRoot($node, $namespace);
            $entities = $this->parseBranch($data, $path);
            if (count($entities))
                $result->items = array_merge($result->items, $entities);
        }
        return $result;
    }

    /**
     * @param array $relations
     * @param string $namespace
     * @return \TeqFw\Lib\Dem\Api\Data\Entity\Relation[]
     */
    private function parseRelations(array $relations, string $namespace)
    {
        $result = [];
        foreach ($relations as $one) {
            $path = $one[Cfg::JSON_NODE_RELATION_PATH];
            $fullPath = $this->hlpPath->normalizeRoot($path, $namespace);
            $ownAttrs = $one[Cfg::JSON_NODE_RELATION_OWN];
            $foreignAttrs = $one[Cfg::JSON_NODE_RELATION_FOREIGN];
            $relation = new \TeqFw\Lib\Dem\Api\Data\Entity\Relation();
            $relation->pathToForeign = $fullPath;
            $relation->ownAttrs = $ownAttrs;
            $relation->foreignAttrs = $foreignAttrs;
            if (isset($one[Cfg::JSON_NODE_RELATION_ON])) {
                $actions = $one[Cfg::JSON_NODE_RELATION_ON];
                if (isset($actions[Cfg::JSON_NODE_RELATION_ON_DELETE]))
                    $relation->onDelete = $actions[Cfg::JSON_NODE_RELATION_ON_DELETE];
                if (isset($actions[Cfg::JSON_NODE_RELATION_ON_UPDATE]))
                    $relation->onUpdate = $actions[Cfg::JSON_NODE_RELATION_ON_UPDATE];
            }
            $result[] = $relation;
        }
        return $result;
    }
}