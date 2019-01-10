<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />

</head>
<body>
<?php
include_once('class/ClassAdminProduct.php');
  include_once('class/ClassAdminCategory.php');
  include_once('class/ClassAdminLogin.php');
  include_once('class/ClassAdminReview.php');
$product= new displayAdminProduct();
  $admin=new adminActivity();
  $cat=new adminCategory();
  $rev=new adminReview();
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    extract($_POST);
    if($type=='category')
    {
      $cat->addCategory($category);
    }
    elseif($type=='admin')
    {
      $admin->adminRegister($name, $email, $password, $address);
    }
    elseif($type=='reviewAllow')
    {
        $rev->disableReview($id);
    }
    elseif($type=='reviewDontAllow')
    {
        $rev->enableReview($id);
    }
    elseif($type=='addProduct')
    {
        $product->addProduct($title,$price,$manufacturer,$description,$category);
    }
    elseif($type=='login')
    {
        $admin->adminLogin($email,$password);
    }
    elseif($type=='featuredProductChange')
    {
        $product->updateFeaturedProduct($featuredProduct);
    }
    elseif($type=='deleteProduct')
    {
        $product->deleteProduct($id);
    }
    elseif($type=='deleteCategory')
    {
        $cat->deleteCategory($id);
    }
    elseif($type=='editCategory')
    {
        $cat->updateCategory($id, $category);
    }
    elseif($type=='editAdmin')
    {
        $admin->updateAdmin($id, $name,$email,$address);
    }
    elseif($type=='deleteAdmin')
    {
        $admin->deleteAdmin($id);
    }
    elseif($type=='editProduct')
    {
        $product->editProduct($id,$title,$price,$manufacturer,$description,$category);
    }
  }
?>
