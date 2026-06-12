<?php session_start();
include('topnavbar.php');
include('sidenavbar.php');
include('dbcon.php');
$e = $_SESSION['un'];
$qde = "select * from admin where email='$e'";
$resde = mysqli_query($con, $qde);
$rowde = mysqli_fetch_assoc($resde);

?>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<style>
    .r {
        border-radius: 50%;

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

    .button:hover,
    a:hover {
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
                        <h3>Profile pic</h3>
                        <img src="allimage/<?php echo $rowde['image']; ?>" alt="John" width="200px" height="200px" class="r">
                        <br><br>
                        <form role="form" name="admin" method="POST" onSubmit="return check(admin)" enctype="multipart/form-data">
                            New Image :
                            <input type="file" name="image" required>

                            <center>
                                <button type="submit" class="btn btn-success" name="show" onclick="return confirm('Do you want to Add')" ;>Update</button>
                            </center>
                            <!-- onclick="return check();" -->
                            <!-- <p id="a"></p> -->
                        </form>
                        <?php
                        function getExtension($str)
                        {
                            $i = strrpos($str, ".");
                            if (!$i) {
                                return "";
                            }
                            $l = strlen($str) - $i;
                            $ext = substr($str, $i + 1, $l);
                            return $ext;
                        }
                        // $errors = 0;

                        if (isset($_POST['show'])) {

                            $image = $_FILES['image']['name'];

                            if ($image) {

                                $filename = stripslashes($_FILES['image']['name']);

                                $extension = getExtension($filename);
                                $extension = strtolower($extension);

                                if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") &&         ($extension != "gif") && ($extension != "bmp") && ($extension != "pdf")) {

                                    echo '<h1>Unknown extension!</h1>';
                                    $errors = 1;
                                } else {

                                    // $size=filesize($_FILES['image']['tmp_name']);




                                    $image_name = time() . '.' . $extension;

                                    $newname = "allimage/" . $image_name;


                                    $copied = copy($_FILES['image']['tmp_name'], $newname);
                                    if (!$copied) {
                                        echo '<h1>Copy unsuccessfull!</h1>';
                                        $errors = 1;
                                    }
                                }
                            }
                            $insert = "update admin set image='$image_name' where email='$e'";

                            if (mysqli_query($con, $insert)) {
                                echo "<script>alert('Update sucessfull');window.location.href='profile.php'</script>";
                            } else {
                                echo "<script>alert('Something Wrong!');</script>";
                            }
                        }


                        ?>

                    </div>
                </div>
                <!-- End Area Chart -->
            </div>

            <div class="col-lg-8">
                <!--  Bar Chart -->
                <div class="panel panel-default">
                    <center>
                        <h3>Profile details<br>___________________________________________</h3>
                    </center>
                    <br>
                    <br>
                    <form role="form" name="admin" method="POST" onSubmit="return check(admin)" enctype="multipart/form-data">
                        <p style="padding-left:15px;">First Name : <input type="text" value="<?php echo $rowde['firstname'] ?>" name="firstname"> </p>
                        <p style="padding-left:15px;">Last Name: <input type="text" value="<?php echo $rowde['lastname'] ?>" name="lastname"></p>
                        <p style="padding-left:15px;">Gender :
                        <?php 
                        $g= $rowde['gender'];
                        if($g=='Male')
                        {
                        ?>
<input type="radio" name="gender" id="optionsRadios1" value="Male" checked>Male
<input type="radio" name="gender" id="optionsRadios2" value="Female">Female
<?php 
                        }
                        else
                        {
                            ?>
                            <input type="radio" name="gender" id="optionsRadios1" value="Male" >Male
<input type="radio" name="gender" id="optionsRadios2" value="Female" checked>Female
                            <?php 


                        }
                        ?>
                        </p>
                       
                        <p style="padding-left:15px;">Phone Number :<input type="text" value="<?php echo $rowde['phonenumber'] ?>" name="phonenumber"></p>
                        <p style="padding-left:15px;">Current Address :<input type="text" value="<?php echo $rowde['currentaddress'] ?>" name="caddress"></p>
                        <p style="padding-left:15px;">Permenant Address :<input type="text" value="<?php echo $rowde['permenantaddress'] ?>" name="paddress"></p>
                        <center> <button type="submit" class="btn btn-success" name="update" onclick="return confirm('Do you want to Add')" ;>Update</button></center><br>
                    </form>
                    <?php
                    if (isset($_POST['update'])) {
                        $fname = $_POST["firstname"];
                        $lname = $_POST["lastname"];
                        $gender = $_POST["gender"];
                        
                        $phno = $_POST["phonenumber"];
                        $caddress = $_POST["caddress"];
                        $paddress = $_POST["paddress"];
                      
                            $insert = "update admin set firstname='$fname',lastname='$lname',gender='$gender',phonenumber='$phno',currentaddress='$caddress',permenantaddress='$paddress' where email='$e'";

                            if (mysqli_query($con, $insert)) {
                                echo "<script>alert('update sucessfull');window.location.href='profile.php'</script>";
                            } else {
                                echo "<script>alert('Something Wrong!');</script>";
                            }
                         
                    }

                    ?>
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