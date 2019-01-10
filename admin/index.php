<?php if($_SERVER['REQUEST_METHOD']=='POST')
{include_once('class/ClassAdminLogin.php');
    $admin=new adminActivity();
    extract($_POST);
    $admin->adminLogin($email,$password);
} ?>
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
<br><center>
<table class=" grid-3 " style="border:2px groove #2A3F52;padding:15px; ">
<form action="" method="post" >
  <tr >
    <th colspan="2"> <p class="title">Log In</p> </th>
  </tr>
  <tr>
    <td>
    <label>Email:</label></td>
    <td> <input type="email" name="email" /></td>
  </tr>
  <tr>
    <td><label>Password:</label></td>
    <td> <input type="password" name="password" /></td>
  </tr>
  <tr>
    <td colspan="2"><center>
    <input type="submit" name="submit" value="Login" class="button submit"/></td>
    <input type="hidden" name="type" value="login" />
  </tr>
</form>
</table></center>
<?php include_once('include/_footer.php'); ?>
