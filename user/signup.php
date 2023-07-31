<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $mobno=$_POST['mobno'];
    $add=$_POST['address'];
    $password=md5($_POST['password']);
    $ret="select MobileNumber from tbluser where MobileNumber=:mobno";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':mobno', $mobno, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FirstName,MobileNumber,Address,Password)Values(:fname,:mobno,:add,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':add',$add,PDO::PARAM_STR);

$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have signup  Succesfully');</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{

echo "<script>alert('This Mobile Number already exist. Please try again');</script>";
}
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Marriage Registration System||Sign Up page</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" />
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Footlight MT Light:wght@400&display=swap" /> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" />

    <!-- Amanda CSS -->
    <!-- <link rel="stylesheet" href="css/amanda.css"> -->
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
            <div class="dont-have-an" style="top: 370px;">Already have an account?</div>
            <a href="login.php" class="sign-up-wrapper" style="top: 394px;">Sign In</a>
          </div>
            

          <div class="rightbox sign-up-box">
            <h1>Sign Up</h1>
            <label>Full name</label><br>
            <input type="text" required="true" name="fname" value=""><br><br>
            <label>Mobile Number</label><br>
            <input type="text" required="true" name="mobno"  maxlength="10" pattern="[0-9]+" value=""><br><br>
            <label>Address</label><br>
            <input type="text" required="true" name="address" value=""><br><br>
            <label>Password</label><br>
            <input type="password" name="password" required="true" value=""><br><br>
              <button type="submit" name="submit" class="log-btn">Sign Up</button>
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
