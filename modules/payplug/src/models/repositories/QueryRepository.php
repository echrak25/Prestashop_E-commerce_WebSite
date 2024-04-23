<?php
/**
 * 2013 - 2024 Payplug SAS.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0).
 * It is available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to contact@payplug.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PayPlug module to newer
 * versions in the future.
 *
 * @author    Payplug SAS
 * @copyright 2013 - 2024 Payplug SAS
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  International Registered Trademark & Property of Payplug SAS
 */

namespace PayPlug\src\models\repositories;

if (!defined('_PS_VERSION_')) {
    exit;
}

class QueryRepository
{
    public $table_name;

    protected $dependencies;

    protected $prefix;

    protected $query = [
        'type' => [],
        'fields' => [],
        'values' => [],
        'from' => [],
        'into' => [],
        'table' => [],
        'set' => [],
        'join' => [],
        'where' => [],
        'whereOr' => [],
        'group' => [],
        'having' => [],
        'order' => [],
        'limit' => ['offset' => 0, 'limit' => 0],
        'lastId' => [],
    ];

    private $data_type_text = [
        'char',
        'varchar',
        'nchar',
        'nvarchar',
        'binary',
        'varbinary',
        'tinyblob',
        'tinytext',
        'text',
        'blob',
        'mediumtext',
        'longtext',
        'longblob',
        'enum',
        'set',
    ];

    private $data_type_length = [
        'char',
        'varchar',
        'nchar',
        'nvarchar',
        'binary',
        'varbinary',
    ];

    public function __construct($prefix = '', $dependencies = null)
    {
        $this->dependencies = $dependencies;
        $this->prefix = $prefix;
    }

