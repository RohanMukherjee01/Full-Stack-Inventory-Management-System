<?php session_start();
if (empty($_SESSION["un"])) {
    $msg = "please login";
    echo "<script>alert('$msg');window.location.href='login.php'; </script>";
}





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
<script type="text/javascript">
    function check(admin) {
        var password = admin.newpassword.value;
        var confirmpassword = admin.confirmpassword.value;
        if (password != confirmpassword) {
            alert("Password does not match !!!");
            admin.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>
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
                        <img src="allimage/<?php echo $rowde['image']; ?>" alt="John" width="200px" height="200px" class="r">
                        <h3><?php echo $rowde['firstname'] ?> <?php echo $rowde['lastname']; ?></h3>

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
                        <div class="row">



                        </div>



                        <div class="form-group col-lg-12">
                            <label>Enter Old Password </label>
                            <input class="form-control" placeholder="Enter Password" name="password" required type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" >
                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Enter New Password </label>
                            <input type="password" class="form-control" placeholder="Enter Confirm Password" name="newpassword" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                        </div>
                        <div class="form-group col-lg-12">
                            <label>Renter New Password </label>
                            <input type="password" class="form-control" placeholder="Enter Confirm Password" name="confirmpassword" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                        </div>
                        <center><button type="submit" class="btn btn-success" name="show" onclick="return confirm('Do you want to Add')" ;>Submit</button></center><br><br>
                        <!-- onclick="return check();" -->
                        <!-- <p id="a"></p> -->
                    </form>
                </div>

                <!-- End Bar Chart -->
            </div>




        </div>
    </div>
    <?php
    if (isset($_POST['show'])) {
        $oldpassword = $_POST['password'];
        $np = $_POST["newpassword"];

        $check = "select * from admin where email='$e' and password='$oldpassword'";
        $res = mysqli_query($con, $check);
        $rc = mysqli_num_rows($res);
        if ($rc == 1)
         {
            $qchange = "update admin set password='$np' where email='$e'";
            if (mysqli_query($con, $qchange)) 
            {
                echo "<script>alert('Update sucessfull');</script>";
            } 
            else
             {
                echo "<script>alert('Update unsucessfull');</script>";
            }
        } 
        else
         {
            echo "<script>alert('Old Password does not match ');</script>";
        }
    }
    ?>
</body>

</html>



























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