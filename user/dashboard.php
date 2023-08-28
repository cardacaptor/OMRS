<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['omrsuid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Online Marriage Registration System: Dashboard</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css?v=<?php echo time(); ?>">
  </head>

  <body>

    <?php include_once('includes/header.php');?>

   <?php include_once('includes/sidebar.php');?>

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Home</h5>
        <form id="searchBar" class="search-bar" action="index.html">
          <div class="form-control-wrapper">
            <input type="search" class="form-control bd-0" placeholder="Search...">
          </div><!-- form-control-wrapper -->
          <button id="searchBtn" class="btn btn-orange"><i class="fa fa-search"></i></button>
        </form><!-- search-bar -->
      </div><!-- am-pagetitle -->

      <div class="am-pagebody">
        <div class="row row-sm">
          <div class="col-lg-12">
            <div class="card">
              <div id="rs1" class="wd-100p ht-200"></div>
              <div class="overlay-body">
                <div class="d-flex justify-content-between">
                  <div>
                     <?php
$uid=$_SESSION['omrsuid'];
$sql="SELECT FirstName from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                    <?php $cnt=$cnt+1;}} ?>
                    <h3>Marriage Registration in Nepal (2080)</h3>
                    <br>
                    <p>Marriage is the process of the establishment of relations between two persons which creates their rights, duties, responsibilities, and privileges.
                        <br><br>In Nepal, all the proceedings related to the registration of marriage are administered by the chapter of the <span style="font-weight:bold;"><span style="text-decoration:underline;">Marriage of civil code</span> 2017 (2074)</span> and the Marriage Registration Act 2028.</p>
                    <br>
                        <h6>Who can marry in Nepal?</h6>
                    <ul>
                      <li><p>The male or female who doesn't have a wife or husband.</p></li>
                      <li><p>The male or female who have completed the age of twenty years.</p></li>
                      <li><p>Foreigners can register a marriage in Nepal after following all the legal formalities of Nepal.</p></li>
                    </ul>
                      </div>
                                  </div><!-- d-flex -->
               
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->
         
          
        </div><!-- row -->



      </div><!-- am-pagebody -->
    </div><!-- am-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/d3/d3.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
    <script src="lib/gmaps/gmaps.js"></script>
    <script src="lib/Flot/jquery.flot.js"></script>
    <script src="lib/Flot/jquery.flot.pie.js"></script>
    <script src="lib/Flot/jquery.flot.resize.js"></script>
    <script src="lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="js/amanda.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
  </body>
</html>
<?php }  ?>