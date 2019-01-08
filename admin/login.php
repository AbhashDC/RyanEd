<?php include_once('include/_header.php'); ?>

<br><center>
<table class="login-form grid-3" style="border:0px;border:2px groove #2A3F52;padding:15px;">
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
