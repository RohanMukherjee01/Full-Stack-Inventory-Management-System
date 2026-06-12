<?php
include('topnavbar.php');
include('sidenavbar.php');
include('dbcon.php');
?>
<html>
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

<body>
    <!-- end navbar side -->
    <!--  page-wrapper -->
    <div id="page-wrapper">

        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header "><b><i>Product</i></b> </h1>
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
                                <!-- <div class="form-group">
                                
                            </div> -->
                                <form role="form" name="admin" method="POST" onSubmit="return check(admin)">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label>Product Name </label>
                                            <input class="form-control" placeholder="Enter product name" name="product" required>

                                        </div>
                                        <label class="col-sm-1 col-form-label"><br>Category </label>
                                        <div class="col-sm-12">

                                            <select class="form-control" id="sub-category-dropdown" name="categoryname" required onchange="getsubcat(this.value);">
                                                <option>Select Category </option>
                                                <?php
                                                require_once "dbcon.php";

                                                $q = "select * from addcategory";
                                                $res = mysqli_query($con, $q);

                                                // $row = mysqli_fetch_assoc($res);
                                                while ($row = mysqli_fetch_assoc($res)) {
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

                                            <select class="form-control" id="subcat" name="subcategoryname" required>
                                                <option>Select Sub-Category </option>

                                            </select>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label>Company Name </label>
                                        <input class="form-control" placeholder="Enter company name" name="companyname" required>
                                    </div>
                                    <div class="form-group">
                                        <label>CGST </label>
                                        <input class="form-control" placeholder="Enter CGST" name="cgst" required>
                                    </div>
                                    <div class="form-group">
                                        <label>SGST </label>
                                        <input class="form-control" placeholder="Enter SGST" name="sgst" required>
                                    </div>
                                    <center>
                                        <div class="form-group">
                                            <button type="submit" style="padding:5px 30px 5px 30px;" class="btn btn-success" name="show" onclick="return confirm('Do you want to add ');" ;>Add</button>
                                            <a href="#" class="btn btn-primary" id="b" style="padding:5px 30px 5px 30px;">show</a>
                                </form>
                            </div>
                            </center>
                            <?php
                            if (isset($_POST["show"])) {
                                $pn = $_POST["product"];
                                $c = $_POST["categoryname"];
                                $sc = $_POST["subcategoryname"];
                                $cn = $_POST["companyname"];
                                $cgst = $_POST["cgst"];
                                $sgst = $_POST["sgst"];
                                    $query = "insert into product values('','$pn','$c','$sc','$cn','$cgst','$sgst')";
                                    if (mysqli_query($con, $query)) {
                                        echo "<script>alert(' Product added');</script>";
                                    } else {
                                        echo "<script>alert('Something Wrong!');</script>";
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



    <div class="row h" id="a">
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
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name </th>
                                    <th>Company</th>
                                    <th>CGST</th>
                                    <th>SGST</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $q = "select * from product";
                            $res = mysqli_query($con, $q);
                            $c = 1;
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                                <tr class="bg-danger">
                                    <td><?php echo $c; ?>
                                    </td>
                                    <td> <?php echo $row['productname']; ?>
                                    </td>
                                    <td><?php echo $row['categoryname']; ?>
                                    </td>
                                    <td><?php echo $row['subcategoryname']; ?>
                                    </td>
                                    <td><?php echo $row['companyname']; ?>
                                    </td>
                                    <td><?php echo $row['cgst']; ?>
                                    </td>
                                    <td><?php echo $row['sgst']; ?>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="productedit.php?s=<?php echo $row['slno']; ?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:20px; color:green;"></i> </a>
                                            <a href="productdelete.php?s=<?php echo $row['slno']; ?>"> <i class="fa fa-trash" aria-hidden="true" style="font-size:20px; color:red;"></i> </a>
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