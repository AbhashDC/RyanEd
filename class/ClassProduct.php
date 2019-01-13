<?php
ob_start();
session_start();

include_once('DbConfig.php');

class displayProduct extends dbConnect
{
    public function search($category) //Finds product with same category and returns it
    {
        $getArray = array();
        dbConnect::dbConnection();
        $sql = $this->pdo->prepare("SELECT * FROM product WHERE category = :category ORDER BY `date` DESC");
        $values = [
            'category' => $category
        ];
        $sql->execute($values);
        while ($var = $sql->fetch()) {
            $getArray[] = $var;
        }
        return $getArray;
    }

    public function findId($id) //Finds a specific product and returns its data
    {
        $getArray = array();
        dbConnect::dbConnection();
        $sql = $this->pdo->prepare("SELECT * FROM product WHERE id = :id");
        $values = [
            'id' => $id
        ];
        $sql->execute($values);
        while ($var = $sql->fetch()) {
            $getArray[] = $var;
        }
        return $getArray;

    }

    public function getReview($id) //Finds all review with a specific product id and returns it
    {
        $getArray = array();
        dbConnect::dbConnection();

        $sql = $this->pdo->prepare("SELECT * FROM review WHERE product_id = :id AND status= :status ORDER BY `date` DESC");
        $values = [
            'id' => $id,
            'status' => '0'
        ];
        $sql->execute($values);
        while ($var = $sql->fetch()) {
            $getArray[] = $var;
        }
        return $getArray;
    }

    public function getUserReview($id) //Finds all the review of a particular user and returns it
    {
        $getArray = array();
        dbConnect::dbConnection();
        $sql = $this->pdo->prepare("SELECT * FROM review WHERE user_id = $id");
        $values = [
            'id' => $id
        ];
        $sql->execute($values);
        while ($var = $sql->fetch()) {
            $getArray[] = $var;
        }
        return $getArray;
    }

    public function productName($id)  //Function which returns a specific product
    {

        dbConnect::dbConnection();

        $sql = $this->pdo->prepare("SELECT * FROM product WHERE id= :id");
        $values = [
            'id' => $id
        ];
        $sql->execute($values);
        while ($var = $sql->fetch(PDO::FETCH_ASSOC)) {
            $getArray[] = $var;
        }
        return $getArray;
    }

    public function searchItems($item) //This function searches the user input and returns all the result as an array
    {
        $getArray = array();
        dbConnect::dbConnection();

        $sql = $this->pdo->prepare("SELECT * FROM product WHERE title LIKE ? order by `date` desc");
        $sql->bindValue(1, "%$item%", PDO::PARAM_STR);
        $sql->execute();
        while ($var = $sql->fetch()) {
            $getArray[] = $var;
        }
        return $getArray;
    }

    public function sideBar() //Displays the sidebar of our system and pulls the fetaured product from database and returns all the result as an array
    {
        $getArray = array();
        dbConnect::dbConnection();
        $sql = $this->pdo->prepare("SELECT * FROM product WHERE `featured` = :feat");
        $values = [
            'feat' => '0'
        ];
        $sql->execute($values);
        while ($var = $sql->fetch()) {
            $getArray[] = $var;
        }
        return $getArray;
    }

    public function getProduct() //Displays all the product ordering by latest date
    {
        $getArray = array();
        dbConnect::dbConnection();
        $sql = $this->pdo->query("SELECT * FROM product ORDER BY `date` DESC ");
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $getArray[] = $row;
        }
        return $getArray;
    }
}
