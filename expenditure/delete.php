<?php
include('../db.php');
if(isset($_GET['delete'])){
$get_id = $_GET['delete'];

$delete_cli = "delete from expenditure where id='$get_id'";
$run_delete = mysqli_query($con, $delete_cli);

if($run_delete){
    echo "<script>alert('delete  okkay!')</script>";
    echo "<script>window.open('./expenditure.php?view_lawyer','_self')</script>";
 }

}
?>