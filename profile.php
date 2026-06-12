<?php session_start();





include('topnavbar.php');
include('sidenavbar.php');
include('dbcon.php');
$e=$_SESSION['un'];
$qde="select * from admin where email='$e'";
$resde=mysqli_query($con,$qde);
$rowde=mysqli_fetch_assoc($resde);

?>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<style>
    .r
    {
        border-radius:50% ;

    }
    
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

.button:hover, a:hover {
  opacity: 0.7;
}
</style>
    <body>

    <div id="page-wrapper">
    <div class="row">
        <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header "><b><i>Profile Details</i></b> </h1>
        </div>
        <!--end page header -->
    </div>
    <div class="row">
                <div class="col-lg-4">
                    <!--  Area Chart -->
                    <div class="panel panel-default">
                    <div class="card ">
  <img src="allimage/<?php echo $rowde['image'];?>" alt="John" width="200px" height="200px" class="r">
  <h3><?php echo $rowde['firstname']?> <?php echo $rowde['lastname'];?></h3>
  
</div>
                    </div>
                    <!-- End Area Chart -->
                </div>
               
                <div class="col-lg-8">
                     <!--  Bar Chart -->
                    <div class="panel panel-default">
                    <center><h3>Profile details<br>___________________________________________</h3></center>
                    <br>
                    <br>
                    <p style="padding-left:15px;">First Name : <?php echo $rowde['firstname']?> </p>
                    <p style="padding-left:15px;">Last Name: <?php echo $rowde['lastname']?></p>
                    <p style="padding-left:15px;">Gender :<?php echo $rowde['gender']?></p>
                    <p style="padding-left:15px;">Email :<?php echo $rowde['email']?></p>
                    <p style="padding-left:15px;">Phone Number :<?php echo $rowde['phonenumber']?></p>
                    <p style="padding-left:15px;">Current Address :<?php echo $rowde['currentaddress']?></p>
                    <p style="padding-left:15px;">Permenanat Address :<?php echo $rowde['permenantaddress']?></p>
                    <center> <a href="editprofile.php" style="color:white;text-decoration:none;" onclick="return confirm('Do you want to Add')" class="btn btn-success">Edit Profile</a></center><br>
                    </div>
                    
            <!-- End Bar Chart -->
                </div>
                
                
               
                
            </div>
</div>



























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

