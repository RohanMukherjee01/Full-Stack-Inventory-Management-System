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
<style>
    .h {
        display: none;
    }
</style>
<script>
    $(document).ready(function() {
        $("#b").click(function() {
            $("#a").slideToggle("slow");
            if ($("#b").text() == "Hide") {
                $("#b").text("Show");
            } else {
                $("#b").text("Hide");

            }
        });
    });
</script>
<!-- end navbar side -->
<!--  page-wrapper -->
<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
    
<div id="page-wrapper">

    <div class="row">
        <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header "><b><i>Add Sub Category</i></b></h1>
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
                                    <label class="col-sm-1 col-form-label">Category:- </label>
                                    <div class="col-sm-12">
                                        <select class="form-control"  id="sub-category-dropdown" name="categoryname" required>
                                            <option >Select Category </option>
                                            <?php
                                            require_once "dbcon.php";
            
                                            $q = "select * from addcategory";
                                            $res = mysqli_query($con, $q);
                                            
                                            // $row = mysqli_fetch_assoc($res);
                                            while ($row = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <option  value="<?php echo $row['categoryname']; ?>"><?php echo $row['categoryname']; ?></option>
                                                <?php
                                            }
                                                ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Sub Category Name </label>
                                    <input class="form-control" placeholder="Enter sub category name" name="subcategoryname" required>
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
                                $category = $_POST["categoryname"];
                                $subcategory = $_POST["subcategoryname"];
                                $q = "select * from subcategory where subcategoryname='$subcategory'";
                                $res = mysqli_query($con, $q);
                                $rc = mysqli_num_rows($res);
                                if ($rc == 0) 
                                {
                                $insert = "insert into subcategory values('','$category','$subcategory')";
                                if (mysqli_query($con, $insert)) {
                                    echo "<script>alert(' Sub Category added');</script>";
                                } else {
                                    echo "<script>alert('Something Wrong!');</script>";
                                }
                            }
                            else
                            {
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
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $q = "select * from subcategory";
                            $res = mysqli_query($con, $q);
                            $c = 1;
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                                <tr class="bg-danger">
                                    <td><?php echo $c; ?>
                                    </td>
                                    <td> <?php echo $row['categoryname']; ?>
                                    </td>
                                    <td><?php echo $row['subcategoryname']; ?>
                                    </td>
                                    <td><center>
                                        <a href="subcategoryedit.php?s=<?php echo $row['slno']; ?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:20px; color:green;"></i> </a>
                                        <a href="subcategorydelete.php?s=<?php echo $row['slno']; ?>"> <i class="fa fa-trash" aria-hidden="true" style="font-size:20px; color:red;"></i> </a>
                                    </td></center>
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