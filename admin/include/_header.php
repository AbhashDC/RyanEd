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
<?php include_once('class/ClassAdminProduct.php');
  include_once('class/ClassAdminCategory.php');
  include_once('class/ClassAdminLogin.php');
  $admin=new adminActivity();
  $cat=new adminCategory();
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
  }
?>
