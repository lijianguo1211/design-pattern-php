### 流接口模式 Fluent Interface

1. 属于结构型的设计模式

2. **定义：** 用来编写易于阅读的代码，就像自然语言一样。

3. 鄙人之见，流接口模式就是可以瀑布式（链式调用）接口来转发一系列对象方法调用的上下文，这个上下文通常指

3.1 通过被调方法的返回值定义
3.2 自引用，新的上下文等于老的上下文
3.3 返回一个空的上下文来终止

4. 最常见的就是各种php框架里封装的查询`sql`的语句，通过流式接口模式，把`sql`语句封装，然后供客户端方便明了的调用

5. 举例：

```php
namespace Fluent;

interface BuildInterface
{
    public function get();

    public function first();

    public function limit(int $number = 1):self;

    public function offset(int $number):self;

    public function table(string $table, string $alias = ''):self;

    public function where(array $wheres):self;

    public function select(array $fields = ["*"]):self;

    public function orderBy(string $orderName, string $sortType = 'asc'):self;

    public function groupBy(string $groupName):self;
}

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
```

6. 测试

```php
class Client
{
    public function __construct()
    {
        $sqlBuild = new SqlBuild();

        $sqlQuery = $sqlBuild->table('users')
            ->select(['id', 'name'])
            ->where(['id' => 10, 'name' => 'liyi', 'email' => '123@test.com'])
            ->orderBy('id', 'desc')
            ->first();

        echo $sqlQuery;
    }
}
```