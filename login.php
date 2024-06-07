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
            <form class="form" action="login.php" method="post" enctype="multipart/form-data">
                <div class="inputBox">
                    <input type="text" name="id" required>
                    <i>ID</i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required>
                    <i>Password</i>
                </div>
                <div class="inputBox">
                    <input type="submit" value="Signup" name="login">
                </div>
                <div class="inputBox">
                    <a href="register.php" style="color:red;font-size:20px;text-decoration: overline;">Signup</a>
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
    $pass =$_POST['password'];
    
    $sel_user ="SELECT * FROM user_information WHERE  office_id='$id' AND password='$pass'";
    $run_user=mysqli_query($con,$sel_user);

    $check_user = mysqli_num_rows($run_user);

    if($check_user==0){
    echo " <script>alert('password or email is worng, please try again')</script>";
    }
    else{
        $_SESSION['office_id']=$id;
        echo "<script>window.open('index.php?logged_in=you have successfuly login','_self')</script>";
    }
   
}
?>