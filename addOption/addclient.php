<?php
include('../db.php');

if (isset($_POST['btn'])) {
    // Get form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Insert data into the database
    $sql = "INSERT INTO client (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Data submitted successfully!');</script>";
        echo "<script>window.open('./addOption.php', '_self');</script>";
    } else {
        echo "<script>alert('Error: " . $con->error . "');</script>";
        echo "<script>window.open('./addOption.php', '_self');</script>";
    }

    $con->close();
}
?>

<header>Submit Data</header>
<form action="./addclient.php" method="post" enctype="multipart/form-data">
    <div class="form second">
        <div class="details address">
            <div class="fields">
                <div class="input-field">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter client Name" required>
                </div>
                <div class="input-field">
                    <label>Client ID</label>
                    <input type="text" name="email" placeholder="Enter client ID" required>
                </div>
                <div class="input-field">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter client password" required>
                </div>
            </div>
            <button type="submit" name="btn" class="submitBtn">
                <span class="btnText">Submit</span>
                <i class="uil uil-navigator"></i>
            </button>
        </div>
    </div>
</form>
