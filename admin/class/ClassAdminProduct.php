<?php
ob_start();
include_once('session.php');

include_once('../class/DbConfig.php');

class displayAdminProduct extends dbConnect
{
    public function getAdminProduct()  //returns product ordering it by recent date
    {
        $getArray = array();
        dbConnect::dbConnection();
        $sql = $this->pdo->query("SELECT * FROM product ORDER BY `date` DESC");
        while ($row = $sql->fetch()) {
            $getArray[] = $row;
        }
        return $getArray;
    }

    public function getFeaturedProduct() //returns currently featured product
    {

        dbConnect::dbConnection();
        $sql = $this->pdo->query("SELECT * FROM product WHERE featured=0 ORDER BY id ASC");
        while ($row = $sql->fetch()) {
            $getArray = $row;
        }
        return @$getArray;
    }

    public function updateFeaturedProduct($id) //updates featured product by setting it to 0 and rest of the products to 1
    {
        dbConnect::dbConnection();
        $sql = $this->pdo->prepare("UPDATE product SET featured= :featured");
        $values = [

            'featured' => '1'
        ];
        if ($sql->execute($values)) {
            $sql1 = $this->pdo->prepare("UPDATE product SET featured= :featured WHERE id = :id");
            $values1 = [
                'id' => $id,
                'featured' => '0'
            ];
            if ($sql1->execute($values1)) {
                echo "<script> alert('Featured Product Updated');</script>";
            }
        } else {
            echo "<script> alert('Featured Product not Updated');</script>";
        }
    }

    public function sendEmail($title, $price, $description) //This sends email when new product is added although it doesnt work  here
    {
        dbConnect::dbConnection();
        $message = $description . " " . "for just $" . $price;
        $subject = $title . "-" . "New Product";
        $message = wordwrap($message, 70);

        $sql = $this->pdo->query("SELECT * FROM user ");
        while ($row = $sql->fetch()) {
            $email = $row['email'];
            mail("$email", "$subject", $message);
        }
    }

