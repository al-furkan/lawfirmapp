<?php
include('../db.php');

if (isset($_POST['btn'])) {
    // Get form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $field = mysqli_real_escape_string($con, $_POST['field']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Insert data into the database
    $sql = "INSERT INTO expenditure (name, field, amount, date, description, status) VALUES ('$name', '$field', '$amount', '$date', '$description', 'Pending Payment')";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Data submitted successfully!');</script>";
        echo "<script>window.open('expenditure.php', '_self');</script>";
    } else {
        echo "<script>alert('Error: " . $con->error . "');</script>";
        echo "<script>window.open('expenditure.php', '_self');</script>";
    }

    $con->close();
}
?>



<header>Submit Data</header>
    <form action="./input.php" method="post" enctype="multipart/form-data">
        <div class="form second">
            <div class="details address">
                <div class="fields">
                    <div class="input-field">
                        <label>Expenditure Field</label>
                        <select name="field" required>
                            <option disabled selected>Select field in Office</option>
                            <option>Transport</option>
                            <option>Snacks</option>
                            <option>Office</option>
                            <option>Salary</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Amount</label>
                        <input type="text" name="amount" placeholder="Enter amount" required>
                    </div>
                    <div class="input-field">
                        <label>Date</label>
                        <input type="date" name="date" min="2018-01-01" placeholder="Enter date" required>
                    </div>
                    <div class="input-field">
                        <label>Description</label>
                        <input type="text" name="description" placeholder="Enter description" required>
                    </div>
                </div>
                <button type="submit" name="btn" class="submitBtn">
                    <span class="btnText">Submit</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
        </div>
    </form>
