<?php
ob_start();
@session_start();


include_once('DbConfig.php');

class fUser
{

    public function userLogin($name,$password)
    {
        // dbConnect::dbConnection();
        // $npassword=$_POST['password'];
        $epassword=md5($password);
        //$db=new mysqli("localhost","root","","vtg");
        $sql5="SELECT * FROM user WHERE (name='$name' or email='$name' or contact='$name') AND password='$epassword'";
        $result=mysqli_query($this->db,$sql5);
        while($row=mysqli_fetch_array($result))
        {
            $_SESSION['id']=$row['id'];
            $_SESSION['username']=$row['username'];
            $_SESSION['fname']=$row['first_name'];
            $_SESSION['lname']=$row['last_name'];
            $_SESSION['image']=$row['image'];
            $_SESSION['admintype']=$row['type'];
            $admintype=$row['type'];
            $_SESSION['vendor']=$row['vtype'];
            $_SESSION['company']=$row['company_name'];
            header('location: index.php?sidebar=dashboard');

        }



        if($count_row)
        {

            $_SESSION['cus_id']=$row['cid'];
            $_SESSION['cus_username']=$row['cusername'];
            $_SESSION['cus_fname']=$row['cfirst_name'];
            $_SESSION['cus_lname']=$row['clast_name'];
            $_SESSION['cus_image']=$row['cimage'];
            $_SESSION['cus_email']=$row['cemail'];
            $sescusid= $_SESSION['cus_id'];
            $_SESSION['count']=0;
            //  header("Location: productdetail.php?id=$sesid");
            header('Location: '.$_SERVER['PHP_SELF']);
            die;
        }
        else{
            echo "<script>alert('Wrong user details');</script>";
        }
    }



}
