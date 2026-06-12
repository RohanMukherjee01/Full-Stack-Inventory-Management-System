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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
<html>
<!-- end navbar side -->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!--  page-wrapper -->

<body>
    <div id="page-wrapper">

        <div class="row">
            <!-- page header -->
            <div class="col-lg-12">
                <h1 class="page-header "><b><i>Add Category</i></b></h1>
            </div>
            <!--end page header -->
        </div>
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
										<div class="modal-body text-center font-18">
											<h3 class="mb-20">Form Submitted!</h3>
											<div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										</div>
										<div class="modal-footer justify-content-center">
											<button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
										</div>
									</div>
      
    </div>
  </div>
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content bg-warning">
										<div class="modal-body text-center">
											<h3 class="mb-15"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua.</p>
											<button type="button" class="btn btn-dark" data-dismiss="modal">Ok</button>
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
                                <form role="form" name="admin" method="POST" onSubmit="return check(admin)">
                                    <div class="row">


                                    </div>


                                    <div class="form-group">
                                        <label>Enter Category Name </label>
                                        <input class="form-control" placeholder="Enter category name" name="categoryname" required>
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
                                $q = "select * from addcategory where categoryname='$category'";
                                $res = mysqli_query($con, $q);
                                $rc = mysqli_num_rows($res);
                                if ($rc == 0) 
                                {
                                    $insert = "insert into addcategory values('','$category')";
                                    if (mysqli_query($con, $insert)) 
                                    {
                                        ?>
                                        <script>
                                  $(document).ready(function(){
                                    $("#myModal").modal("show");
                                    
                                  });
                                </script>
                                <?php
                                    } else {
                                        echo "<script>alert('Something Wrong!');</script>";
                                    }
                                }
                                else
                                {
                                    ?>
                                    <script>
                              $(document).ready(function(){
                                $("#myModal1").modal("show");
                                
                              });
                            </script>
                            <?php
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



    <!--  -->


    <!--  End  Bordered Table  -->
    <div class="row h" id="a">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Main Product
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Sl.No</th>
                                    <th>Category Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <?php
                            $q = "select * from addcategory";
                            $res = mysqli_query($con, $q);
                            $c = 1;
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                                <tr class="bg-danger">
                                    <td><?php echo $c; ?>
                                    </td>
                                    <td> <?php echo $row['categoryname']; ?>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="categoryedit.php?s=<?php echo $row['slno']; ?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:20px; color:green;"></i> </a>
                                            <a href="categorydelete.php?s=<?php echo $row['slno']; ?>"> <i class="fa fa-trash" aria-hidden="true" style="font-size:20px; color:red;"></i> </a>
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