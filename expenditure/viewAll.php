<?php
session_start();
include('../db.php');

if (!isset($_SESSION["office_id"])) {
    header('location:login.php');
}

$Id = $_SESSION["office_id"];
$get_user = "SELECT * FROM user_information WHERE office_id ='$Id'";
$run_user = mysqli_query($con, $get_user);
$row_user = mysqli_fetch_array($run_user);

$id = $row_user['id'];
$full_name = $row_user['full_name'];
$dob = $row_user['dob'];
$email = $row_user['email'];
$mobile = $row_user['mobile'];
$gender = $row_user['gender'];
$father_name = $row_user['father_name'];
$id_type = $row_user['id_type'];
$id_number = $row_user['id_number'];
$image = $row_user['image'];
$cv = $row_user['cv'];
$issued_date = $row_user['issued_date'];
$expiry_date = $row_user['expiry_date'];
$address_type = $row_user['address_type'];
$nationality = $row_user['nationality'];
$state = $row_user['state'];
$district = $row_user['district'];
$post_number = $row_user['post_number'];
$ward_village = $row_user['ward_village'];
$occupation = $row_user['occupation'];
$office_id = $row_user['office_id'];
$password = $row_user['password'];
$created_at = $row_user['created_at'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Expenditure</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    h1 {
      font-size: 30px;
      color: #fff;
      text-transform: uppercase;
      font-weight: 300;
      text-align: center;
      margin-bottom: 15px;
    }
    table {
      width: 100%;
      table-layout: fixed;
    }
    .tbl-header {
      background-color: rgba(255,255,255,0.3);
    }
    .tbl-content {
      height: 300px;
      overflow-x: auto;
      margin-top: 0px;
      border: 1px solid rgba(255,255,255,0.3);
    }
    th, td {
      padding: 20px 15px;
      text-align: left;
      font-weight: 500;
      font-size: 12px;
      color: #fff;
      text-transform: uppercase;
    }
    td {
      padding: 15px;
      text-align: left;
      vertical-align: middle;
      font-weight: 300;
      font-size: 12px;
      color: #fff;
      border-bottom: solid 1px rgba(255,255,255,0.1);
    }
    body {
      background: linear-gradient(to right, #25c481, #25b7c4);
      font-family: 'Roboto', sans-serif;
    }
    section {
      margin: 50px;
    }
    .made-with-love {
      margin-top: 40px;
      padding: 10px;
      clear: left;
      text-align: center;
      font-size: 10px;
      font-family: arial;
      color: #fff;
    }
    .made-with-love i {
      font-style: normal;
      color: #F50057;
      font-size: 14px;
      position: relative;
      top: 2px;
    }
    .made-with-love a {
      color: #fff;
      text-decoration: none;
    }
    .made-with-love a:hover {
      text-decoration: underline;
    }
    ::-webkit-scrollbar {
      width: 6px;
    }
    ::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
    ::-webkit-scrollbar-thumb {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>
<section>
  <h1>View Expenditure</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Sr-No</th>
          <th>Name</th>
          <th>Expenditure Field</th>
          <th>Amount</th>
          <th>Date</th>
          <th>Description</th>
          <th>Manager</th>
          <th>Admin</th>
          <th>Delete</th>
          <th>Back</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php
        $get_w = "SELECT * FROM expenditure ORDER BY id DESC";
        $run_w = mysqli_query($con, $get_w);
        $i = 1;
        while ($row_w = mysqli_fetch_array($run_w)) {
          $id = $row_w['id'];
          $name = $row_w['name'];
          $field = $row_w['field'];
          $amount = $row_w['amount'];
          $date = $row_w['date'];
          $description = $row_w['description'];
          $status = $row_w['status'];
        ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $field; ?></td>
          <td><?php echo $amount; ?></td>
          <td><?php echo $date; ?></td>
          <td><?php echo $description; ?></td>
          <td>
            <?php
            if ($status == "Pending Payment" && $occupation == "Manager") {
              echo "<form action='./viewAll.php' method='post' enctype='multipart/form-data'>
                      <input type='hidden' name='id' value='$id'>
                      <button type='submit' name='changeMg'><i class='fa fa-check' aria-hidden='true'></i></button>
                    </form>";
            } else if($status == "Received Payment" && $occupation == "Manager") {
              echo "<p>Done</p>";
            }
            else if($status == "Processing" && $occupation == "Manager") {
              echo "<p>Done</p>";
            }
            else if($status == "Processing" && $occupation == "Admin") {
              echo "<p>Done</p>";
            }
            else if($status == "Received Payment" && $occupation == "Admin") {
              echo "<p>Done</p>";
            }
            else{
              echo "<p>Wait For Manager</p>";
            }
            ?>
          </td>
          <td>
            <?php
            if ($status == "Processing"&& $occupation == "Admin") {
              echo "<form action='./viewAll.php' method='post' enctype='multipart/form-data'>
                      <input type='hidden' name='id' value='$id'>
                      <button type='submit' name='changeAd'><i class='fa fa-check' aria-hidden='true'></i></button>
                    </form>";
            } else if($status == "Processing" && $occupation == "Manager") {
              echo "<p>Wait</p>";
            }else if($status == "Received Payment" && $occupation == "Admin") {
              echo "<p>Done</p>";
            }
            else if($status == "Received Payment" && $occupation == "Manager") {
              echo "<p>Done</p>";
            }
            else {
              echo "<p>Wait</p>";
            }
            ?>
          </td>
          <td><a style="color:red;font-size:16px;" href="./delete.php?delete=<?php echo $id; ?>"><i class='fa fa-trash' aria-hidden='true'></i></a></td>
          <td style="font-size:16px;"><a href="./expenditure.php"><i class='fa fa-arrow-left' aria-hidden='true'></i></a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</section>

<div class="made-with-love">
  Made with <i>♥</i> by <a target="_blank" href="https://fonclick.com/furkan">Furkan</a>
</div>
<script src="../js/table.js"></script>
</body>
</html>

<?php
if (isset($_POST['changeMg'])) {
  $id = $_POST['id'];
  $update_status = "UPDATE expenditure SET status = 'Processing' WHERE id = $id";
  if (mysqli_query($con, $update_status)) {
    echo "<script>alert('Done!');</script>";
    echo "<script>window.open('./viewAll.php', '_self');</script>";
  } else {
      echo "Error updating record: " . mysqli_error($con);
  }
}

if (isset($_POST['changeAd'])) {
  $id = $_POST['id'];
  $update_status = "UPDATE expenditure SET status = 'Received Payment' WHERE id = $id";
  if (mysqli_query($con, $update_status)) {
    echo "<script>alert('Done!');</script>";
    echo "<script>window.open('./viewAll.php', '_self');</script>";
  } else {
      echo "Error updating record: " . mysqli_error($con);
  }
}
?>
