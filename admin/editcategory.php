<?php include_once('include/_header.php'); ?>
<?php
$id=$_GET['id'];
$category=$cat->showOneCategory($id);
?>
<div class="grid-10">
    <?php include('include/_sidebar.php') ?>

    <div class="grid-85 main-content " style=" height:auto;margin-left:205px;">
        <center>
            <table class="form grid-3">
                <form action="" method="POST">
                    <tr>
                        <td class="table-title" colspan="2"
                            style="color:white;text-align:center;font-weight:bolder;text-transform:uppercase;">Edit
                            Category
                        </td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><input type="text" name="category" value="<?php echo $category['category'];?>"></td>
                        <input type="hidden" name="type" value="editCategory">
                        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
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
