<?php include_once('class/ClassAdminCategory.php'); ?>

<?php include_once('include/_header.php'); ?>
<div class="grid-10">
  <?php include('include/_sidebar.php')?>

<div class="grid-85 main-content " style=" height:auto;margin-left:205px;">

    <table class="grid-9 bg-grey text-center table-radius product-table" style="padding:20px;">
        <tr>
          <td colspan="2" style="text-align:left;">
             <a href="addproduct.php"><button class="button success add">Add New Product</button></a>
         </td>
         <td colspan="8"><p class="title">Products</p></td>
      </tr>

        <tr class="table-title">
            <th>
                ID
            </th>
            <th>
               Title
            </th>
            <th>
                Price
            </th>
            <th>
                Manufacturer
            </th>
            <th>
                Description
            </th>
            <th>
                Category
            </th>
            <th>
                Status
            </th>
            <th>Added By</th>
              <th>Image</th>
            <th rowspan="1">
                Action
            </th>
        </tr>


    <!--    --><?php
    //    $displayCat=($category->getCategory());
    //    foreach($displayCat as  $displays){
    //        ?>
    <!---->
    <!--        <li><a href="index.php?category=--><?php // echo $displays['category']; ?><!--">--><?php // echo $displays['category']; ?><!--</a></li>-->
    <!--    --><?php //}?>
    <?php
    $product=new displayAdminProduct();
    $productv=$product->getAdminProduct();
    foreach($productv as $productdet)
    {

    ?>
        <tr>
            <td>
                <?php echo $productdet['id']; ?>
            </td>
            <td>
             <?php echo $productdet['title']; ?>
            </td>
            <td>
                <?php echo $productdet['price']; ?>
            </td>
            <td>
                <?php echo $productdet['manufacturer']; ?>
            </td>
            <td>
                <?php echo $productdet['description']; ?>
            </td>
            <td>
                <?php echo $productdet['category']; ?>
            </td>
            <td>
                <?php echo $productdet['status']; ?>
            </td>
            <td>johndoe</td>
            <td><img src="" alt="image unavailable" style="height:30px; width:30px"></td>
            <td rowspan="1">
              <button class="button view text-white"><a href="" class="text-decoration">View</a></button>
              <button class="button edit text-white"><a href="editproduct.php" class="text-decoration">Edit</a></button>
              <button class="button delete text-white"><a href="" class="text-decoration">Delete</a></button>
            </td>
        </tr>
      <?php }?>

    </table>

    <br>

        <table  class="grid-3 bg-grey text-center table-radius product-table">
            <tr class="table-title">
                <th colspan="2 text-white">Featured</th>
            </tr>
            <tr>
              <td>Title:</td>
                <td>
                    Pendrive
                </td>
            </tr>
            <tr>
              <td>Price:</td>
                <td>
                     Rs. 42
                </td>
            </tr>
            <tr>
              <td>Manufaturer:</td>
                <td>
                     Someone
                </td>
            </tr>
            <tr>
              <td> Description: </td>
                <td>
                  dsafasdf
                </td>
            </tr>
            <tr>
              <td>Change Product? </td>
                <td>
                    <form>
                      <select>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                    </form> <br>
                  <button class="button success">  Save</button>
                </td>
            </tr>
        </table>

    <!--<br>-->
    <!--<hr> <br>-->
        <table  class="grid-5 bg-grey text-center table-radius product-table">
          <tr>
            <td colspan="3" style="text-align:left;">
              <a href="addcategory.php"> <button class="button success add">Add New Category</button></a>
           </td>
         </tr>

            <tr >
              <th class="table-title">
                  Id
              </th>
                <th class="table-title">
                    Title
                </th>
                <th class="table-title">
                    Action
                </th>
            </tr>

            <?php
            $categ=new adminCategory();
            $category=$categ->showCategory();
            foreach($category as $category)
            {
            ?>
            <tr>
                <td >
                    <?php echo $category['id'];?>
                </td>
                <td>
                      <?php echo $category['category'];?>
                </td>
                <td>


                  <a href="editcategory.php" class="text-decoration"><button class="button edit ">Edit</button></a>
                  <button class="button delete text-white"><a href="" class="text-decoration">Delete</a></button>
                </td>
            </tr>
          <?php }?>

        </table>


</div>
</div>


<!--</div>-->
<?php include_once('include/_footer.php'); ?>
