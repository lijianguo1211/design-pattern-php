<?php


namespace Fluent;


class SqlBuild implements BuildInterface
{

    private $sql;

    private $table;

    private $select;

    private $where;

    private $limit = 1;

    private $order;

    private $group;

    public function __construct()
    {
        $this->sql = sprintf("select ");
    }

    public function get()
    {
        // TODO: Implement get() method.
        return $this->sql . $this->select . $this->table . $this->where . $this->order;
    }

    public function first()
    {
        // TODO: Implement first() method.
        return $this->sql . $this->select . $this->table . $this->where . $this->order . ' limit ' . $this->limit;
    }

    public function limit(int $number = 1): BuildInterface
    {
        // TODO: Implement limit() method.
        $this->limit = $number;

        return $this;
    }

    public function offset(int $number): BuildInterface
    {
        // TODO: Implement offset() method.
    }

    public function table(string $table, string $alias = ''): BuildInterface
    {
        // TODO: Implement table() method.
        $this->table = sprintf(" `%s` ", $table);

        !empty($alias) && $this->table .= sprintf("as %s", $alias);

        return $this;
    }

    public function where(array $wheres): BuildInterface
    {
        // TODO: Implement where() method.
        $tempWhere = '';
        static $level = 0;
        foreach ($wheres as $where => $item) {
            if (is_int($item)) {
                if ($level == 0) {
                    $tempWhere .= sprintf("`%s` = %d", $where, $item);
                } else {
                    $tempWhere .= sprintf(" and `%s` = %d", $where, $item);
                }
            } elseif (is_string($item)) {
                if ($level == 0) {
                    $tempWhere .= sprintf("`%s` = '%s'", $where, $item);
                } else {
                    $tempWhere .= sprintf(" and `%s` = '%s'", $where, $item);
                }
            } else {
                if ($level == 0) {
                    $tempWhere .= sprintf("%s = '%s'", $where, $item);
                } else {
                    $tempWhere .= sprintf(" and %s = '%s'", $where, $item);
                }
            }
            $level++;
        }

        $this->where = sprintf("where %s", $tempWhere);

        return $this;
    }

    public function select(array $fields = ["*"]): BuildInterface
    {
        // TODO: Implement select() method.
        $select = implode("`, `", $fields);
        $select = rtrim($select, ',');
        $select = '`' . $select . '`';
        $this->select = sprintf("%s from ", $select);

        return $this;
    }

    public function orderBy(string $orderName, string $sortType = 'asc'): BuildInterface
    {
        // TODO: Implement orderBy() method.
        $this->order = sprintf(" order by `%s` %s", $orderName, $sortType);

        return $this;
    }

    public function groupBy(string $groupName): BuildInterface
    {
        // TODO: Implement groupBy() method.
        $this->group = sprintf(" group by %s", $groupName);

        return $this;
    }
}