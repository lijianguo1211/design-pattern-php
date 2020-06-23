<?php


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