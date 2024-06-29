


<?php
include('../db.php');
if(isset($_GET['opdelete'])){
$get_id = $_GET['opdelete'];

$delete_cli = "delete from optionfield where id='$get_id'";
$run_delete = mysqli_query($con, $delete_cli);

if($run_delete){
    echo "<script>alert('delete  okkay!')</script>";
    echo "<script>window.open('./addOption.php?view_lawyer','_self')</script>";
 }

}
?>

<?php

if(isset($_GET['keydelete'])){
$get_id = $_GET['keydelete'];

$delete_cli = "delete from regkey where id='$get_id'";
$run_delete = mysqli_query($con, $delete_cli);

if($run_delete){
    echo "<script>alert('delete  okkay!')</script>";
    echo "<script>window.open('./addOption.php?view_lawyer','_self')</script>";
 }

}
?>

<?php
include('../db.php');
if (isset($_GET['delete'])) {
    $get_id = mysqli_real_escape_string($con, $_GET['delete']);

    $delete_cli = "DELETE FROM client WHERE id='$get_id'";
    $run_delete = mysqli_query($con, $delete_cli);

    if ($run_delete) {
        echo "<script>alert('Delete successful!')</script>";
        echo "<script>window.open('./addOption.php?view_lawyer','_self')</script>";
    } else {
        echo "<script>alert('Error: Could not delete the record.')</script>";
        echo "<script>window.open('./addOption.php?view_lawyer','_self')</script>";
    }
}
?>
