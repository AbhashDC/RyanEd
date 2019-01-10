<?php
ob_start();
include_once('session.php');

include_once('../classDbConfig.php');

class adminMiniActivity extends dbConnect
{
    public function adm($name,$email,$password,$address)
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
            if ($row['type'] == 0) {  //admin id
                $_SESSION['aid'] = $row['id'];
                $_SESSION['aname'] = $row['name'];
                $_SESSION['aemail'] = $row['email'];
                header('location: index.php');
            } else { //normal admin id
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                header('location: index.php');
            }
        }
    }

    public function adminRegister($name, $email, $password, $address)
    {
        if($_SESSION['aid']==""){
            header('location: index.php');
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
}
