<?php
ob_start();
include_once('../../classDbConfig.php');

class adminCategory extends dbConnect
{
    public function showCategory()
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM category ORDER BY id ASC";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;
    }

    public function editCategory($id)
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM category WHERE id=$id";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;
    }

    public function addCategory($category)
    {
        dbConnect::dbConnection();
            $sqlAddCat = "INSERT INTO category SET category='$category'";
            $result = mysqli_query($this->db, $sqlAddCat);
            if ($result) {
                echo "<script> alert('Category Added');</script>";
              }
    }
    public function deleteCategory($id)
    {
        dbConnect::dbConnection();
        $sqlDeleteCat = "DELETE FROM category WHERE id=$id";
        $result = mysqli_query($this->db, $sqlDeleteCat);
        if ($result) {
            echo "<script> alert('Category Deleted');</script>";
        }
    }
    public function updateCategory($id,$category)
    {
        dbConnect::dbConnection();
        $sqlUpdateCat = "UPDATE category SET category='$category' WHERE id = $id";
        $result = mysqli_query($this->db, $sqlUpdateCat);
        if ($result) {
            echo "<script> alert('Category Updated');</script>";
        }
    }
}
