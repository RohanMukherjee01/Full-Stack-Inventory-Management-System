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



<?php
    $s=$_GET['s'];
    $q="select * from addcategory where slno='$s'";
    $res=mysqli_query($con,$q);
    $row=mysqli_fetch_assoc($res);
?>
<div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header " >EDIT CATEGORY </h1>
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
                                        <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <label>Edit Category name  </label>
                                            <input class="form-control" placeholder="Edit category name" name="categoryname" type="text" required  value="<?php echo $row['categoryname'];?>">
                                            </div>
                                        </div> 
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
                                        $category=$_POST["categoryname"];
                                        $query="UPDATE addcategory SET categoryname='$category' where slno='$s'";
                                        if(mysqli_query($con, $query))
                                        {
                                            $msg="Category Edited";
                                            echo "<script>alert('$msg');window.location.href='addcategory.php'; </script>";
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

</body>

</html>
