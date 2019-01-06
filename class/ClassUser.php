<?php
ob_start();
@session_start();


include_once('DbConfig.php');

 class userActivity extends dbconnect
{
     public function userRegister($name,$email,$password,$address)
     {
         dbConnect::dbConnection();
         $encPassword=md5($password);
         $sqlCheck="SELECT * FROM user WHERE email='$email'";
         $check=mysqli_query($this->db,$sqlCheck);
         if(mysqli_num_rows($check) <= 0){
             $sqlReg="INSERT INTO user SET name='$name',email='$email',password='$encPassword',address='$address'";
             $result=mysqli_query($this->db,$sqlReg);
             if($result)
             {
                 echo"<script> alert('Account Created');</script>";
                 //header('location: index.php?sidebar=dashboard');

             }
         }
         else{
             echo"<script> alert('Account with that email already exists!');</script>";
         }

     }

    public function userLogin($email,$password)
    {
         dbConnect::dbConnection();
         $encPassword=md5($password);
         $sql5="SELECT * FROM user WHERE email='$email'  AND password='$encPassword'";
        $result=mysqli_query($this->db,$sql5);
        if($result){
            echo "<script>alert('Logged In');</script>";
        }
        else{
            echo "<script>alert('Couldnt logIn');</script>";
        }
        while($row=mysqli_fetch_array($result))
        {
            $_SESSION['uid']=$row['id'];
            $_SESSION['uname']=$row['name'];
            header('location: index.php');

        }


    }
     public function userReview($review,$id)
     {

         if($_SESSION['id']==""){
             echo "<script>alert('please login'); </script>";
             //header('location:product.php?id='.$id.''); die;
         }
         else {

             dbConnect::dbConnection();
             $user_id = $_SESSION['uid'];
             $user_name = $_SESSION['uname'];
             $date = date("Y-m-d");
             $sql5 = "INSERT INTO review SET  product_id=$id,user_name='$user_name', user_id=$user_id, review='$review', `date`='$date'";
             $result = mysqli_query($this->db, $sql5);
             if ($result) {
                 echo "<script> alert('Review is saved');</script>";
             }
         }
     }



}
