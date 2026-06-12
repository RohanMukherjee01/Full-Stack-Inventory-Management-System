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

<!-- end navbar side -->
<!--  page-wrapper -->
<div id="page-wrapper">

    <div class="row">
        <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header "><b><i>All Admin Report</i></b> </h1>
        </div>
        <!--end page header -->
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <div class="row">
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
                                    <th>Admin Image</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Current Address</th>
                                    <th>Permenant Address</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <?php
                            $q = "select * from Admin";
                            $res = mysqli_query($con, $q);
                            $c = 1;
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                                <tr class="bg-danger">
                                    <td><?php echo $c; ?>
                                    </td>
                                    <td><img src="allimage/<?php echo $row['image']; ?>" width="100px" height="100px">
                                    </td>
                                    <td> <?php echo $row['firstname']; ?>
                                    </td>
                                    <td><?php echo $row['lastname']; ?>
                                    </td>
                                    <td><?php echo $row['gender']; ?>
                                    </td>
                                    <td><?php echo $row['email']; ?>
                                    </td>
                                    <td><?php echo $row['phonenumber']; ?>
                                    </td>
                                    <td><?php echo $row['currentaddress']; ?>
                                    </td>
                                    <td><?php echo $row['permenantaddress']; ?>
                                    </td>
                                    <td><center>
                                            <a href="admindelete.php?s=<?php echo $row['slno']; ?>"> <i class="fa fa-trash" aria-hidden="true" style="font-size:20px; color:red;"></i></a>
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