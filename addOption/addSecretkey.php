<?php
include('../db.php');

if (isset($_POST['btn'])) {
    // Get form data
    $key = mysqli_real_escape_string($con, $_POST['key']);


    // Insert data into the database
    $sql = "INSERT INTO regkey (re_key) VALUES ('$key')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Data submitted successfully!');</script>";
        echo "<script>window.open('addoption.php', '_self');</script>";
    } else {
        echo "<script>alert('Error: " . $con->error . "');</script>";
        echo "<script>window.open('addoption.php', '_self');</script>";
    }

    $con->close();        
}
?>



<header>Submit Data</header>
    <form action="./addSecretkey.php" method="post" enctype="multipart/form-data">
        <div class="form second">
            <div class="details address">
                <div class="fields">
                    <div class="input-field">
                        <label>Secret Key</label>
                        <input type="text" name="key" placeholder="Enter key" required>
                    </div>
                </div>
                <button type="submit" name="btn" class="submitBtn">
                    <span class="btnText">Submit</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
        </div>
    </form>
   