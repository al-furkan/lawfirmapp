<?php
include('../db.php');

?>
<section>
  <!--for demo wrap-->
  <h1>View Expenditure</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Sr-No</th>
          <th>Name</th>
          <th>Expenditure Field</th>
          <th>Amount</th>
          <th>date</th>
          <th>Description</th>
          <th>Status</th>
          <th>Update</th>
          <th>Delete</th>
          <th><a href="./expenditure.php">Back</a></th>

        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php
               if (isset($_POST['btn1'])) {
                // Get form data
                $names = mysqli_real_escape_string($con, $_POST['name']);
                $dateStart = mysqli_real_escape_string($con, $_POST['dateStart']);
                $dateEnd = mysqli_real_escape_string($con, $_POST['dateEnd']);

                        $get_w = "select * from expenditure order by id desc";
                        $run_w = mysqli_query($con, $get_w);
                         $i=1;
                        while($row_w=mysqli_fetch_array($run_w)){
                         $id = $row_w['id'];
						             $name = $row_w['name'];
                         $field = $row_w['field'];
                         $amount = $row_w['amount'];
                         $date = $row_w['date'];
                         $description = $row_w['description'];
                         $status = $row_w['status'];
                         if($names==$name && $dateStart<=$date && $dateEnd>=$date){
                         ?>
        <tr>
        <td><?php echo $i++; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $field; ?></td>
          <td><?php echo $amount; ?></td>
          <td><?php echo $date; ?></td>
          <td><?php echo $description; ?></td>
          <td><?php echo $status; ?></td>
          <td><a href="./expenditure.php?update=<?php echo $id;?>">Update</a></td>
          <td><a href="./delete.php?delete_exp=<?php echo $id; ?>">Delete</a></td>
          <td><a href="./expenditure.php">Back</a></td>
        </tr>
        <?php}else if($names=="default" && $dateStart<=$date && $dateEnd>=$date){ ?>
          <tr>
        <td><?php echo $i++; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $field; ?></td>
          <td><?php echo $amount; ?></td>
          <td><?php echo $date; ?></td>
          <td><?php echo $description; ?></td>
          <td><?php echo $status; ?></td>
          <td><a href="./expenditure.php?update=<?php echo $id;?>">Update</a></td>
          <td><a href="./delete.php?delete_exp=<?php echo $id; ?>">Delete</a></td>
          <td><a href="./expenditure.php">Back</a></td>
        </tr>
        <?php }
      } }?>
      </tbody>
      
      <tbody>
        <?php
        $Id =  $_SESSION["office_id"];
        $get_user = "select * from user_information where office_id ='$Id'";
        $run_user = mysqli_query($con, $get_user);
        $row_user=mysqli_fetch_array($run_user);
        $id = $row_user['id'];
        $full_name = $row_user['full_name']; 
               if (isset($_POST['btn2'])) {
                // Get form data
                  $dates = mysqli_real_escape_string($con, $_POST['date']);

                        $get_w = "select * from expenditure order by id desc";
                        $run_w = mysqli_query($con, $get_w);
                         $i=1;
                        while($row_w=mysqli_fetch_array($run_w)){
                         $id = $row_w['id'];
						             $name = $row_w['name'];
                         $field = $row_w['field'];
                         $amount = $row_w['amount'];
                         $date = $row_w['date'];
                         $description = $row_w['description'];
                         $status = $row_w['status'];
                         if($name==$full_name && $dates==$date){
                         ?>
        <tr>
        <td><?php echo $i++; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $field; ?></td>
          <td><?php echo $amount; ?></td>
          <td><?php echo $date; ?></td>
          <td><?php echo $description; ?></td>
          <td><?php echo $status; ?></td>
          <td><a href="./expenditure.php?update=<?php echo $id;?>">Update</a></td>
          <td><a href="./delete.php?delete_exp=<?php echo $id; ?>">Delete</a></td>
          <td><a href="./expenditure.php">Back</a></td>
        </tr>
        <?php }
      } }?>
      </tbody>
    </table>
  </div>
</section>