<?php
include('../db.php');

if (isset($_POST['btn'])) {
    // Get form data
    $field = mysqli_real_escape_string($con, $_POST['field']);
    $option = mysqli_real_escape_string($con, $_POST['option']);

    // Insert data into the database
    $sql = "INSERT INTO optionfield (`option_field`, `option`) VALUES ('$field', '$option')";

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
    <form action="./option.php" method="post" enctype="multipart/form-data">
        <div class="form second">
            <div class="details address">
                <div class="fields">
                    <div class="input-field">
                        <label>Selected Field</label>
                        <select name="field" required>
                            <option disabled selected>Select field</option>
                            <option>expenditure field</option>
                            <option></option>
                            <option></option>
                            <option></option>
                            <option></option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Option</label>
                        <input type="text" name="option" placeholder="Enter option name" required>
                    </div>
                </div>
                <button type="submit" name="btn" class="submitBtn">
                    <span class="btnText">Submit</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
        </div>
    </form>
