<?php include_once('include/_header.php');
$id=$_GET['id'];
$produc=$product->showOneCategory($id)?>

<div class="grid-10">
  <?php include('include/_sidebar.php')?>

<div class="grid-85 main-content " style=" height:auto;margin-left:205px;">
  <center>
<table class="form grid-4">
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="type" value="addProduct">
  <tr>
    <td class="table-title" colspan="2" style="color:white;text-align:center;font-weight:bolder;text-transform:uppercase;">New Product</td>
  </tr>
<tr>
  <td>Title</td>
  <td><input type="text" name="title"></td>
</tr>
<tr>
  <td>Price</td>
  <td><input type="number" name="price"></td>
</tr>
<tr>
  <td>Manufacturer</td>
  <td><input type="text" name="manufacturer"></td>
</tr>
<tr>
  <td>Description</td>
  <td><textarea type="text" name="description"></textarea></td>
</tr>
<tr>
  <td>Category</td>
    <td><select name="category">

            <?php  $showMyCategory=$cat->showCategory();
            foreach($showMyCategory as $catapult)
            { ?>
            <option value="<?php echo $catapult['category']; ?>"><?php echo $catapult['category']; ?></option>
            <?php } ?>
        </select>
    </td>
</tr>


<tr>
  <td>Image</td>
  <td><input type="file" name="coverToUpload" required></td>
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
