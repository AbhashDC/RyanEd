<?php
ob_start();
session_start();

include_once('../class/DbConfig.php');

class displayAdminProduct extends dbConnect
{
    public function getAdminProduct()
    {
        $getArray=array();
        dbConnect::dbConnection();
        $sql="SELECT * FROM product ORDER BY `date` ASC";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray[]=$var;
        }
        return $getArray;
    }

    public function getFeaturedProduct()
    {
        dbConnect::dbConnection();
        $sql="SELECT * FROM product WHERE featured = 0";
        $result=mysqli_query($this->db,$sql);
        while($var=mysqli_fetch_array($result))
        {
            $getArray=$var;
        }
        return @$getArray;
    }

    public function updateFeaturedProduct($id)
    {
        dbConnect::dbConnection();

        $sql1="UPDATE product SET featured = 1";
        mysqli_query($this->db,$sql1);

        $sql="UPDATE product SET featured = 0 WHERE id = $id";
        mysqli_query($this->db,$sql);

    }
    public function sendEmail($title,$price,$description){
        $message = $description." "."for just $".$price;
        $subject=$title."-"."New Product";
        $message = wordwrap($message,70);
        $getEmailData="SELECT * FROM USER";
        $data=mysqli_query($this->db,$getEmailData);
        while($arrayOfData=mysqli_fetch_array($data))
        {
            $email=$arrayOfData['email'];
            mail("$email","$subject",$message);
        }


    }
    public function addProduct($title,$price,$manufacturer,$description,$category)
    {
        date_default_timezone_set('Asia/Kathmandu');
        $date= date("Y-m-d");
        if(!isset($_SESSION['type']))
        {
          header('location: index.php');
          die;
        }

        $aid=$_SESSION['aid'];
        $aname=$_SESSION['aname'];
        dbConnect::dbConnection();
        if(!isset($_FILES['coverToUpload']) || $_FILES['coverToUpload']['error'] == UPLOAD_ERR_NO_FILE) {}
        else{
            $date=date('Y-m-d H:i:s');
            $target_dir = "../images/product/";
            $db_dir="images/product/";
            $target_file = $target_dir . date("d-m-Y")."-".time(). basename($_FILES["coverToUpload"]["name"]);
            $db= $db_dir . date("d-m-Y")."-".time().basename($_FILES["coverToUpload"]["name"]);
            $uploadOk = 1;
            $imageName=basename($_FILES["coverToUpload"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            $validate = getimagesize($_FILES["coverToUpload"]["tmp_name"]);
            if($validate !== false) {
               // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
               // echo "File is not an image.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["coverToUpload"]["size"] > 50000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["coverToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["coverToUpload"]["name"]). " has been uploaded.";

                    $sqlInsert="INSERT INTO product set title='$title',price='$price',manufacturer='$manufacturer',description='$description',category='$category',featured='1',img_name='$db',date='$date',admin_id='$aid',admin_name='$aname'";
                    $result=mysqli_query($this->db,$sqlInsert);
                    if ($result) {
                        //displayAdminProduct::sendEmail($title,$price,$description);
                        echo "<script> alert('Product Added');</script>";
                    }
                    else {
                        echo "<script> alert('Product not added');</script>";
                    }
                }
            }
        }
    }
    public function deleteProduct($id)
    {
        dbConnect::dbConnection();
        $sqlSel="SELECT * FROM product WHERE `id`=$id";
        $data=mysqli_query($this->db,$sqlSel);
        while($row=mysqli_fetch_array($data))
        {
            $low="../";
            $img=$low . $row["img_name"];
            unlink($img);
        }
        $sql2="DELETE from product where id=$id";
        $delete=mysqli_query($this->db,$sql2);
        if($delete)
        {
            header('location: product.php');
        }
        else {
            echo "Error in product deletion";
        }
    }
}
