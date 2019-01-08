<?php include_once('include/_header.php'); ?>

<div class="grid-10">
  <?php include('include/_sidebar.php')?>

<div class="grid-85 main-content " style=" height:auto;margin-left:205px;">
  <center>
<table class="form grid-4">
<form action="" method="POST" >
  <tr>
    <td class="table-title" colspan="2" style="color:white;text-align:center;font-weight:bolder;text-transform:uppercase;">New Product</td>
  </tr>
<tr>
  <td>Title</td>
  <td><input type="text" name="category"></td>
</tr>
<tr>
  <td>Price</td>
  <td><input type="text" name="price"></td>
</tr>
<tr>
  <td>Manufacturer</td>
  <td><input type="text" name="Manufacturer"></td>
</tr>
<tr>
  <td>Description</td>
  <td><textarea type="text" name="Description"></textarea></td>
</tr>
<tr>
  <td>Category</td>
  <td><input type="text" name="Category"></td>
</tr>
<tr>
  <td>Status</td>
  <td><select name="status"><option value="1">Show</option><option value="0">hide</option></select></td>
</tr>
<tr>
  <td>Featured</td>
  <td><select name="featured"><option value="1">Feature</option><option value="0">Dont Feature</option></select></td>
</tr>
<tr>
  <td>Image</td>
  <td><input type="file" name="image"></td>
</tr>
<tr>
  <td>Date</td>
  <td><input type="date" name="date"></td>
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
