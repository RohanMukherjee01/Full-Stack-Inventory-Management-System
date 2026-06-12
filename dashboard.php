<?php session_start();
if(empty($_SESSION["un"]))
{
    $msg="please login";
    echo "<script>alert('$msg');window.location.href='login.php'; </script>";
}

include('topnavbar.php');
include('sidenavbar.php');
include('dbcon.php');
?>



<html>
<style>
.btn0 {
  background-color: darksalmon;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.4;
  transition: 0.3s;
}

.btn0:hover {opacity: 1}
.btn1 {
  background-color: royalblue;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.4;
  transition: 0.3s;
}

.btn1:hover {opacity: 1}
.btn2 {
  background-color: green;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.4;
  transition: 0.3s;
}

.btn2:hover {opacity: 1}
.btn3 {
  background-color: darkcyan;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.4;
  transition: 0.3s;
}

.btn3:hover {opacity: 1}
.btn4 {
  background-color: darkmagenta;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.4;
  transition: 0.3s;
}

.btn4:hover {opacity: 1}
.btn5 {
  background-color: darkgoldenrod;
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.4;
  transition: 0.3s;
}

.btn5:hover {opacity: 1}
</style>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- end navbar top -->

    <!--  page-wrapper -->
    <div id="page-wrapper">

        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12">
                <h1 class="page-header"><b><i>Dashboard</i></b></h1>
            </div>
            <!--End Page Header -->
        </div>




        <div class="row">
            <!--quick info section -->
            <a href="totalsell.php" style="text-decoration:none;"> <div class="col-lg-4">
                <div class="alert alert-danger text-center btn0 ">
                <i class="fa fa-cart-arrow-down fa-3x"></i>
                    <br>
                    <?php
                    $q1 = "select * from finalsell";
                    $res1 = mysqli_query($con, $q1);
                    $rc1 = mysqli_num_rows($res1);
                    ?>
                    <b>Total Sell</b>
                    <?php
                    echo "$rc1";
                    ?>

                </div></a>
            </div>
            <div class="col-lg-4">
            <a href="monthlysell.php" style="text-decoration:none;"><div class="alert alert-danger text-center btn1">
                    <i class="fa fa-calendar fa-3x"></i>
                    <br>
                    <?php
                    date_default_timezone_set("Asia/kolkata");
                    $sd2 = date("Y-m ") . "-01";
                    $ed2 = date("Y-m") . "-31";
                    $month2 = date("M");
                    $q2 = "select * from finalsell where date between '$sd2' and '$ed2'";
                    $res2 = mysqli_query($con, $q2);
                    $rc2 = mysqli_num_rows($res2);
                    ?>
                    <b>Monthly  Sell</b>
                    <?php
                    echo " $month2  $rc2";
                    ?>

                </div></a>
            </div>
            <div class="col-lg-4">
            <a href="totalpurchase.php" style="text-decoration:none;"><div class="alert alert-success text-center btn2">
            <i class="fa fa-shopping-cart fa-3x"></i>
                    <br>
                    <?php
                    $q1 = "select * from purchasebill where status='y'";
                    $res1 = mysqli_query($con, $q1);
                    $rc1 = mysqli_num_rows($res1);
                    ?>
                    <b>Total Purchase</b>
                    <?php
                    echo $rc1;
                    ?>
                </div></a>
            </div>
            <div class="col-lg-4">
            <a href="monthlypurchase.php" style="text-decoration:none;"><div class="alert alert-success text-center btn3">
            <i class="fa fa-calendar fa-3x"></i>
                    <br>
                    <?php
                    date_default_timezone_set("Asia/kolkata");
                    $sd = date("Y-m") . "-01";
                    $ed = date("Y-m") . "-31";
                    $month = date("M");
                    $q = "select * from finalpurchase where date between '$sd' and '$ed'";
                    $res = mysqli_query($con, $q);
                    $rc = mysqli_num_rows($res);
                    ?>
                    <b>Monthly Purchase</b>
                    <?php
                    echo "$month $rc";
                    ?>
                </div></a>
            </div>
            <div class="col-lg-4">
            <a href="totalproduct.php" style="text-decoration:none;"><div class="alert alert-info text-center btn4">
            <i class="fa fa-archive fa-3x"></i>
                    <br>
                    <?php
                    $q = "select * from stock";
                    $res = mysqli_query($con, $q);
                    $rc = mysqli_num_rows($res);
                    ?>
                    <b>Stock</b>
                    <?Php
                    echo " $rc";
                    ?>
                </div></a>
            </div>
            <div class="col-lg-4">
            <a href="outofstock.php" style="text-decoration:none;"><div class="alert alert-warning text-center btn5">
            <i class="fa fa-shopping-basket fa-3x"></i>
                    <br>
                    <?php
                    $q = "select * from stock where quantity<1";
                    $res = mysqli_query($con, $q);
                    $rc = mysqli_num_rows($res);
                    ?>
                    <b>Out of stock</b>
                    <?php
                    echo "Product  $rc";
                    ?>

                </div></a>
            </div>
            <!--end quick info section -->
        </div>


    </div>
    <!--End Chat Panel Example-->
    </div>
    </div>





    </div>
    <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>