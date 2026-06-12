<?php
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
            <h1 class="page-header "><b><i>All Purchase Report</i></b></h1>
        </div>
        <!--end page header -->
    </div>




    <div class="row">
        <div class="col-lg-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">


                    <form role="form" name="admin" method="POST" onSubmit="return check(admin)" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enter Date </label>
                                    <input class="form-control" placeholder="Enter date" name="firstdate" type="date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Enter Date </label>
                                    <input class="form-control" placeholder="Enter last date" name="lastdate" type="date" required>
                                </div>
                            </div>
                        </div>
                        <center><button type="submit" class="btn btn-success" name="show" onclick="return confirm('Do you want to Add')" ;>Search</button></center>
                </div>

                </form>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover " id="dataTables-example">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Sl.No</th>
                                    <th>Bill No</th>
                                    <th>Company Name</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Purchase Amount</th>
                                    <th>Date/Time</th>
                                    <th>Bill</th>

                                </tr>
                            </thead>
                            <?php
                            $tamt = 0;
                            if (isset($_POST["show"])) {


                                $sd = $_POST['firstdate'];
                                $ed = $_POST['lastdate'];

                                $data = "select distinct billno from finalpurchase where date between  '$sd' and '$ed'";
                            } else {
                                $data = "select distinct billno from finalpurchase";
                            }

                            $res = mysqli_query($con, $data);
                            $c = 1;

                            while ($row = mysqli_fetch_assoc($res)) {
                                $bill = $row['billno'];
                                $qbill = "select * from purchasebill where billno='$bill'";
                                $resbill = mysqli_query($con, $qbill);
                                $rowbill = mysqli_fetch_assoc($resbill);

                            ?>
                                
                                <tr class="bg-danger">
                                    <td><?php echo $c; ?>
                                    </td>
                                    <td> <?php echo $row['billno']; ?>
                                    </td>
                                    <td><?php echo $rowbill['companyname']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $qsell1 = "select * from finalpurchase where billno='$bill'";
                                        $ressell1 = mysqli_query($con, $qsell1);
                                        while ($rowsell1 = mysqli_fetch_assoc($ressell1)) {
                                            echo $rowsell1['categoryname'] . "<br>";
                                        }

                                        ?>
                                    </td>
                                    <td><?php
                                        $qsell2 = "select * from finalpurchase where billno='$bill'";
                                        $ressell2 = mysqli_query($con, $qsell2);
                                        while ($rowsell2 = mysqli_fetch_assoc($ressell2)) {
                                            echo $rowsell2['subcategoryname'] . "<br>";
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $qsell = "select * from finalpurchase where billno='$bill'";
                                        $ressell = mysqli_query($con, $qsell);
                                        while ($rowsell = mysqli_fetch_assoc($ressell)) {
                                            echo $rowsell['productname'] . "<br>";
                                        }

                                        ?>
                                    </td>
                                    <td>
                                    <?php
                                        $qsell3 = "select * from finalpurchase where billno='$bill'";
                                        $ressell3 = mysqli_query($con, $qsell3);
                                        while ($rowsell3 = mysqli_fetch_assoc($ressell3)) {
                                            echo $rowsell3['quantity'] . "<br>";
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $qsell = "select * from finalpurchase where billno='$bill'";
                                        $ressell = mysqli_query($con, $qsell);
                                        $amt = 0;
                                        while ($rowsell = mysqli_fetch_assoc($ressell)) {
                                            $amt = $amt + $rowsell['price'] * $rowsell['quantity'];
                                        }
                                        echo $amt;
                                        $tamt = $tamt + $amt;
                                        ?>
                                    </td>
                                    <td>
                                    <?php
                                        $qsell4 = "select * from finalpurchase where billno='$bill'";
                                        $ressell4 = mysqli_query($con, $qsell4);
                                        while ($rowsell4 = mysqli_fetch_assoc($ressell4)) {
                                            echo $rowsell4['date'] . "<br>";
                                        }

                                        ?>
                                    </td>
                                    <td><a href="billgenerate.php?b=<?php echo $rowbill['billno']; ?>">click</a>
                                    </td>
                                </tr>
                            <?php
                                $c++;
                            }
                            ?>

                        </table>
                        <center> Total amount <?php echo $tamt;
                                                ?></center>
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