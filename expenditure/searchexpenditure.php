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
  <link rel="stylesheet" href="./css/search.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <header class="header">
    <div class="logo">
      <a href="#">LexConsultium</a>
      <div class="search_box">
        <input type="text" placeholder="Search LexConsultium">
        <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
      </div>
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
        <a href="#" class="active">Dashboard</a>
        <a href="#"></a>
        <a href="./searchwork.php?#history_lists">History</a>
        <a href="#">Application</a>
        <a href="#">My Account</a>
        <a href="#">Documnets</a>

        <div class="links">
          <span>Quick Link</span>
          <a href="#"></a>
          <a href="#"></a>
          <a href="#"></a>
        </div>
      </div>
    </nav>

    <div class="main-body">
      <h2>Search</h2>
      <div class="promo_card"style="display:flex;">
      <form action="searchwork.php"  method="post" enctype="multipart/form-data">
      <div class="form-group">
                <label for="sector">Name :</label>
                <select id="sector" name="lrname">
                <?php 
                       $get_d= "select * from lawer";
                       $run_d = mysqli_query($con, $get_d);
                       while($row_d=mysqli_fetch_array($run_d)){
                        $nameD = $row_d['lr_name'];  
                        echo"<option value='$nameD'>$nameD</option> ";
                       }         
               ?>
                </select>
              </div>
              <div class="form-group">
                <label for="date">Start Date:</label>
                <input type="date" id="date"min="2018-01-01" name="datea" required>
            </div>
             <div class="form-group">
                <label for="date">End Date:</label>
                <input type="date" id="date"min="2018-01-01" name="dateb" required>
            </div>
       
        <button type="submit" name="search">Search</button>
      </form>
      </div>

      <div class="history_lists" id="history_lists">
        <div class="list1">
          <div class="row">
            <h4>History</h4>
            <a href="#">See all</a>
          </div>
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Date</th>
                <th>Name</th>
                <th>Bank</th>
                <th>Branch</th>
                <th>Ac Name</th>
                <th>Document</th>
              </tr>
            </thead>
            <tbody>
            <?php
             if(isset($_POST['search']))
             {
              $i=0;
              $name=$_POST['lrname'];
              $datea=$_POST['datea'];
              $dateb=$_POST['dateb'];
               

              $get_w = "select * from work";
              $run_w = mysqli_query($con, $get_w);
              while($row_w=mysqli_fetch_array($run_w)){
               $id = $row_w['id'];
               $Wname = $row_w['wname'];
               $Ref = $row_w['Ref'];
               $Bank = $row_w['Bank'];
               $Branch = $row_w['Branch'];
               $acname = $row_w['acname'];
               $Document = $row_w['Document'];
               $startdat = $row_w['startdat'];
               if($name==$Wname && $datea<=$startdat && $startdat<=$dateb){
              
             echo" <tr>
                <th>$i</th>
                <th>$startdat</th>
                <th>$Wname</th>
                <th>$Bank</th>
                <th>$Branch</th>
                <th>$acname</th>
                <th>$Document</th>
              </tr>";
              $i++;
               }
            } 
            
          ?>
            </tbody>
          </table>
        </div>

        <div class="list2">
          <div class="row">
          </div>
          <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Total Work</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $datea; ?></td>
                <td><?php echo $i; ?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="sidebar">
      

    </div>
  </div>
</body>
</html>



<?php  } ?>