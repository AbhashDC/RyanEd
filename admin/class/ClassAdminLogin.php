<?php
ob_start();
@session_start();

include_once('../class/DbConfig.php');

class adminActivity extends dbConnect
{
    public function adminLogin($email, $password)
    {
        dbConnect::dbConnection();
        $encPassword = md5($password);
        $sql5 = "SELECT * FROM admin WHERE (email='$email'  AND password='$encPassword')";
        $result = mysqli_query($this->db, $sql5);
        if (mysqli_num_rows($result)>=1) {
            while ($row = mysqli_fetch_array($result)) {

                $_SESSION['aid'] = $row['id'];
                $_SESSION['aname'] = $row['name'];
                $_SESSION['aemail'] = $row['email'];
                $_SESSION['type']=$row['type'];
                header('location: product.php');
            }
            echo "<script>alert('Logged In');</script>";
        } else {
            echo "<script>alert('cant logIn');</script>";
        }

    }

    public function adminRegister($name, $email, $password, $address)
    {
        if($_SESSION['type']!=="0"){
            header('location: index.php');
            die;
        }
        dbConnect::dbConnection();
        $encPassword = md5($password);
        $sqlCheck = "SELECT * FROM admin WHERE email='$email'";
        $check = mysqli_query($this->db, $sqlCheck);
        if (mysqli_num_rows($check) <= 0) {
            $sqlReg = "INSERT INTO admin SET name='$name',email='$email',password='$encPassword',address='$address',`type`=1";
            $result = mysqli_query($this->db, $sqlReg);
            if ($result) {
                echo "<script> alert('Account Created');</script>";
                //header('location: index.php?sidebar=dashboard');

            }
        } else {
            echo "<script> alert('Account with that email already exists!');</script>";
        }

    }

    public function adminDelete($id)
    {
        if($_SESSION['type']!=="0"){
            header('location: index.php');
            die;
        }
        dbConnect::dbConnection();
        $sqlDelete = "DELETE FROM admin WHERE id='$id'";
        mysqli_query($this->db, $sqlDelete);
    }
//baki cha
    public function adminEdit($id,$name,$email,$password,$address)
    {
        if($_SESSION['type']!=="0"){
            header('location: index.php');
            die;
        }
        else{
            $type=1;
            dbConnect::dbConnection();

            $sqlDelete = "UPDATE admin SET name= = 0 WHERE id = $id DELETE FROM admin WHERE id='$id'";
            mysqli_query($this->db, $sqlDelete);
        }

    }
    public function getAdmin()
    {
        $getArray = array();
        dbConnect::dbConnection();
        $sql = "SELECT * FROM admin ORDER BY id ASC";
        $result = mysqli_query($this->db, $sql);
        while ($var = mysqli_fetch_array($result)) {
            $getArray[] = $var;
        }
        return $getArray;
    }
    public function showOneAdmin($id)
    {
        dbConnect::dbConnection();
        $sql = "SELECT * FROM admin where id=$id";
        $result = mysqli_query($this->db, $sql);
        while ($var = mysqli_fetch_array($result)) {
            $getArray = $var;
        }
        return $getArray;
    }
    public function deleteAdmin($id)
    {
        dbConnect::dbConnection();
        $sqlDeleteAdmin = "DELETE FROM admin WHERE id=$id";
        $result = mysqli_query($this->db, $sqlDeleteAdmin);
        if ($result) {
            $deleteItem="DELETE FROM product WHERE admin_id=$id";
            $deleteResult=mysqli_query($this->db,$deleteItem);
            echo "<script> alert('Admin Deleted');</script>";
        }
        else{
            echo "<script> alert('Admin not Deleted');</script>";
        }
    }
    public function updateAdmin($id, $name,$email,$address)
    {
        //$encPassword=md5($password);
        dbConnect::dbConnection();
        $sqlUpdateAdmin = "UPDATE admin SET name='$name',email='$email',address='$address' WHERE id = $id";
        $result = mysqli_query($this->db, $sqlUpdateAdmin);
        if ($result) {
            echo "<script> alert('Admin Updated');</script>";
        }
        else{
            echo "<script> alert('Admin Not Updated');</script>";

        }
    }

}
