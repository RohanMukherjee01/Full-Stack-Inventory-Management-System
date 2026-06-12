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
            <h1 class="page-header "><b><i>Monthly Sell Report</b></i></h1>
        </div>
        <!--end page header -->
    </div>




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
                                    <th>Bill No</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phno </th>
                                    <th>Customer Address</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Bill</th>
                                </tr>
                            </thead>
                            <?php
                            date_default_timezone_set("Asia/kolkata");
                            $sd = date("Y-m") . "-01";
                            $ed = date("Y-m") . "-31";
                            $month = date("M");
                            $q = "select * from finalsell where date between '$sd' and '$ed'";
                            $res = mysqli_query($con, $q);
                            $c = 1;
                            while ($row = mysqli_fetch_assoc($res)) {
                                $bill = $row['billno'];
                                $qbill = "select * from finalsell where billno='$bill'";
                                $resbill = mysqli_query($con, $qbill);
                                $rowbill = mysqli_fetch_assoc($resbill);

                            ?>
                                <tr class="bg-danger">
                                    <td><?php echo $c; ?>
                                    </td>
                                    <td><?php echo $rowbill['billno'];?>
                                    </td>
                                    <td> 
                                    <?php
                                        $qsell1 = "select * from sell where billno='$bill'";
                                        $ressell1 = mysqli_query($con, $qsell1);
                                        while ($rowsell1 = mysqli_fetch_assoc($ressell1)) {
                                            echo $rowsell1['customername'] . "<br>";
                                        }

                                        ?>
                                    </td>
                                    <td> 
                                    <?php
                                        $qsell2 = "select * from sell where billno='$bill'";
                                        $ressell2 = mysqli_query($con, $qsell2);
                                        while ($rowsell2 = mysqli_fetch_assoc($ressell2)) {
                                            echo $rowsell2['customerphno'] . "<br>";
                                        }

                                        ?>
                                    </td>
                                    <td> 
                                    <?php
                                        $qsell3 = "select * from sell where billno='$bill'";
                                        $ressell3 = mysqli_query($con, $qsell3);
                                        while ($rowsell3 = mysqli_fetch_assoc($ressell3)) {
                                            echo $rowsell3['customeraddress'] . "<br>";
                                        }

                                        ?>
                                    </td>

                                    
                                    <td><?php echo $row['productname']; ?>
                                    </td>
                                    <td><?php echo $row['quantity']; ?>
                                    </td>
                                    <td><?php echo $row['price']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $date = $row['date'];
                                        $d = date("d-m-Y", strtotime($date));
                                        echo $d;
                                        ?>
                                    </td>
                                    <td><a href="billgeneratesell.php?b=<?php echo $rowbill['billno']; ?>">click</a>
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