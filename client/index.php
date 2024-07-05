<?php
    
    session_start();
	include('../db.php');
    $_SESSION["email"];


    if(!isset($_SESSION["email"])){
     header('location:login.php');
    }

    $Id =  $_SESSION["email"];
	$get_user = "select * from client where email ='$Id'";
	$run_user = mysqli_query($con, $get_user);
	$row_user=mysqli_fetch_array($run_user);
	 $id = $row_user['id'];
	 $name = $row_user['name'];
	 $email = $row_user['email'];


if(isset($_POST['btn'])) {

    $assignPerson = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['dis']);
    $date = mysqli_real_escape_string($con, $_POST['date']);

    // Handling file upload
    $document = $_FILES['doc']['name'];
    $temp_name = $_FILES['doc']['tmp_name'];
    $documentFolder = "../uploads/" . basename($document);

    if (move_uploaded_file($temp_name, $documentFolder)) {
        // Insert data into the database
        $query = "INSERT INTO clientdocument (clientid, assignperson, document, description, date,) 
                  VALUES ('$email', '$assignPerson', '$documentFolder', '$description', '$date')";

        if (mysqli_query($con, $query)) {
            echo "Document submitted successfully.";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Failed to upload document.";
    }

    mysqli_close($con);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Lawfirm Client</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-code-alt'></i>
            <div class="logo-name"><span>Fon</span>Click</div>
        </a>
        <ul class="side-menu">
            <li><a href="./index.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="#download"><i class='bx bx-store-alt'></i>Your Document</a></li>
            <li class="active"><a href="./index.php?#input"><i class='bx bx-analyse'></i>Submit Document</a></li>
            <li><a href="#"><i class='bx bx-message-square-dots'></i>Send Message</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="./logout.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <img src="images/logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">Shop</a></li>
                    </ul>
                </div>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download File</span>
                </a>
            </div>

            <!-- Insights -->
            <ul class="insights">
                <li>
                    <i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                            1,074
                        </h3>
                        <p>Paid Order</p>
                    </span>
                </li>
                <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            3,944
                        </h3>
                        <p>Site Visit</p>
                    </span>
                </li>
                <li><i class='bx bx-line-chart'></i>
                    <span class="info">
                        <h3>
                            14,721
                        </h3>
                        <p>Searches</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p>Total Sales</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->


                <!-- End of Insights -->








<div class="input" id="input">
<header>Submit Data</header>
    <form action="./index.php" method="post" enctype="multipart/form-data">
        <div class="form second">
            <div class="details address">
                <div class="fields">
                    <div class="input-field">
                        <label>Assign Person</label>
                        <select name="name" required>
                            <option disabled selected>Select your Name</option>
                            <?php 
                            include('../db.php');
                            $get_d = "SELECT * FROM user_information";
                            $run_d = mysqli_query($con, $get_d);
                            while ($row_d = mysqli_fetch_array($run_d)) {
                                $nameD = $row_d['full_name'];  
                                echo "<option value='$nameD'>$nameD</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Enter Document</label>
                        <input type="file" name="doc" placeholder="Enter document" required>
                    </div>
                    <div class="input-field">
                        <label>Discription</label>
                        <input type="text" name="dis" placeholder="Write some information " required>
                    </div>
                    <div class="input-field">
                        <label>Date</label>
                        <input type="date" name="date" min="2018-01-01" placeholder="Enter date" required>
                    </div>
                </div>
                <button type="submit" name="btn" class="submitBtn">
                    <span class="btnText">Submit</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
        </div>
    </form>
   
</div>
 <!-- input end here -->






            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Recent Document</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Document Id</th>
                                <th>Assign Person</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $get_w = "select * from clientdocument order by id desc";
                        $run_w = mysqli_query($con, $get_w);
                         $i=1;
                        while($row_w=mysqli_fetch_array($run_w)){
                        $id = $row_w['id'];
						$clientid = $row_w['clientid'];
                         $Assignperson = $row_w['assignperson'];
                         $document = $row_w['document'];
                         $description = $row_w['description'];
                         $date = $row_w['date'];
                         $submitdocument = $row_w['submitdocument'];
                         $status = $row_w['status'];
                         if($email== $clientid){
                        ?>


                            <tr>
                            <td><?php echo $id;?></td>
                                <td>
                                <?php echo $Assignperson;?>
                                </td>
                                <td><?php echo $date;?></td>
                                <?php 
                                if($submitdocument!=NULL||$status="Completed"){
                                   echo"
                                   <td><span class='status completed'>Completed</span></td>
                                    </div>
                                    <a href='$submitdocument' class='report'>
                                        <i class='bx bx-cloud-download'></i>
                                        <span>Download File</span>
                                    </a>
                                </div> ";  
                                }
                                else if($status=NULL){
                                    echo"<td><span class='status pending'>Pending</span></td>";
                                }
                                else if($status="Processing"){
                                    echo"<td><span class='status process'>Processing</span></td>";
                                }
                                ?>
                                
                                <td><a href="delete.php?delete=<?php echo $id; ?>">Delete</a></td>
                            </tr>

                        <?php }}?>

                        </tbody>
                    </table>
                </div>

                <!-- Reminders -->
                <div class="reminders" id="download">
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>Remiders</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i>
                    </div>
                    <ul class="task-list">
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>Start Our Meeting</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>Analyse Our Site</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <div class="task-title">
                                <i class='bx bx-x-circle'></i>
                                <p>Play Footbal</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div>

                <!-- End of Reminders-->

            </div>

        </main>

    </div>

    <script src="index.js"></script>
</body>

</html>