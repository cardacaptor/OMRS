<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $mobno=$_POST['mobno'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tbluser WHERE MobileNumber=:mobno and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':mobno',$mobno,PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['omrsuid']=$result->ID;
}


$_SESSION['login']=$_POST['mobno'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Marriage Registration System||Sign in page</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" />
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Footlight MT Light:wght@400&display=swap" /> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" />
  </head>

  <body>

  <a href="../index.php" class="back-arrow">&#8592;</a>
    <div class="bigBox">
        <h1 style="text-align: center;">Online Marriage Registration</h1>
        <div class="overlayBox">
            <form class="form-auth-small" action="" method="post">
                <div id="leftBox">
                    <div class="image-1-wrapper">
                        <img class="image-1-icon" alt="" src="images/image-1@2x.png" />
                    </div>
                    <div class="welcome1">WELCOME</div>
                    <img class="wed-copy-3" alt="" src="images/wed-copy-3@2x.png" />
                    <div class="dont-have-an">Don't have an account?</div>
                    <a href="signup.php" class="sign-up-wrapper">Sign Up</a>
                </div>
                <div class="rightbox">
                    <h1>Sign In</h1>
                    <p>Mobile Number</p>
                    <input type="text" placeholder="Enter Number" required="true" name="mobno" maxlength="10" pattern="[0-9]+">
                    <p>Password</p>
                    <input type="password" placeholder="Enter Password" name="password" required="true" value="">
                    <br><br>
                    <div class="form-group"><a href="forgot-password.php">Reset password</a></div>
                    <button type="submit" name="login" class="log-btn">Sign In</button>
                </div>
            </form>
        </div>
    </div>
    <script src="js/load.js"></script>
    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/amanda.js"></script>
  </body>
</html>
