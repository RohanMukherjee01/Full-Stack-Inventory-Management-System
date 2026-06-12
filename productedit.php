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



<?php
    $s=$_GET['s'];
    $q="select * from product where slno='$s'";
    $res=mysqli_query($con,$q);
    $row1=mysqli_fetch_assoc($res);
?>
<body>
<div id="page-wrapper">
            <div class="row">
                <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header " >EDIT PRODUCT </h1>
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
                                    <form role="form" name="addcategory" method="POST" onSubmit = "return check(admin)">
                                        <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label>Product Name </label>
                                            <input class="form-control" placeholder="Enter product name" name="product" required value="<?php echo $row1['productname']; ?>">

                                        </div>
                                        <label class="col-sm-1 col-form-label"><br>Category </label>
                                        <div class="col-sm-12">

                                            <select class="form-control" id="sub-category-dropdown" name="categoryname" required onchange="getsubcat(this.value);">
                                                <option><?php echo $row1['categoryname']; ?> </option>
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
                                            <option>
                                            <?php echo $row1['subcategoryname']; ?>

                                            </option>

                                            </select>
                                        </div>
                                    </div>




                                    <div class="form-group">
                                        <label>Company Name </label>
                                        <input class="form-control" placeholder="Enter company name" name="companyname" required value="<?php echo $row1['companyname']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>CGST </label>
                                        <input class="form-control" placeholder="Enter CGST" name="cgst" required value="<?php echo $row1['cgst']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>SGST </label>
                                        <input class="form-control" placeholder="Enter SGST" name="sgst" required value="<?php echo $row1['sgst']; ?>">
                                    </div>
                                        <div class="row">
                                    <div class="col-md-12"> <br>                                
                                    <center>  <button type="submit" class="btn btn-success" name="show" onclick="return confirm('Do you want to edit')";>Edit</button></center>
                                    </div>
                                    </div>
                                        <!-- onclick="return check();" -->
                                        <!-- <p id="a"></p> -->
                                    </form>
                                    <?php 
                                    if(isset($_POST["show"]))
                                    {
                                        $product=$_POST['product'];
                                        $category=$_POST['categoryname'];
                                        $subcategory=$_POST['subcategoryname'];
                                        $company=$_POST['companyname'];
                                        $cgst=$_POST['cgst'];
                                        $sgst=$_POST['sgst'];
                                        //$subcategory=$_POST["subcategoryname"];
                                        $query2="UPDATE product SET productname='$product',categoryname='$category',subcategoryname='$subcategory',companyname='$company',cgst='$cgst',sgst='$sgst' where slno='$s'";
                                        if(mysqli_query($con, $query2))
                                        {
                                            $msg="Category Edited";
                                            echo "<script>alert('$msg');window.location.href='product.php'; </script>";
                                        }
                                        else
                                        {
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
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