    public function addProduct($title, $price, $manufacturer, $description, $category) //adds product with an image
    {
        date_default_timezone_set('Asia/Kathmandu');
        $date = date("Y-m-d");
        if (!isset($_SESSION['type'])) {
            header('location: index.php');
            die;
        }

        $aid = $_SESSION['aid'];
        $aname = $_SESSION['aname'];
        dbConnect::dbConnection();
        if (!isset($_FILES['coverToUpload']) || $_FILES['coverToUpload']['error'] == UPLOAD_ERR_NO_FILE) {
            echo "<script> alert('Please add image and try again!');</script>";
        } else {
            $date = date('Y-m-d H:i:s');
            $target_dir = "../images/product/";
            $db_dir = "images/product/";
            $target_file = $target_dir . date("d-m-Y") . "-" . time() . basename($_FILES["coverToUpload"]["name"]);
            $db = $db_dir . date("d-m-Y") . "-" . time() . basename($_FILES["coverToUpload"]["name"]);
            $ok = 1;
            $imageName = basename($_FILES["coverToUpload"]["name"]);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $validate = getimagesize($_FILES["coverToUpload"]["tmp_name"]);
            if ($validate !== false) {

                $ok = 1;
            } else {

                $ok = 0;
            }


            if ($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "PNG" && $imageFileType != "png") {
                echo "Sorry, only jpg, png files are allowed.";
                $uploadOk = 0;
            }

            if ($_FILES["coverToUpload"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $ok = 0;
            }


            if ($ok == 0) {
                echo "Sorry, your file was not uploaded.";

            } else {
                if (move_uploaded_file($_FILES["coverToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["coverToUpload"]["name"]) . " has been uploaded.";
                    $sql = $this->pdo->prepare("INSERT INTO product set title=:title,price=:price,manufacturer=:manufacturer,description=:description,category=:category,featured=:featured,img_name=:db,date=:date,admin_id=:aid,admin_name=:aname");
                    $values = [
                        'title' => $title,
                        'price' => $price,
                        'manufacturer' => $manufacturer,
                        'description' => $description,
                        'category' => $category,
                        'featured' => '1',
                        'db' => $db,
                        'date' => $date,
                        'aid' => $aid,
                        'aname' => $aname

                    ];
                    if ($sql->execute($values)) {
                        //displayAdminProduct::sendEmail($title,$price,$description); //sends email but commented beecause it will throw error if we run it on local server
                        echo "<script> alert('Product Added');</script>";
                    } else {
                        echo "<script> alert('Product not added');</script>";
                    }
                }
            }
        }
    }

    public function editProduct($id, $title, $price, $manufacturer, $description, $category) //edits product with or without image
    {

        if (!isset($_SESSION['type'])) {
            header('location: index.php');
            die;
        }
        dbConnect::dbConnection();
        if (!isset($_FILES['coverToUpload']) || $_FILES['coverToUpload']['error'] == UPLOAD_ERR_NO_FILE) {
            $sql = $this->pdo->prepare("UPDATE product set title=:title,price=:price,manufacturer=:manufacturer,description=:description,category=:category WHERE id = :id");
            $values = [
                'title' => $title,
                'price' => $price,
                'manufacturer' => $manufacturer,
                'description' => $description,
                'category' => $category,
                'id' => $id
            ];
            if ($sql->execute($values)) {
                echo "<script> alert('Product Updated');</script>";
            } else {
                echo "<script> alert('Product not added');</script>";
            }
        } else {
            $date = date('Y-m-d H:i:s');
            $target_dir = "../images/product/";
            $db_dir = "images/product/";
            $target_file = $target_dir . date("d-m-Y") . "-" . time() . basename($_FILES["coverToUpload"]["name"]);
            $db = $db_dir . date("d-m-Y") . "-" . time() . basename($_FILES["coverToUpload"]["name"]);
            $ok = 1;
            $imageName = basename($_FILES["coverToUpload"]["name"]);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            $validate = getimagesize($_FILES["coverToUpload"]["tmp_name"]);
            if ($validate !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $ok = 1;
            } else {
                // echo "File is not an image.";
                $ok = 0;
            }
            // Check file size for 5mb
            if ($_FILES["coverToUpload"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $ok = 0;
            }

            // Check if $ok is set to 0 by an error
            if ($ok == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["coverToUpload"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["coverToUpload"]["name"]) . " has been uploaded.";
                    $sql = $this->pdo->prepare("SELECT * FROM product WHERE id= :id");
                    $values = [
                        'id' => $id
                    ];
                    $sql->execute($values);
                    while ($var = $sql->fetch(PDO::FETCH_ASSOC)) {
                        $low = "../";
                        $img = $low . $var["img_name"];
                        unlink($img);
                    }

                    $sql = $this->pdo->prepare("UPDATE product set title=:title,price=:price,manufacturer=:manufacturer,description=:description,category=:category,img_name=:db WHERE id = :id");
                    $values = [
                        'title' => $title,
                        'price' => $price,
                        'manufacturer' => $manufacturer,
                        'description' => $description,
                        'category' => $category,
                        'db' => $db,
                        'id' => $id
                    ];
                    if ($sql->execute($values)) {
                        //displayAdminProduct::sendEmail($title,$price,$description);
                        echo "<script> alert('Product Updated');</script>";
                    } else {
                        echo "<script> alert('Product not Updated');</script>";
                    }
                }
            }
        }
    }

    public function deleteProduct($id) //deletes product along with its review
    {
        dbConnect::dbConnection();
        $sql = $this->pdo->prepare("SELECT * FROM product WHERE id= :id");
        $values = [
            'id' => $id
        ];
        $sql->execute($values);
        while ($var = $sql->fetch()) {
            $low = "../";
            $img = $low . $var["img_name"];
            unlink($img);
        }
        $sql1 = $this->pdo->prepare("DELETE FROM product WHERE id= :id");
        $values1 = [
            'id' => $id
        ];
        $sql2 = $this->pdo->prepare("DELETE FROM review WHERE product_id= :id");
        $values2 = [
            'id' => $id
        ];
        $sql2->execute($values2);
        if ($sql1->execute($values1)) {
            echo "<script> alert('Product Deleted');</script>";
        } else {
            echo "Error in product deletion";
        }


    }


    public function showOneProduct($id) //displays one product for edit
    {
        dbConnect::dbConnection();
        $sql = $this->pdo->prepare("SELECT * FROM product WHERE id= :id");
        $values = [
            'id' => $id
        ];
        $sql->execute($values);
        while ($var = $sql->fetch(PDO::FETCH_ASSOC)) {
            $getArray = $var;
        }
        return $getArray;
    }
}
