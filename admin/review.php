<?php include_once('include/_header.php'); ?>
<?php include_once('class/ClassAdminReview.php'); ?>

<div class="grid-10">
  <?php include('include/_sidebar.php')?>

<div class="grid-85 main-content " style=" height:auto;margin-left:205px;">

  <table class="grid-9 bg-grey text-center table-radius product-table" style="padding:20px;">
    <tr>
      <td colspan="5"><p class="title">Reviews</p></td>
    </tr>
      <tr class="table-title">
          <th>
              ID
          </th>
          <th>
             Name
          </th>
          <th>
              Review
          </th>
          <th>
              Date
          </th>



          <th rowspan="1">
              Action
          </th>
      </tr>
      <?php
      $rev=new adminReview();
      $review=$rev->showReview();
      foreach($review as $reviews)
      {
      ?>
      <tr>
          <td>
              <?php echo $reviews['id']; ?>
          </td>
          <td>
             <?php echo $reviews['user_name']; ?>
          </td>
          <td>
              <?php echo $reviews['review']; ?>
          </td>
          <td>
              <?php echo $reviews['date']; ?>
          </td>
          <td rowspan="1">
            <a href="" class="text-decoration"><button class="button success text-white">Allow</button></a>
            <a href="" class="text-decoration"><button class="button danger text-white">Dont Allow</button></a>

          </td>
      </tr>
    <?php }?>
      


  </table>
</div>
</div>


<!--</div>-->
<?php include_once('include/_footer.php'); ?>