    /**
     * Converts object to string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->build();
    }

    public function select()
    {
        $this->query['type'] = 'SELECT';

        return $this;
    }

    public function insert()
    {
        $this->query['type'] = 'INSERT';

        return $this;
    }

    public function update()
    {
        $this->query['type'] = 'UPDATE';

        return $this;
    }

    public function truncate()
    {
        $this->query['type'] = 'TRUNCATE';

        return $this;
    }

    public function delete()
    {
        $this->query['type'] = 'DELETE';

        return $this;
    }

    public function create()
    {
        $this->query['type'] = 'CREATE';

        return $this;
    }

    public function ifExists()
    {
        $this->query['type'] = 'SHOW TABLES LIKE';

        return $this;
    }

    public function drop()
    {
        $this->query['type'] = 'DROP';

        return $this;
    }

    public function fields($fields)
    {
        if (!empty($fields)) {
            $this->query['fields'][] = $fields;
        }

        return $this;
    }

    public function values($values)
    {
        if (!empty($values) || 0 == $values) {
            $this->query['values'][] = '\'' . $values . '\'';
        }

        return $this;
    }

    public function from($table, $alias = null)
    {
        if (!empty($table)) {
            if (empty($this->query['from'])) {
                $this->query['from'] = [];
            }
            $this->query['from'][] = '`' . $table . '`' . ($alias ? ' ' . $alias : '');
        }

        return $this;
    }

    public function into($table, $alias = null)
    {
        if (!empty($table)) {
            if (empty($this->query['into'])) {
                $this->query['into'] = [];
            }
            $this->query['into'][] = '`' . $table . '`' . ($alias ? ' ' . $alias : '');
        }

        return $this;
    }

    public function table($table, $alias = null)
    {
        if (!empty($table)) {
            if (empty($this->query['table'])) {
                $this->query['table'] = [];
            }
            $this->query['table'][] = '`' . $table . '`' . ($alias ? ' ' . $alias : '');
        }

        return $this;
    }

    public function set($set)
    {
        if (!empty($set)) {
            $this->query['set'][] = $set;
        }

        return $this;
    }

    public function condition($condition)
    {
        if (!empty($condition)) {
            $this->query['condition'][] = $condition;
        }

        return $this;
    }

    public function engine($engine)
    {
        if (!empty($engine)) {
            $this->query['engine'][] = $engine;
        }

        return $this;
    }

    public function join($join)
    {
        if (!empty($join)) {
            $this->query['join'][] = $join;
        }

        return $this;
    }

    public function leftJoin($table, $alias = null, $on = null)
    {
        return $this->join('LEFT JOIN `' . bqSQL($table) . '`' . ($alias ? ' `' . pSQL($alias) . '`' : '') .
            ($on ? ' ON ' . $on : ''));
    }

    public function innerJoin($table, $alias = null, $on = null)
    {
        return $this->join('INNER JOIN `' . bqSQL($table) . '`' . ($alias ? ' ' . pSQL($alias) : '') .
            ($on ? ' ON ' . $on : ''));
    }

    public function leftOuterJoin($table, $alias = null, $on = null)
    {
        return $this->join('LEFT OUTER JOIN `' . bqSQL($table) . '`' . ($alias ? ' ' . pSQL($alias) : '') .
            ($on ? ' ON ' . $on : ''));
    }

    public function naturalJoin($table, $alias = null)
    {
        return $this->join('NATURAL JOIN `' . bqSQL($table) . '`' . ($alias ? ' ' . pSQL($alias) : ''));
    }

    public function rightJoin($table, $alias = null, $on = null)
    {
        return $this->join('RIGHT JOIN `' . bqSQL($table) . '`' . ($alias ? ' `' . pSQL($alias) . '`' : '') .
            ($on ? ' ON ' . $on : ''));
    }

    public function where($restriction)
    {
        if (!empty($restriction)) {
            $this->query['where'][] = $restriction;
        }

        return $this;
    }

    public function whereOr($restriction)
    {
        if (!empty($restriction)) {
            $this->query['whereOr'][] = $restriction;
        }

        return $this;
    }

    public function having($restriction)
    {
        if (!empty($restriction)) {
            $this->query['having'][] = $restriction;
        }

        return $this;
    }

    public function orderBy($fields)
    {
        if (!empty($fields)) {
            $this->query['order'][] = $fields;
        }

        return $this;
    }

    public function groupBy($fields)
    {
        if (!empty($fields)) {
            $this->query['group'][] = $fields;
        }

        return $this;
    }

    public function limit($limit, $offset = 0)
    {
        $offset = (int) $offset;
        if ($offset < 0) {
            $offset = 0;
        }

        $this->query['limit'] = [
            'offset' => $offset,
            'limit' => (int) $limit,
        ];

        return $this;
    }

    public function lastId()
    {
        return $this->dependencies->getPlugin()->getQueryAdapter()->getLastId();
    }

    public function getValue($id)
    {
        return $this->dependencies->getPlugin()->getQueryAdapter()->getValue($id);
    }

    public function build($param = false)
    {
        if ('SELECT' == $this->query['type']) {
            $sql = 'SELECT ' . ($this->query['fields'] ? implode(",\n", $this->query['fields']) : '*') . "\n";
            if (!$this->query['from']) {
                $this->query = null;

                exit('Table name not set in QueryRepository (->from() is empty / not set / null). 
                Cannot build a valid SQL query.');
            }

            $sql .= 'FROM ' . implode(', ', $this->query['from']) . "\n";
        } elseif ('INSERT' == $this->query['type']) {
            $sql = 'INSERT INTO ' . implode(",\n", $this->query['into']) . "\n";
            $sql .= '(' . implode(",\n", $this->query['fields']) . ')' . "\n";

            if ($this->query['values']) {
                $sql .= 'VALUES (' . "\n" . implode(",\n", $this->query['values']) . ')' . "\n";
            }
        } elseif ('UPDATE' == $this->query['type']) {
            $sql = 'UPDATE ' . ($this->query['table'] ?
                    implode(",\n", $this->query['table']) :
                    implode(",\n", $this->query['into'])) . "\n";

            if ($this->query['set'] && (!empty($this->query['set']))) {
                $sql .= 'SET ' . implode(',' . "\n", $this->query['set']) . "\n";
            }
        } elseif ('TRUNCATE' == $this->query['type']) {
            $sql = 'TRUNCATE TABLE ' . ($this->query['table'] ?
                    implode(",\n", $this->query['table']) :
                    implode(",\n", $this->query['into'])) . "\n";
        } elseif ('DELETE' == $this->query['type']) {
            if (!$this->query['from']) {
                throw new PrestaShopException('Table name not set in QueryRepository. Cannot build a valid SQL query.');
            }

            $sql = 'DELETE FROM ' . ((isset($this->query['table']) && (!empty($this->query['table']))) ?
                    implode(",\n", $this->query['table']) :
                    implode(",\n", $this->query['from'])) . "\n";
        } elseif ('CREATE' == $this->query['type']) {
            if (!$this->query['table']) {
                throw new PrestaShopException('Can\'t create table because ->table() is not set or empty');
            }

            if (!$this->query['fields']) {
                throw new PrestaShopException('Can\'t create table because ->fields() is not set or empty');
            }

            $sql = 'CREATE TABLE IF NOT EXISTS ' . implode($this->query['table']);

            $condition = (isset($this->query['condition']) && (!empty($this->query['condition']))) ?
                ', ' . implode(' ', $this->query['condition']) :
                '';
            $sql .= '(' . implode(",\n", $this->query['fields']) . "\n {$condition})\n";
            if (isset($this->query['engine']) && (!empty($this->query['engine']))) {
                $sql .= "\n" . 'ENGINE = ' . implode($this->query['engine']);
            }
        } elseif ('DROP' == $this->query['type']) {
            if (!$this->query['table']) {
                throw new PrestaShopException('Table name not set in QueryRepository. Cannot drop it.');
            }

            $sql = 'DROP TABLE IF EXISTS ' . implode($this->query['table']) . "\n";
        } elseif ('SHOW TABLES LIKE' == $this->query['type']) {
            if (!$this->query['table']) {
                throw new PrestaShopException('Table name not set in QueryRepository. Cannot check if exists.');
            }
            $table = str_replace('`', '', implode($this->query['table']));
            $sql = "SHOW TABLES LIKE '%{$table}%'\n";
        } else {
            $sql = $this->query['type'] . ' ';
        }

        if (isset($this->query['join']) && (!empty($this->query['join']))) {
            $sql .= implode("\n", $this->query['join']) . "\n";
        }

        if (isset($this->query['where']) && (!empty($this->query['where']))) {
            foreach ($this->query['where'] as &$where) {
                if (strpos($where, ' = ')) {
                    $column = explode(' = ', $where);
                    $comparator = ' = ';
                } elseif (strpos($where, ' != ')) {
                    $column = explode(' != ', $where);
                    $comparator = ' != ';
                } elseif (strpos($where, ' LIKE ')) {
                    $column = explode(' LIKE ', $where);
                    $comparator = ' LIKE ';
                }

                if ('SELECT' == $this->query['type'] || 'DELETE' == $this->query['type']) {
                    $table = $this->query['from'][0];
                } elseif ('INSERT' == $this->query['type']) {
                    $table = $this->query['into'][0];
                } else {
                    $table = $this->query['table'][0];
                }

                if (!strpos($column[0], '.')) {
                    $column_name = $column[0];
                } else {
                    $column_name_text = explode('.', $column[0]);
                    $column_name = $column_name_text[1];

                    if (isset($this->query['join']) && !empty($this->query['join'])) {
                        foreach ($this->query['join'] as $join) {
                            $table_join = explode(' ON ', $join);
                            $table_alias_join = explode(' ', $table_join[0]);
                            $table_alias = end($table_alias_join);

                            if (str_replace('`', '', $column_name_text[0]) == str_replace('`', '', $table_alias)) {
                                $table = prev($table_alias_join);

                                break;
                            }
                        }
                    }
                }
                $table_name = explode('`', $table);

                $data_type = $this->getDataType($table_name[1], $column_name);

                if (in_array($data_type[0]['DATA_TYPE'], $this->data_type_text)) {
                    $data = str_replace('\'', '', $column[1]);
                    $data = str_replace('"', '', $data);
                    $where = $column[0] . $comparator . '"' . $this->escape($data) . '"';
                } else {
                    $data = trim($column[1]);
                    $where = $column[0] . $comparator . '"' . (int) $data . '"';
                }
            }

            $sql .= 'WHERE (' . implode(') AND (', $this->query['where']);

            if (isset($this->query['whereOr']) && (!empty($this->query['whereOr']))) {
                $sql .= ' OR ';
            }
        }

        if (isset($this->query['whereOr']) && (!empty($this->query['whereOr']))) {
            foreach ($this->query['whereOr'] as &$whereOr) {
                if (strpos($whereOr, ' = ')) {
                    $column = explode(' = ', $whereOr);
                    $comparator = ' = ';
                } elseif (strpos($whereOr, ' != ')) {
                    $column = explode(' != ', $whereOr);
                    $comparator = ' != ';
                } elseif (strpos($whereOr, ' LIKE ')) {
                    $column = explode(' LIKE ', $whereOr);
                    $comparator = ' LIKE ';
                }

                if ('SELECT' == $this->query['type']) {
                    $table = $this->query['from'][0];
                } elseif ('INSERT' == $this->query['type']) {
                    $table = $this->query['into'][0];
                } else {
                    $table = $this->query['table'][0];
                }

                if (!strpos($column[0], '.')) {
                    $column_name = $column[0];
                } else {
                    $column_name_text = explode('.', $column[0]);
                    $column_name = $column_name_text[1];

                    if (isset($this->query['join']) && !empty($this->query['join'])) {
                        foreach ($this->query['join'] as $join) {
                            $table_join = explode(' ON ', $join);
                            $table_alias_join = explode(' ', $table_join[0]);
                            $table_alias = end($table_alias_join);

                            if (str_replace('`', '', $column_name_text[0]) == str_replace('`', '', $table_alias)) {
                                $table = prev($table_alias_join);

                                break;
                            }
                        }
                    }
                }
                $table_name = explode('`', $table);

                $data_type = $this->getDataType($table_name[1], $column_name);

                if (in_array($data_type[0]['DATA_TYPE'], $this->data_type_text)) {
                    $data = str_replace('\'', '', $column[1]);
                    $data = str_replace('"', '', $data);
                    $whereOr = $column[0] . $comparator . '"' . $this->escape($data) . '"';
                } else {
                    $data = trim($column[1]);
                    $whereOr = $column[0] . $comparator . '"' . (int) $data . '"';
                }
            }

            $sql .= implode(' OR ', $this->query['whereOr']) . "\n";
        }

        if (isset($this->query['where']) && (!empty($this->query['where']))
            || isset($this->query['whereOr']) && (!empty($this->query['whereOr']))) {
            $sql .= ')';
        }

        if (isset($this->query['group']) && (!empty($this->query['group']))) {
            $sql .= 'GROUP BY ' . implode(', ', $this->query['group']) . "\n";
        }

        if (isset($this->query['having']) && (!empty($this->query['having']))) {
            $sql .= 'HAVING (' . implode(') AND (', $this->query['having']) . ")\n";
        }

        if (isset($this->query['order']) && (!empty($this->query['order']))) {
            $sql .= 'ORDER BY ' . implode(', ', $this->query['order']) . "\n";
        }

        if ((isset($this->query['limit']))
            && (($this->query['limit']['limit'] > 0) || ($this->query['limit']['offset'] > 0))) {
            $limit = $this->query['limit'];
            $sql .= 'LIMIT ' . ($limit['offset'] ? $limit['offset'] . ', ' : '') . $limit['limit'];
        }

        if (isset($param) && 'debug' == $param) {
            var_dump($sql);

            exit;
        }

        try {
            $result = $this->dependencies->getPlugin()->getQueryAdapter()->query($sql);
        } catch (\Exception $e) {
            // todo: add log
            // $this->logger->addLog('QueryRepository::build() - Exception thrown: ' . $e->getMessage());
            return false;
        }

        if (isset($param) && 'unique_value' == $param && isset($result[0])) {
            $result = reset($result[0]);
        }

        if (isset($param) && 'unique_row' == $param && isset($result[0])) {
            $result = $result[0];
        }

        $this->query = null;
        $sql = null;

        return $result;
    }

    public function getDataType($table, $column)
    {
        $sql = 'SELECT DATA_TYPE, CHARACTER_MAXIMUM_LENGTH as data_type_length
                FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_NAME = "' . str_replace('`', '', $table) . '" AND COLUMN_NAME = "' . str_replace('`', '', $column) . '"';

        return $this->dependencies->getPlugin()->getQueryAdapter()->query($sql);
    }

    public function escape($string, $htmlOK = false)
    {
        return $this->dependencies->getPlugin()->getQueryAdapter()->escape($string, $htmlOK);
    }

    public function setPrefix($prefix = '')
    {
        $this->prefix = $prefix;
    }

    public function initialize()
    {
        $flag = true;
        $repositories = $this->getChildRepositories();
        $engine = $this->dependencies
            ->getPlugin()
            ->getConstant()
            ->get('_MYSQL_ENGINE_');
        $engine = $engine ?: 'InnoDB';

        foreach ($repositories as $repository) {
            if ($flag) {
                $flag = $flag && $repository->initialize($engine);
            }
        }

        return $flag;
    }

    public function uninstall()
    {
        $flag = true;
        $repositories = $this->getChildRepositories();
        foreach ($repositories as $repository) {
            if (!$flag) {
                continue;
            }

            $exists = $this->ifExists()
                ->table($repository->table_name)
                ->build();

            if (!$exists) {
                continue;
            }

            $flag = $flag && $this
                ->drop()
                ->table($repository->table_name)
                ->build();
        }

        return $flag;
    }

    private function getChildRepositories()
    {
        $repositories = [];

        $query = get_class($this);

        foreach (get_declared_classes() as $repository) {
            if (is_subclass_of($repository, $query)) {
                $repository_class = new $repository($this->prefix, $this->dependencies);
                if ($repository_class->table_name && strpos($repository_class->table_name, $this->dependencies->name)) {
                    $repositories[] = $repository_class;
                }
            }
        }

        return $repositories;
    }
}
