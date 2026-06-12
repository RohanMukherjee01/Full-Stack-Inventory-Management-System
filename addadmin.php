<?php session_start();
if (empty($_SESSION["un"])) {
    $msg = "please login";
    echo "<script>alert('$msg');window.location.href='login.php'; </script>";
}
include('topnavbar.php');
include('sidenavbar.php');
include('dbcon.php');
?>


<style>
    textarea {
        resize: none;
    }
</style>
<script type="text/javascript">
    function check(admin) {
        var password = admin.password.value;
        var confirmpassword = admin.confirmpassword.value;
        if (password != confirmpassword) {
            alert("Password does not match !!!");
            admin.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>
<div id="page-wrapper">
    <div class="row">
        <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header "><b><i>Admin Form</i></b> </h1>
        </div>
        <!--end page header -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="bg-danger text-white">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" name="admin" method="POST" onSubmit="return check(admin)" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Enter first name </label>
                                            <input class="form-control" placeholder="Enter first name" name="firstname" type="text" required pattern="[A-Za-z]{1,40}" title="please input [A-Z or a-z]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Enter last name </label>
                                            <input class="form-control" placeholder="Enter last name" name="lastname" type="text" required pattern="[A-Za-z]{1,40}" title="please input [A-Z or a-z]">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" id="optionsRadios1" value="Male" checked>Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" id="optionsRadios2" value="Female">Female
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Enter email address </label>
                                    <input class="form-control" placeholder="Enter email" name="email" required type="email">
                                </div>
                                <div class="form-group">
                                    <label>Enter Password </label>
                                    <input class="form-control" placeholder="Enter Password" name="password" required type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                                <div class="form-group">
                                    <label>Enter Confirm Password </label>
                                    <input class="form-control" placeholder="Enter Confirm Password" name="confirmpassword" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                                </div>
                                <div class="form-group">
                                    <label>Enter phone number </label>
                                    <input  class="form-control" placeholder="Enter Phone Number" name="phnumber" pattern="[0-9]{10}" title="please enter proper phone number" required maxlength=10>
                                </div>

                                <div class="form-group">
                                    <label>Admin Image</label>
                                    <input type="file" name="image" required>
                                </div>
                                <div class="form-group">
                                    <label>Current Address</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter Current Address" name="currentaddress" pattern="[A-Za-z1-9]{1,150}" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Permenant Address</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter Permenant Address" name="permenantaddress" required></textarea>
                                </div>
                                <center><button type="submit" class="btn btn-success" name="show" onclick="return confirm('Do you want to Add')" ;>Register</button></center>
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
                                $fname = $_POST["firstname"];
                                $lname = $_POST["lastname"];
                                $g = $_POST["gender"];
                                $e = $_POST["email"];
                                $p = $_POST["password"];
                                $cp = $_POST["confirmpassword"];
                                $ph = $_POST["phnumber"];
                                $cd = $_POST["currentaddress"];
                                $pd = $_POST["permenantaddress"];
                                $q = "select * from admin where email ='$e' or phonenumber='$ph'";
                                $res = mysqli_query($con, $q);
                                $rc = mysqli_num_rows($res);
                                if ($rc == 0) {
                                    $insert = "insert into admin values('','$fname','$lname','$g','$e','$p','$ph','$image_name','$cd','$pd')";

                                    if (mysqli_query($con, $insert)) {
                                        echo "<script>alert('Adding sucessfull');</script>";
                                    } else {
                                        echo "<script>alert('Something Wrong!');</script>";
                                    }
                                } else {
                                    echo "<script>alert('Already exists');</script>";
                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Form Elements -->
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