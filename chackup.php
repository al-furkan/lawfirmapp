<?php
session_start();
include("db.php");

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Fonclick &amp;Furkan</title>
<link rel="stylesheet" href="./css/login.css">
</head>

<body>
<!-- partial:index.partial.html -->
<section>
     <span> </span> <span> </span> <span> </span> <span> </span> <span> </span> <span> </span> <span> </span> <span> </span> <span> </span> <span> </span> <span> </span> <span> </span> <span></span> <span></span> <span></span> <span></span> <span> </span> <span></span> <span></span> <span></span> <span></span> <span></span> <span> </span> <span></span> <span> </span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span> </span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span> </span> <span> </span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span><span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span><span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span><span></span><span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span><span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span><span></span> <span></span> <span></span> <span></span> <span></span> <span></span><span></span> <span></span><span></span> <span></span> <span></span> <span></span> <span></span> <span> </span> <span> </span><span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span> </span> <span> </span> <span> </span><span> </span>

     <div class="signin">
        <div class="content">
            <h2>Signup</h2>
            <form class="form" action="chackup.php" method="post" enctype="multipart/form-data">
                <div class="inputBox">
                    <input type="text" name="id" required>
                    <i>ID</i>
                </div>
                <div class="inputBox">
                    <input type="submit" value="Signup" name="login">
                </div>
            </form>
        </div>
    </div>
 </section>  <!-- partial -->
</body>
</html>


<?php
if(isset($_POST['login'])){
    $id = $_POST['id'];
   
    
    $sel_user ="SELECT * FROM regkey WHERE  re_key='$id'";
    $run_user=mysqli_query($con,$sel_user);

    $check_user = mysqli_num_rows($run_user);

    if($check_user==0){
    echo " <script>alert('password or email is worng, please try again')</script>";
    }
    else{
        $_SESSION['re_key']=$id;
        echo "<script>window.open('register.php?logged_in=you have successfuly login','_self')</script>";
    }
   
}
?>