<?php include_once('include/_header.php'); ?>
<?php
$id = $_GET['id'];
$p = $product->showOneProduct($id);
?>
<div class="grid-10">
    <?php include('include/_sidebar.php') ?>

    <div class="grid-85 main-content " style=" height:auto;margin-left:205px;">
        <center>
            <table class="form grid-4">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="editProduct">
                    <input type="hidden" name="id" value="<?php echo $p['id']; ?>"
                    <tr>
                        <td class="table-title" colspan="2"
                            style="color:white;text-align:center;font-weight:bolder;text-transform:uppercase;">Edit
                            Product
                        </td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td><input type="text" name="title" value="<?php echo $p['title']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="price" value="<?php echo $p['price']; ?>" required></td>
                    </tr>
                    <tr>
                        <td>Manufacturer</td>
                        <td><input type="text" name="manufacturer" value="<?php echo $p['manufacturer']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><textarea type="text" name="description"
                                      required><?php echo $p['description']; ?></textarea></td>
                    </tr>
                    <tr>

                        <td>Category</td>
                        <td><select name="category">
                                <option value="<?php echo $p['category']; ?>"><?php echo $p['category']; ?></option>
                                <?php $showMyCategory = $cat->showCategory();
                                foreach ($showMyCategory as $catapult) { ?>
                                    <option value="<?php echo $catapult['category']; ?>"><?php echo $catapult['category']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <td>Image</td>
                        <td><input type="file" name="coverToUpload"></td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-center"><input type="submit" value="Update" class="button success">
                        </td>
                    </tr>
            </table>

            </form>
            </table>
        </center>
    </div>
</div>


<!--</div>-->
<?php include_once('include/_footer.php'); ?>
