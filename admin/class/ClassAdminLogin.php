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
        $sql = $this->pdo->prepare("SELECT * FROM admin WHERE email= :email  AND password= :encPassword");
        $values = [
            'encPassword' => $encPassword,
            'email' => $email
        ];
        $sql->execute($values);
        $count = $sql->rowcount();
        if ($count > 0) {
            while ($row = $sql->fetch()) {
                $_SESSION['aid'] = $row['id'];
                $_SESSION['aname'] = $row['name'];
                $_SESSION['aemail'] = $row['email'];
                $_SESSION['type'] = $row['type'];
                header('location: product.php');

            }
            echo "<script>alert('Logged In');</script>";
        } else {
            echo "<script>alert('Couldnt logIn');</script>";
        }
    }

    public function adminRegister($name, $email, $password, $address)
    {
        if ($_SESSION['type'] !== "0") {
            header('location: index.php');
            die;
        }
        dbConnect::dbConnection();
        $encPassword = md5($password);
        $sql = $this->pdo->prepare("SELECT * FROM admin WHERE email= :email");
        $values = [
            'email' => $email
        ];
        $sql->execute($values);
        $count = $sql->rowcount();
        if ($count <= 0) {
            $sql = $this->pdo->prepare("INSERT INTO admin SET name= :name,email= :email,password= :encPassword,address=:address,type=:type");
            $values = [
                'name' => $name,
                'email' => $email,
                'encPassword' => $encPassword,
                'address' => $address,
                'type' => '1'
            ];
            //$sql->execute($values);

            if ($sql->execute($values)) {
                echo "<script> alert('Account Created');</script>";
                //header('location: index.php?sidebar=dashboard');

            }
        } else {
            echo "<script> alert('Account with that email already exists!');</script>";
        }

    }

//    public function adminDelete($id)
//    {
//        if($_SESSION['type']!=="0"){
//            header('location: index.php');
//            die;
//        }
//        dbConnect::dbConnection();
//        $sql=$this->pdo->prepare("DELETE FROM admin WHERE id= :id");
//        $values=[
//            'id'=>$id
//        ];
//        if($sql->execute($values))
//        {
//            echo "<script> alert('Admin Deleted');</script>";
//        }
//        else{
//            echo "<script> alert('Admin not Deleted');</script>";
//        }
//    }

//    public function adminEdit($id,$name,$email,$password,$address)
//    {
//        if($_SESSION['type']!=="0"){
//            header('location: index.php');
//            die;
//        }
//        else{
//            $type=1;
//            dbConnect::dbConnection();
//
//            $sqlDelete = "UPDATE admin SET name= = 0 WHERE id = $id DELETE FROM admin WHERE id='$id'";
//            mysqli_query($this->db, $sqlDelete);
//        }
//
//    }
    public function getAdmin()
    {
        $getArray = array();
        dbConnect::dbConnection();
        $sql = $this->pdo->query("SELECT * FROM admin ORDER BY id ASC");
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $getArray[] = $row;
        }
        return $getArray;
    }

    public function showOneAdmin($id)
    {
        dbConnect::dbConnection();
        $sql = $this->pdo->prepare("SELECT * FROM admin WHERE id= :id");
        $values = [
            'id' => $id
        ];
        $sql->execute($values);
        while ($var = $sql->fetch()) {
            $getArray = $var;
        }
        return @$getArray;
    }

    public function deleteAdmin($id)
    {
        if ($_SESSION['type'] !== "0") {
            header('location: index.php');
            die;
        }

        dbConnect::dbConnection();
        $sql = $this->pdo->prepare("DELETE FROM admin WHERE id= :id");
        $values = [
            'id' => $id
        ];
        if ($sql->execute($values)) {
            $sql1 = $this->pdo->prepare("DELETE FROM product WHERE admin_id= :id");
            $values1 = [
                'id' => $id
            ];
            if ($sql1->execute($values1)) {

                echo "<script> alert('Admin Deleted');</script>";
            } else {
                echo "<script> alert('Admin not Deleted');</script>";
            }
        } else {
            echo "<script> alert('Admin not Deleted');</script>";
        }
    }

    public function updateAdmin($id, $name, $email, $address)
    {
        if ($_SESSION['type'] !== "0") {
            header('location: index.php');
            die;
        }
        dbConnect::dbConnection();
        $sql=$this->pdo->prepare("UPDATE admin SET name= :name,email= :email,address= :address WHERE id = :id");
        $values=[
            'id'=>$id,
            'name'=>$name,
            'email'=>$email,
            'address'=>$address
        ];
        if($sql->execute($values))
        {
            echo "<script> alert('Admin Updated');</script>";
        }
        else{
            echo "<script> alert('Admin not Updated');</script>";
        }
    }
}
