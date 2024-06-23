<?php
    
    session_start();
	include('./db.php');
    $_SESSION["office_id"];


    if(!isset($_SESSION["office_id"])){
     header('location:login.php');
    }

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>Deshbored</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                   <a href="./adminprofile.php"> <img src="./images/Screenshot_28.jpg"></a>
                    <h2>Fon<span class="danger">Click</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="index.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="register.php">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Add Users</h3>
                </a>
                <a href="./work.php" class="active">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Work</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>History</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Analytics</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>Tickets</h3>
                    <span class="message-count">27</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Sale List</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="./login.php">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>New Login</h3>
                </a>
                <a href="./logout.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->
        
        <!-- Main Content -->
        <main>
            <h1>Analytics</h1>
            <!-- Analyses -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total Sales</h3>
                            <h1>$65,024</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+81%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Site Visit</h3>
                            <h1>24,981</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Searches</h3>
                            <h1>14,147</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

       <!-- New Users Section -->
<div class="new-users">
    <h2>New Users</h2>
    <div class="user-list" id="user-list">
        <?php
        $get_w = "SELECT * FROM user_information  LIMIT 3";
        $run_w = mysqli_query($con, $get_w);

        if ($run_w) {
            while ($row_w = mysqli_fetch_array($run_w)) {
                $id = $row_w['id'];
                $full_name = $row_w['full_name'];
                $image = $row_w['image'];
                $occupation = $row_w['occupation'];
                ?>
                <div class="user">
                    <img src="<?php echo $image; ?>" alt="<?php echo $full_name; ?>">
                    <h2><?php echo $full_name; ?></h2>
                    <p><?php echo $occupation; ?></p>
                </div>
                <?php 
            }
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
        ?>
        <div class="user" id="more-button">
            <button>
            <img src="images/plus.png" alt="More">
            <h2>More</h2>
            <p>New User</p>
            </button>
        </div>
    </div>
</div>
<!-- End of New Users Section -->

<script>
document.getElementById('more-button').addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'load_more.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            // Append the new user data to the user list
            var userList = document.getElementById('user-list');
            userList.innerHTML = this.responseText;
        } else {
            alert('Failed to load more users');
        }
    };
    xhr.send();
});
</script>



<?php
  
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
     $brance = $row_user['brance'];
	 $created_at = $row_user['created_at'];

?>
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Recent Work</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Course Number</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php echo $full_name; ?></b></p>
                        <small class="text-muted"><?php echo $occupation; ?></small>
                    </div>
                    <a href="./profile.php?id=<?php echo $id; ?>">
                        <div class="profile-photo">
                            <img src="<?php echo $image; ?>">
                        </div>
                    </a>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="images/logo.png">
                    <h2>Fonclick</h2>
                    <p>Fullstack Web Developer</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                10:00 AM - 9:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>


    </div>

    <script src="js/order.js"></script>
    <script src="./js/index.js"></script>
</body>

</html>