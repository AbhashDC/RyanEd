<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ed');

Class dbConnect
{
    public $db;

    public function dbConnection()
    {
        $this->pdo = new PDO('mysql:dbname=' . DB_DATABASE . ';host=' . DB_SERVER, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}


?>
