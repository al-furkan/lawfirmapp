<?php
session_start();
include('../db.php');

// Check if the office_id session variable is set
if (!isset($_SESSION["office_id"])) {
    header('Location: login.php');
    exit();
}

$Id = $_SESSION["office_id"];
$get_user = "SELECT * FROM user_information WHERE office_id ='$Id'";
$run_user = mysqli_query($con, $get_user);
$row_user = mysqli_fetch_array($run_user);

// Assign user data to variables
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
    th {
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
          <th>Email</th>
          <th>Password</th>
          <th>Update</th>
          <th>Delete</th>
          <th><a href="./addOption.php">Back</a></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php
        $get_w = "SELECT * FROM client ORDER BY id DESC";
        $run_w = mysqli_query($con, $get_w);
        $i = 1;
        while ($row_w = mysqli_fetch_array($run_w)) {
          $id = $row_w['id'];
          $name = $row_w['name'];
          $email = $row_w['email'];
          $password = $row_w['password'];
        ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $password; ?></td>
          <td><a href="./addOption.php?update=<?php echo $id; ?>">Update</a></td> 
          <td><a href="./delete.php?delete=<?php echo $id; ?>">Delete</a></td>
          <td><a href="./addOption.php">Back</a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</section>

<div class="made-with-love">
  Fonclick
  <i>♥</i> by
  <a target="_blank" href="https://fonclick.com/furkan">Furkan</a>
</div>
<script src="../js/table.js"></script>
</body>
</html>
