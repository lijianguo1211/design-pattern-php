<?php


namespace Singleton;

use Singleton\DbConnect;

class Client
{
    public function __construct()
    {
        $test1 = DbConnect::getInstance();

        $sql = "SELECT user,host FROM mysql.user WHERE user = :user";
        $statement = $test1->prepare($sql);

        $username = 'root';
        $statement->bindParam(':user', $username);
        $statement->execute();
        $users = $statement->fetchAll();
        print_r($users);
        var_dump(($test1->query('SELECT user,host FROM mysql.user;'))->fetchAll());
    }
}

require '../vendor/autoload.php';
new Client();
