<?php
include('../db.php');

if (isset($_GET['update'])) {
    $get_id = $_GET['update'];

    $update_s = "SELECT * FROM client WHERE id = ?";
    $stmt = $con->prepare($update_s);
    $stmt->bind_param("i", $get_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row_s = $result->fetch_assoc();

    if ($row_s) {
        $id = $row_s['id'];
        $name = $row_s['name'];
        $email = $row_s['email'];
        $password = $row_s['password'];
    }
    $stmt->close();
}

if (isset($_POST['btn'])) {
    // Get form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $id = mysqli_real_escape_string($con, $_POST['id']);

    // Update data in the database
    $sql = "UPDATE client SET name = ?, email = ?, password = ? WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $password, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data updated successfully!');</script>";
        echo "<script>window.open('./addOption.php', '_self');</script>";
    } else {
        echo "<script>alert('Error: " . $con->error . "');</script>";
        echo "<script>window.open('./addOption.php', '_self');</script>";
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
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter name" value="<?php echo $name; ?>" required>
                </div>
                <div class="input-field">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Enter email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-field">
                    <label>Password</label>
                    <input type="text" name="password" placeholder="Enter password" value="<?php echo $password; ?>" required>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <button type="submit" name="btn" class="submitBtn">
                <span class="btnText">Submit</span>
                <i class="uil uil-navigator"></i>
            </button>
        </div>
    </div>
</form>
