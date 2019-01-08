<?php include_once('include/_header.php'); ?>

<div class="grid-10">
  <?php include('include/_sidebar.php')?>

<div class="grid-85 main-content " style=" height:auto;margin-left:205px;">
  <center>
<table class="form grid-3">
<form action="" method="POST" >
  <tr>
    <input type="hidden" name="type" value="admin">

    <td class="table-title" colspan="2" style="color:white;text-align:center;font-weight:bolder;text-transform:uppercase;">New Admin</td>
  </tr>
<tr>
  <td>Name</td>
  <td><input type="text" name="name"></td>
</tr>
<tr>
  <td>Email</td>
  <td><input type="text" name="email"></td>
</tr>
<tr>
  <td>Password</td>
  <td><input type="password" name="password"></td>
</tr>
<tr>
  <td>Address</td>
  <td><input type="text" name="Address"></td>
</tr>
<tr>
  <td>Admin Type</td>
  <td><select name="type"><option value="SuperAdmin">SuperAdmin</option><option value="Admin">Admin</option></select></td>
</tr>

<tr>
  <td colspan="2" class="text-center"><input type="submit" value="Add" class="button success"></td>
</tr>
</table>

</form>
</table>
</center>
</div>
</div>


<!--</div>-->
<?php include_once('include/_footer.php'); ?>
