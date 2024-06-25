<?php
include('../db.php');

if (isset($_GET['update'])) {
    $get_id = $_GET['update'];

    $update_s = "SELECT * FROM expenditure WHERE id = ?";
    $stmt = $con->prepare($update_s);
    $stmt->bind_param("i", $get_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row_s = $result->fetch_assoc();

    if ($row_s) {
        $id = $row_s['id'];
        $field = $row_s['field'];
        $amount = $row_s['amount'];
        $date = $row_s['date'];
        $description = $row_s['description'];
    }
    $stmt->close();
}

if (isset($_POST['btn'])) {
    // Get form data
    $field = mysqli_real_escape_string($con, $_POST['field']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Update data in the database
    $sql = "UPDATE expenditure SET field = ?, amount = ?, date = ?, description = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sisss", $field, $amount, $date, $description, $get_id);

    if ($stmt->execute()) {
        echo "<script>alert('Data submitted successfully!');</script>";
        echo "<script>window.open('expenditure.php', '_self');</script>";
    } else {
        echo "<script>alert('Error: " . $con->error . "');</script>";
        echo "<script>window.open('expenditure.php', '_self');</script>";
    }

    $stmt->close();
    $con->close();
}
?>

    <header>Update Data</header>
    <form action="./update.php" method="post" enctype="multipart/form-data">
        <div class="form second">
            <div class="details address">
                <div class="fields">
                    <div class="input-field">
                        <label>Field</label>
                        <select name="field" required>
                            <option disabled selected>Select field in Office</option>
                            <option value="Transport" <?php echo ($field == 'Transport') ? 'selected' : ''; ?>>Transport</option>
                            <option value="Snacks" <?php echo ($field == 'Snacks') ? 'selected' : ''; ?>>Snacks</option>
                            <option value="Office" <?php echo ($field == 'Office') ? 'selected' : ''; ?>>Office</option>
                            <option value="Salary" <?php echo ($field == 'Salary') ? 'selected' : ''; ?>>Salary</option>
                            <option value="Other" <?php echo ($field == 'Other') ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Amount</label>
                        <input type="text" name="amount" placeholder="Enter amount" value="<?php echo $amount; ?>" required>
                    </div>
                    <div class="input-field">
                        <label>Date</label>
                        <input type="date" name="date" min="2018-01-01" placeholder="Enter date" value="<?php echo $date; ?>" required>
                    </div>
                    <div class="input-field">
                        <label>Description</label>
                        <input type="text" name="description" placeholder="Enter description" value="<?php echo $description; ?>" required>
                    </div>
                </div>
                <button type="submit" name="btn" class="submitBtn">
                    <span class="btnText">Submit</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
        </div>
    </form>

