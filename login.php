<html>
<?php session_start();

$_SESSION["un"] = "";
include('dbcon.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back" style=" background: #28292d; ">


    <div class="container">

        <div class="row">

            <!-- <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                <h1><b><i></i></b></h1>
            </div> -->
            <center>
                <lord-icon src="https://cdn.lordicon.com/kxrhwtdg.json" trigger="loop" delay="500" style="width:150px;height:150px; top: 50px;">
                </lord-icon>
            </center>

            <div class="col-md-4 col-md-offset-4" >

                <div class="login-panel panel panel-default">


                    <div class="panel-heading">
                        <center>
                            <h3 class="panel-title" style=" height: 30px; font-size:x-large; color: blue;
                            "><b><i>Sign Up</i></b></h3>
                            <p><b>enter your username and password to login </b></p>
                        </center>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="enter registered email" name="email" type="email" autofocus value="<?php if (isset($_COOKIE["email"])) {
                                                                                                                                                    echo $_COOKIE["email"];
                                                                                                                                                }
                                                                                                                                                ?>"  autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="enter password" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" value="<?php if (isset($_COOKIE["pass"])) {
                                                                                                                                        echo $_COOKIE["pass"];
                                                                                                                                    }
                                                                                                                                    ?>">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Login" name="submit" >
                            </fieldset>
                        </form>
                        <?php
                        if (isset($_POST["submit"])) {
                            $n1 = $_POST["email"];
                            $n2 = $_POST["password"];
                            $check = "select * from admin where email='$n1' and password='$n2'";
                            $res = mysqli_query($con, $check);
                            $rc = mysqli_num_rows($res);
                            if ($rc == 1) {
                                if (isset($_POST["remember"])) {
                                    setcookie("email", $n1, time() + (86400 * 30), "/");
                                    setcookie("pass", $n2, time() + (86400 * 30), "/");
                                }
                                $_SESSION["un"] = $n1;
                                $msg = "login successfull";
                                echo "<script>alert('$msg');window.location.href='dashboard.php'; </script>";
                            } else {
                                echo "password does not match ";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <!-- lordicon -->
    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>

</body>

</html>