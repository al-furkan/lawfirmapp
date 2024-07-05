<?php
session_start();
include('../db.php');

// Ensure the user is logged in
if (!isset($_SESSION["office_id"])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

$Id = $_SESSION["office_id"];
$get_user = "SELECT * FROM user_information WHERE office_id = '$Id'";
$run_user = mysqli_query($con, $get_user);

if (!$run_user) {
    die("Query Failed: " . mysqli_error($con));
}

$row_user = mysqli_fetch_array($run_user);
$full_name = $row_user['full_name'];
$occupation = $row_user['occupation'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../css/search.css"> <!-- Replace with your actual path to CSS -->
    <link rel="stylesheet" href="../css/result.css"> <!-- Replace with your actual path to CSS -->
    <title>View Expenditure</title>
</head>
<body>

<header>Search Data</header>
<?php if ($occupation == "admin" || $occupation == "Manager") { ?>
    <form action="./search.php?#data" method="post" enctype="multipart/form-data">
        <div class="form second">
            <div class="details address">
                <div class="fields">
                    <div class="input-field">
                        <label>Name</label>
                        <select name="name">
                            <option value="default" selected>Select your Name</option>
                            <?php 
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
                        <label>Start Date</label>
                        <input type="date" name="dateStart" min="2018-01-01" placeholder="Enter date">
                    </div>
                    <div class="input-field">
                        <label>End Date</label>
                        <input type="date" name="dateEnd" min="2018-01-01" placeholder="Enter date" required>
                    </div>
                </div>
                <button type="submit" name="btn1" class="submitBtn">
                    <span class="btnText">Search</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
        </div>
    </form>
<?php } else { ?>
    <form action="./search.php?#data" method="post" enctype="multipart/form-data">
        <div class="form second">
            <div class="details address">
                <div class="fields">
                    <div class="input-field">
                        <label>End Date</label>
                        <input type="date" name="date" min="2018-01-01" placeholder="Enter date" required>
                    </div>
                </div>
                <button type="submit" name="btn2" class="submitBtn">
                    <span class="btnText">Search</span>
                    <i class="uil uil-navigator"></i>
                </button>
            </div>
        </div>
    </form>
<?php } ?>

<section id="data">
    <h1>View Expenditure</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>Sr-No</th>
                    <th>Name</th>
                    <th>Expenditure Field</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th><a href="./expenditure.php">Back</a></th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
                <?php
                if (isset($_POST['btn1']) || isset($_POST['btn2'])) {
                    $conditions = [];

                    if (isset($_POST['btn1'])) {
                        $names = mysqli_real_escape_string($con, $_POST['name']);
                        $dateStart = mysqli_real_escape_string($con, $_POST['dateStart']);
                        $dateEnd = mysqli_real_escape_string($con, $_POST['dateEnd']);
                        
                        if ($names != "default") {
                            $conditions[] = "name = '$names'";
                        }
                        if (!empty($dateStart)) {
                            $conditions[] = "date >= '$dateStart'";
                        }
                        if (!empty($dateEnd)) {
                            $conditions[] = "date <= '$dateEnd'";
                        }
                    } elseif (isset($_POST['btn2'])) {
                        $dates = mysqli_real_escape_string($con, $_POST['date']);
                        $conditions[] = "name = '$full_name' AND date = '$dates'";
                    }

                    $query = "SELECT * FROM expenditure";
                    if ($conditions) {
                        $query .= " WHERE " . implode(" AND ", $conditions);
                    }
                    $query .= " ORDER BY id DESC";

                    $run_query = mysqli_query($con, $query);
                    $i = 1;
                    $totalAmount = 0;

                    if ($run_query) {
                        while ($row = mysqli_fetch_array($run_query)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $field = $row['field'];
                            $amount = $row['amount'];
                            $date = $row['date'];
                            $description = $row['description'];
                            $status = $row['status'];
                            $totalAmount += $amount;
                ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $field; ?></td>
                                <td><?php echo $amount; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><a href="./expenditure.php?update=<?php echo $id; ?>">Update</a></td>
                                <td><a href="./delete.php?delete_exp=<?php echo $id; ?>">Delete</a></td>
                                <td><a href="./expenditure.php">Back</a></td>
                            </tr>
                <?php
                        }
                ?>
                        <tr>
                            <td colspan="3"><strong>Total Amount</strong></td>
                            <td><strong><?php echo $totalAmount; ?></strong></td>
                            <td colspan="6"></td>
                        </tr>
                <?php
                    } else {
                        echo "Error: " . mysqli_error($con);
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<script src="../js/table.js"></script>
</body>
</html>
