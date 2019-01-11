<?php

include_once('DbConfig.php');

class displayCategory extends dbConnect
{

    public function getCategory()
    {
        $getArray = array();
        dbConnect::dbConnection();
        $sql = $this->pdo->query("SELECT * FROM category ORDER BY id ASC");
        while ($row = $sql->fetch()) {
            $getArray[] = $row;
        }
        return $getArray;
    }


}
