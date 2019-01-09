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
        $sql5 = "SELECT * FROM admin WHERE email='$email'  AND password='$encPassword'";
        $result = mysqli_query($this->db, $sql5);
        if ($result) {
            echo "<script>alert('Logged In');</script>";
        } else {
            echo "<script>alert('Couldnt logIn');</script>";
        }
        while ($row = mysqli_fetch_array($result)) {

                $_SESSION['aid'] = $row['id'];
                $_SESSION['aname'] = $row['name'];
                $_SESSION['aemail'] = $row['email'];
                $_SESSION['type']=$row['type'];
                header('location: product.php');
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
}
