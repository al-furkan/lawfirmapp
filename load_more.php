<?php
require('./db.php');

$get_w = "SELECT * FROM user_information ORDER BY id DESC";
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
    echo "Error: " . mysqli_error($con);
}
?>
