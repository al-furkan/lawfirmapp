<?php
require("./db.php");
session_start();

if(!isset($_SESSION["re_key"])){
    header('location:chackup.php');
    exit();
}

if (isset($_POST['btn'])) {
    // Get form data
    $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $father_name = mysqli_real_escape_string($con, $_POST['father_name']);
    $id_type = mysqli_real_escape_string($con, $_POST['id_type']);
    $id_number = mysqli_real_escape_string($con, $_POST['id_number']);
    $issued_date = mysqli_real_escape_string($con, $_POST['issued_date']);
    $expiry_date = mysqli_real_escape_string($con, $_POST['expiry_date']);
    $address_type = mysqli_real_escape_string($con, $_POST['address_type']);
    $nationality = mysqli_real_escape_string($con, $_POST['nationality']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $district = mysqli_real_escape_string($con, $_POST['district']);
    $post_number = mysqli_real_escape_string($con, $_POST['post_number']);
    $ward_village = mysqli_real_escape_string($con, $_POST['ward_village']);
    $occupation = mysqli_real_escape_string($con, $_POST['occupation']);
    $office_id = mysqli_real_escape_string($con, $_POST['office_id']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $repeat_password = mysqli_real_escape_string($con, $_POST['repeat_password']);
    $brance = mysqli_real_escape_string($con, $_POST['brance']);

    // Password hashing and validation
    if ($password !== $repeat_password) {
        echo "<script>alert('Passwords do not match!');</script>";
        echo "<script>window.open('register.php', '_self');</script>";
        exit();
    }

    //$hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // File uploads
    $target_dir = "uploads/";
    $target_file_image = $target_dir . basename($_FILES["image"]["name"]);
    $target_file_cv = $target_dir . basename($_FILES["cv"]["name"]);

    // Validate file uploads
    $allowed_image_types = ['image/jpeg', 'image/png', 'image/gif'];
    $allowed_cv_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    $max_file_size = 2 * 1024 * 1024; // 2MB

    if (!in_array($_FILES["image"]["type"], $allowed_image_types) || $_FILES["image"]["size"] > $max_file_size) {
        echo "<script>alert('Invalid image file!');</script>";
        echo "<script>window.open('register.php', '_self');</script>";
        exit();
    }

    if (!in_array($_FILES["cv"]["type"], $allowed_cv_types) || $_FILES["cv"]["size"] > $max_file_size) {
        echo "<script>alert('Invalid CV file!');</script>";
        echo "<script>window.open('register.php', '_self');</script>";
        exit();
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file_image) && move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file_cv)) {
        // Insert data into database
        $sql = "INSERT INTO user_information (
                    full_name, dob, email, mobile, gender, father_name, id_type, id_number, image, cv, issued_date, expiry_date, address_type, nationality, state, district, post_number, ward_village, occupation, office_id, password, brance
                ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )";

        $stmt = $con->prepare($sql);
        $stmt->bind_param(
            "ssssssssssssssssssssss",
            $full_name, $dob, $email, $mobile, $gender, $father_name, $id_type, $id_number, 
            $target_file_image, $target_file_cv, $issued_date, $expiry_date, $address_type, 
            $nationality, $state, $district, $post_number, $ward_village, $occupation, 
            $office_id, $password, $brance
        );

        if ($stmt->execute()) {
            echo "<script>alert('Registration completed successfully!');</script>";
            echo "<script>window.open('register.php', '_self');</script>";
        } else {
            echo "<script>alert('Error: " . $con->error . "');</script>";
            echo "<script>window.open('register.php', '_self');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('File upload failed!');</script>";
        echo "<script>window.open('register.php', '_self');</script>";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="./css/registration.css">
     
    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Registration</title> 
</head>
<body>
    <div class="container">
        <header>Registration</header>
        <div style="display: flex; justify-content: flex-end;">
            <a href="./logout.php" style="background-color: #4070f4; text-decoration: none; color: black; font-size: 20px; padding: 10px; border-radius: 5px;">Logout</a>
        </div>
        <form action="./register.php" method="post" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="full_name" placeholder="Enter your name" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" placeholder="Enter birth date" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" name="mobile" placeholder="Enter mobile number" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gender" required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Father's Name</label>
                            <input type="text" name="father_name" placeholder="Enter father's name" required>
                        </div>
                        
                    </div>
                </div>

                <div class="details ID">
                    <span class="title">Identity Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>ID Type</label>
                            <input type="text" name="id_type" placeholder="Enter ID type" required>
                        </div>

                        <div class="input-field">
                            <label>ID Number</label>
                            <input type="number" name="id_number" placeholder="Enter ID number" required>
                        </div>

                        <div class="input-field">
                            <label>Upload Image</label>
                            <input type="file" name="image" required>
                        </div>

                        <div class="input-field">
                            <label>Upload CV or Resume</label>
                            <input type="file" name="cv" required>
                        </div>

                        <div class="input-field">
                            <label>Issued Date</label>
                            <input type="date" name="issued_date" placeholder="Enter issued date" required>
                        </div>

                        <div class="input-field">
                            <label>Expiry Date</label>
                            <input type="date" name="expiry_date" placeholder="Enter expiry date" required>
                        </div>
                    </div>

                    <button type="button" class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> 
            </div>

            <div class="form second">
                <div class="details address">
                    <span class="title">Address Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Address Type</label>
                            <input type="text" name="address_type" placeholder="Permanent or Temporary" required>
                        </div>

                        <div class="input-field">
                            <label>Nationality</label>
                            <input type="text" name="nationality" placeholder="Enter nationality" required>
                        </div>

                        <div class="input-field">
                            <label>State</label>
                            <input type="text" name="state" placeholder="Enter your state" required>
                        </div>

                        <div class="input-field">
                            <label>District</label>
                            <input type="text" name="district" placeholder="Enter your district" required>
                        </div>

                        <div class="input-field">
                            <label>Post Number</label>
                            <input type="number" name="post_number" placeholder="Enter post number" required>
                        </div>

                        <div class="input-field">
                            <label>Ward/Village Name</label>
                            <input type="text" name="ward_village" placeholder="Enter ward/village name" required>
                        </div>
                    </div>
                </div>

                <div class="details office">
                    <span class="title">Office Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Occupation</label>
                            <select name="occupation" required>
                                <option disabled selected>Select Position in Office</option>
                                <option>Advocate</option>
                                <option>Manager</option>
                                <option>Lawyer</option>
                                <option>Marketing</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Office ID Number</label>
                            <input type="text" name="office_id" placeholder="Office ID Number" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>

                        <div class="input-field">
                            <label>Repeat Password</label>
                            <input type="password" name="repeat_password" placeholder="Repeat Password" required>
                        </div>
                        <div class="input-field">
                            <label>Brance</label>
                            <select name="brance" required>
                                <option disabled selected>Select Brance in Office</option>
                                <option>Brance -1</option>
                                <option>Brance -2</option>
                                <option>Brance -3</option>
                                <option>Brance -4</option>
                            </select>
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button type="submit" name="btn" class="submitBtn">
                             <span class="btnText">Submit</span>
                             <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>

    <script src="./js/registration.js"></script>
</body>
</html>
