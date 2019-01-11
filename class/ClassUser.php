<?php
ob_start();
@session_start();


include_once('DbConfig.php');

class userActivity extends dbconnect
{
    public function userRegister($name, $email, $password, $address)
    {
        dbConnect::dbConnection();
        $encPassword = md5($password);
        $sql = $this->pdo->prepare("SELECT * FROM user WHERE email= :email");
        $values = [
            'email' => $email
        ];
        $sql->execute($values);
        $count = $sql->rowcount();
        if ($count <= 0) {
            $sql = $this->pdo->prepare("INSERT INTO user SET name= :name,email= :email,password= :encPassword,address=:address");
            $values = [
                'name' => $name,
                'email' => $email,
                'encPassword' => $encPassword,
                'address' => $address
            ];


            if ($sql->execute($values)) {
                echo "<script> alert('Account Created');</script>";

            }
        } else {
            echo "<script> alert('Account with that email already exists!');</script>";
        }

    }

    public function userLogin($email, $password)
    {
        dbConnect::dbConnection();
        $encPassword = md5($password);
        $sql = $this->pdo->prepare("SELECT * FROM user WHERE email= :email  AND password= :encPassword");
        $values = [
            'encPassword' => $encPassword,
            'email' => $email
        ];
        $sql->execute($values);
        $count = $sql->rowcount();
        if ($count > 0) {
            echo "<script>alert('Logged In');</script>";
        } else {
            echo "<script>alert('Couldnt logIn');</script>";
        }
        while ($row = $sql->fetch()) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            header('location: index.php');

        }


    }

    public function userReview($review, $id)
    {

        if (@$_SESSION['id'] == "") {
            echo "<script>alert('please login'); </script>";

        } else {

            dbConnect::dbConnection();
            $user_id = $_SESSION['id'];
            $user_name = $_SESSION['name'];
            $date = date("Y-m-d");
            $sql = $this->pdo->prepare("INSERT INTO review SET  product_id= :id,user_name= :user_name, user_id= :user_id, status= :status,review= :review,`date`= :date");
            $values = [
                'id' => $id,
                'user_name' => $user_name,
                'user_id' => $user_id,
                'review' => $review,
                'date' => $date,
                'status' => '1'
            ];
            if ($sql->execute($values)) {
                echo "<script> alert('Review is saved');</script>";
            }
        }
    }


}
