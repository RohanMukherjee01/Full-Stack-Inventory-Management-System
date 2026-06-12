<?php
include('topnavbar.php');
include('sidenavbar.php');
include('dbcon.php');
$bill = $_GET['s'];
$check = "select * from finalpurchase where billno='$bill'";
$rescheck = mysqli_query($con, $check);
$rc = mysqli_num_rows($rescheck);
if ($rc >= 1) {

    echo "<script>alert('This bill already genarated');window.location.href='purchase.php'</script>";
}

?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script>
    function getsubcat(str) {
        if (str.length == 0) {
            document.getElementById("subcat").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("subcat").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getsubcat.php?q=" + str, true);
            xmlhttp.send();
        }
    }

    function getproduct(str1, str2) {
        if (str1.length == 0) {
            document.getElementById("productname").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("productname").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getproduct.php?q=" + str1 + "&q1=" + str2, true);
            xmlhttp.send();
        }
    }
    $(document).ready(function() {
        $("#b").click(function() {
            $("#a").slideToggle("slow");
            if ($("#b").text() == "Hide") {
                $("#b").text("Show");
            } else {
                $("#b").text("Hide");

            }
            return false;
        });
    });
</script>
<style>
    .h {
        display: none;
    }
</style>

<!-- end navbar side -->
<!--  page-wrapper -->
<div id="page-wrapper">

    <div class="row">
        <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header "><b><i>Final Purchase</i></b></h1>
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

                            <form role="form" name="admin" method="POST" onSubmit="return check(admin)">
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <?php

                                        $q = "select  * from purchasebill where billno='$bill'";
                                        $res5 = mysqli_query($con, $q);
                                        $row = mysqli_fetch_assoc($res5);
                                        ?>


                                        <div class="col-sm-6">
                                            <label>Bill No </label>
                                            <input class="form-control" name="bill" required value="<?php echo $row['billno']; ?>" readonly>

                                        </div>
                                        <div class="col-sm-6">
                                            <label>Company Name </label>
                                            <input class="form-control" name="company" required value="<?php echo $row['companyname']; ?>" readonly>

                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover " id="dataTables-example">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>Sl.No</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <?php
                                    $q = "select * from tempurchase where billno='$bill'";
                                    $res = mysqli_query($con, $q);
                                    $c = 1;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr class="bg-danger">
                                            <td><?php echo $c; ?>
                                            </td>

                                            <td> <?php echo $row['categoryname']; ?>
                                            </td>
                                            <td> <?php echo $row['subcategoryname']; ?>
                                            </td>
                                            <td> <?php echo $row['productname']; ?>
                                            </td>
                                            <td> <?php echo $row['price']; ?>
                                            </td>
                                            <td> <?php echo $row['quantity']; ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="purchasedelete.php?s=<?php echo $row['slno']; ?>&bill=<?php echo $row["billno"]; ?>"> <i class="fa fa-trash" aria-hidden="true" style="font-size:20px; color:red;"></i> </a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php
                                        $c++;
                                    }
                                    ?>

                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

            
            <form role="form" name="finalpurchase" method="POST" onSubmit="return check(admin)">
                <div class="form-group">
                    <center><button type="submit" style="padding:5px 30px 5px 30px;" class="btn btn-primary" name="final" onclick="return confirm('Do you want to add ');" ;>Bil Generate</button></center>
                </div>
                <?php
                if (isset($_POST["final"])) {
                    $q = "select * from tempurchase where billno='$bill'";
                    $res7 = mysqli_query($con, $q);
                    $rc = mysqli_num_rows($res);
                    if ($rc > 0) {
                        while ($row = mysqli_fetch_assoc($res7)) {
                            $slno = $row["slno"];
                            $c = $row["categoryname"];
                            $sc = $row["subcategoryname"];
                            $pn = $row["productname"];
                            $qn = $row["quantity"];
                            $p = $row["price"];
                            date_default_timezone_set("Asia/kolkata");
                            $date = date("Y-m-d H:i:s");
                            

                            $queryfinal = "insert into finalpurchase values('','$bill','$c','$sc','$pn','$qn','$p','$date')";


                            if (mysqli_query($con, $queryfinal)) {

                                $q = "select * from stock where categoryname='$c' and subcategoryname='$sc' and productname='$pn'";
                                $res = mysqli_query($con, $q);
                                $rc = mysqli_num_rows($res);
                                if ($rc == 0) {
                                    $insert = "insert into stock values('','$c','$sc','$pn','$qn')";
                                    mysqli_query($con, $insert);
                                } else {
                                    $update = "update stock set quantity=quantity+'$qn' where categoryname='$c' and subcategoryname='$sc' and productname='$pn'";
                                    mysqli_query($con, $update);
                                }
                                $querydel = "delete from tempurchase where slno='$slno'";
                                $res = mysqli_query($con, $querydel);

                                
                            } else {
                                echo "<script>alert('product unsuccessful');</script>";
                            }
                           

                        }
                        $updatebill="update purchasebill set status='Y' where billno='$bill'";
                        mysqli_query($con, $updatebill);
                        $msg = "purchase completed";
                        echo "<script>alert('$msg');window.location.href='billgenerate.php?b=".$bill."'</script>";
                    }
                }

                ?>
            </form>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <!-- Form Elements -->
        <div class="bg-danger text-white">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">

                        </div>
                        <form role="form" name="admin" method="POST" onSubmit="return check(admin)">
                            <div class="form-group row">

                                <label class="col-sm-1 col-form-label"><br>Category </label>
                                <div class="col-sm-12">

                                    <select class="form-control" id="sub-category-dropdown" name="categoryname" required onchange="getsubcat(this.value);">
                                        <option>Select Category </option>
                                        <?php
                                        require_once "dbcon.php";

                                        $q = "select * from addcategory";
                                        $resadd = mysqli_query($con, $q);

                                        // $row = mysqli_fetch_assoc($res);
                                        while ($row = mysqli_fetch_assoc($resadd)) {
                                        ?>
                                            <option value="<?php echo $row['categoryname']; ?>"><?php echo $row['categoryname']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label">Sub Category </label>
                                <div class="col-sm-12">

                                    <select class="form-control" id="subcat" name="subcategoryname" required onchange="getproduct(document.getElementById('sub-category-dropdown').value,this.value);">
                                        <option>Select Sub-Category </option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label">Product Name </label>
                                <div class="col-sm-12">

                                    <select class="form-control" id="productname" name="product" required>
                                        <option>Select Product </option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Quantity </label>
                                <input class="form-control" placeholder="Enter product quantity" name="quantity" type="number" required>
                            </div>
                            <div class="form-group">
                                <label>Price </label>
                                <input class="form-control" placeholder="Enter product price" name="price" required>
                            </div>



                            <center>
                                <div class="form-group">
                                    <button type="submit" style="padding:5px 30px 5px 30px;" class="btn btn-success" name="show" onclick="return confirm('Do you want to add ');" ;>Add</button>
                        </form>
                        <?php
            if (isset($_POST["show"])) {


                $c = $_POST["categoryname"];
                $sc = $_POST["subcategoryname"];
                $pn = $_POST["product"];
                $qn = $_POST["quantity"];
                $p = $_POST["price"];
                // date_default_timezone_set("Asia/kolkata");
                // $date = date("Y-m-d");
                $billal =$bill;
                // $cn = $_POST["company"];

                /////////////////////////////////////////////
                $qall = "select * from tempurchase where categoryname ='$c' and subcategoryname='$sc' and productname='$pn' and billno='$billal'";
                $resal = mysqli_query($con, $qall);
                $rcal = mysqli_num_rows($resal);
                if ($rcal == 0) {
                    $queryal = "insert into tempurchase values('','$bill','$c','$sc','$pn','$qn','$p')";
                    mysqli_query($con, $queryal) ;
                        $msg = "added successfull";
                        echo "<script>alert('$msg');window.location.href='finalpurchase.php?s=" . $bill . "'; </script>";
                    }
                    else 
                                    {
                                        $updateal = "update tempurchase set quantity=quantity+'$qn' where categoryname='$c' and subcategoryname='$sc' and productname='$pn' and billno='$billal'";
                                        mysqli_query($con, $updateal); 
                                        $msg = "updated successfull";
                                        echo "<script>alert('$msg');window.location.href='finalpurchase.php?s=" . $bill . "'; </script>";
                                    }


                                
                    // $q = "select * from stock where productname='$pn'";
                    // $res = mysqli_query($con, $q);
                    // $rc = mysqli_num_rows($res);
                    // if ($rc == 0) {
                    //     $insert = "insert into stock values('','$pn','$qn')";
                    //     mysqli_query($con, $insert);
                    // } else {
                    //     $update = "update stock set quantity=quantity+'$qn' where productname='$pn'";
                    //     mysqli_query($con, $update);
                    // }
                } 
            
            ?>
                    </div>
                    </center>
                </div>

            </div>
        </div>
    </div>
    <!-- End Form Elements -->
</div>







<!--  End  Bordered Table  -->


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
<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>

</body>

</html>