<?php


namespace Fluent;


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

require '../vendor/autoload.php';

new Client();