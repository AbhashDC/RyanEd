<?php include_once('include/_header.php'); ?>

<div class="grid-10">
<div class="sidebar grid-15">
  <a href="#" class="sidebar-title">Admin Panel</a>
    <a class="active" href="index.php">Products</a>
    <a href="categories.php">Admin list</a>
    <a href="categories.php">Review</a>

    <a href="logout.php" class="red">Logout</a>
</div>
<div class="grid-85 main-content " style=" height:300px;margin-left:205px;">

  <table class="grid-9 bg-grey text-center table-radius product-table" style="padding:20px;">
  <!--    <tr>-->
  <!--        <td>-->
  <!--            <a href="#">Add New Product</a>-->
  <!--        </td>-->
  <!--    </tr>-->

      <tr class="table-title" style="border-radius:20px;">
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

      <tr>
          <td>
              1
          </td>
          <td>
           Pendrive
          </td>
          <td>
              42
          </td>
          <td>
              Dell
          </td>
          <td>
              Description
          </td>
          <td>
              Phone
          </td>
          <td>
              Shown
          </td>
          <td rowspan="1">
            <button class="button view text-white"><a href="" class="text-decoration">View</a></button>
            <button class="button edit text-white"><a href="" class="text-decoration">Edit</a></button>
            <button class="button delete text-white"><a href="" class="text-decoration">Delete</a></button>
          </td>
      </tr>
      <tr>
          <td>
              1
          </td>
          <td>
           Pendrive
          </td>
          <td>
              42
          </td>
          <td>
              Dell
          </td>
          <td>
              Description
          </td>
          <td>
              Phone
          </td>
          <td>
              Shown
          </td>
          <td rowspan="1">
            <button class="button view text-white"><a href="" class="text-decoration">View</a></button>
            <button class="button edit text-white"><a href="" class="text-decoration">Edit</a></button>
            <button class="button delete text-white"><a href="" class="text-decoration">Delete</a></button>
          </td>
      </tr>
      <tr>
          <td>
              1
          </td>
          <td>
           Pendrive
          </td>
          <td>
              42
          </td>
          <td>
              Dell
          </td>
          <td>
              Description
          </td>
          <td>
              Phone
          </td>
          <td>
              Shown
          </td>
          <td rowspan="1">
            <button class="button view text-white"><a href="" class="text-decoration">View</a></button>
            <button class="button edit text-white"><a href="" class="text-decoration">Edit</a></button>
            <button class="button delete text-white"><a href="" class="text-decoration">Delete</a></button>
          </td>
      </tr>
      <tr>
          <td>
              1
          </td>
          <td>
           Pendrive
          </td>
          <td>
              42
          </td>
          <td>
              Dell
          </td>
          <td>
              Description
          </td>
          <td>
              Phone
          </td>
          <td>
              Shown
          </td>
          <td rowspan="1">
            <button class="button view text-white"><a href="" class="text-decoration">View</a></button>
            <button class="button edit text-white"><a href="" class="text-decoration">Edit</a></button>
            <button class="button delete text-white"><a href="" class="text-decoration">Delete</a></button>
          </td>
      </tr>
  </table>

  <br>

      <table  class="grid-3 bg-grey text-center table-radius product-table">
          <tr class="table-title">
              <th colspan="2">Featured</th>
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
                   Rs. 42
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
                  <form> <input type=""></form> <br>
                  Save
              </td>
          </tr>
      </table>

  <!--<br>-->
  <!--<hr> <br>-->
      <table  class="grid-5 bg-grey text-center table-radius product-table">
          <tr >
              <th class="table-title" colspan="2">
                  Category
              </th>
              <th class="table-title">
                  Title
              </th>
              <th class="table-title">
                  Action
              </th>
          </tr>


          <tr>
              <td colspan="2">
                  1
              </td>
              <td>
                  Phone
              </td>
              <td>


                <button class="button edit text-white"><a href="" class="text-decoration">Edit</a></button>
                <button class="button delete text-white"><a href="" class="text-decoration">Delete</a></button>
              </td>
          </tr>

      </table>
</div>
<br>

<!--</div>-->
<?php include_once('include/_footer.php'); ?>
