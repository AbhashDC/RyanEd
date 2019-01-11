<?php
ob_start();
include_once('../class/DbConfig.php');
include_once('session.php');
class adminCategory extends dbConnect
{
    public function showCategory()
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql = $this->pdo->query("SELECT * FROM category ORDER BY id ASC");
        while($row=$sql->fetch())
        {
            $getArray[]=$row;
        }
        return $getArray;
    }
    public function showOneCategory($id)
    {
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("SELECT * FROM category WHERE id= :id");
        $values=[
            'id'=>$id
        ];
        $sql->execute($values);
        while($var=$sql->fetch(PDO::FETCH_ASSOC))
        {
            $getArray=$var;
        }
        return $getArray;
    }


    public function addCategory($category)
    {
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("INSERT INTO category SET category= :category");
        $values=[
            'category'=>$category
        ];
        if($sql->execute($values))
        {
            echo "<script> alert('Category Added');</script>";
        } else {
            echo "<script> alert('Category not added');</script>";
        }
    }

    public function deleteCategory($id)
    {
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("DELETE FROM category WHERE id= :id");
        $values=[
            'id'=>$id
        ];
        if($sql->execute($values))
        {
            echo "<script> alert('Category Deleted');</script>";
        }
        else{
            echo "<script> alert('Category not Deleted');</script>";
    }
    }

    public function updateCategory($id, $category)
    {
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("UPDATE category SET category= :category WHERE id = :id");
        $values=[
            'id'=>$id,
            'category'=>$category
        ];
        if($sql->execute($values))
        {
            echo "<script> alert('Category Updated');</script>";
        }
        else{
            echo "<script> alert('Category not Updated');</script>";
        }
    }
}
