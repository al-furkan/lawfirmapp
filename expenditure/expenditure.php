<?php
    
    session_start();
	include('../db.php');
    $_SESSION["office_id"];


    if(!isset($_SESSION["office_id"])){
     header('location:login.php');
    }

	$Id =  $_SESSION["office_id"];
	$get_user = "select * from user_information where office_id ='$Id'";
	$run_user = mysqli_query($con, $get_user);
	$row_user=mysqli_fetch_array($run_user);
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
  <meta charset="UTF-8" />
  <title>Searchwork</title>
  <link rel="stylesheet" href="../css/search.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="./style.css"> -->
</head>
<body>
  <header class="header">
    <div class="logo">
      <a href="../index.php">Expenditure(ব্যয়)</a>
    </div>

    <div class="header-icons">
      <i class="fas fa-bell"></i>
      <div class="account">
      </div>
    </div>
  </header>
  <div class="container">
    <nav>
      <div class="side_navbar">
        <span>Main Menu</span>
            <a href="expenditure.php?input=1" class="<?php echo (isset($_GET['input']) ? 'active' : ''); ?>">Submit data</a>
            <a href="expenditure.php?srcex=1" class="<?php echo (isset($_GET['srcex']) ? 'active' : ''); ?>">Multiple Searching</a>
            <a href="expenditure.php?srcex=1" class="<?php echo (isset($_GET['srcex']) ? 'active' : ''); ?>">Single Searching</a>

        <div class="links">
          <span>Quick Link</span>
          <a href="./view.php">View</a>
          <a href="./view.php">View Rjsc</a>
         
        </div>
      </div>
    </nav>

    <div class="main-body">
      <div class="promo_card">
      <?php  
                // Validate and sanitize GET parameters
                if(filter_input(INPUT_GET, 'input', FILTER_VALIDATE_INT)) {
                    include_once("./input.php");
                } elseif(filter_input(INPUT_GET, 'srcex', FILTER_VALIDATE_INT)) {
                    include_once("./search.php");
                } else {
                    echo "<p>Please select a valid option from the menu.</p>";
                }
            ?>
      </div>

      <div class="history_lists" id="history_lists">
        <div class="list1">
          <div class="row">
           
        </div>

        <div class="list2">
          <div class="row">
          </div>
        </div>
      </div>
    </div>

    <div class="sidebar">
      

    </div>
  </div>
  <script>feather.replace();</script>
</body>
</html>



<?php  //} ?>