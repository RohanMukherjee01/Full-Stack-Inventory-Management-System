<?php
include('topnavbar.php');
include('sidenavbar.php');
include('dbcon.php');
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
function getproduct(str1,str2) 
{
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
            <h1 class="page-header "><b><i>Sell</i></b></h1>
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
                                
                                <div class="form-group">
                                    <label>Customer Name</label>
                                    <input class="form-control" placeholder="Enter Customer Name" name="custname" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label>Customer Phone Number</label>
                                    <input class="form-control" placeholder="Enter product price" name="phno" required pattern="[0-9]{10}" maxlength=10>
                                </div>
                                <div class="form-group">
                                    <label>Customer Address</label>
                                    <textarea class="form-control" placeholder="Enter product price" name="address" required ></textarea>
                                </div>
                                
                                


                                <center>
                                    <div class="form-group">
                                        <button type="submit" style="padding:5px 30px 5px 30px;" class="btn btn-success" name="show" onclick="return confirm('Do you want to add ');" ;>Add</button>
                                        <a href="#" class="btn btn-primary" id="b" style="padding:5px 30px 5px 30px;">show</a>
                            </form>
                        </div>
                        </center>
                            <?php
                            if (isset($_POST["show"]))
                             {
                                $bill="IB".time();
                                $cn=$_POST["custname"];
                                $cph=$_POST["phno"];
                                $cadd=$_POST["address"];
                                
                                
                                // $q= "select * from stock where productname='$pn' and quantity>='$qn'";
                                //  $res = mysqli_query($con, $q);
                                // $rc = mysqli_num_rows($res);
                                // if ($rc == 1) 
                                // {
                                    $insert= "INSERT INTO sell VALUES('','$bill','$cn','$cph','$cadd','n')";

                                    if (mysqli_query($con, $insert)) 
                                    {
                                        // echo "<script>alert('Adding sucessfull');</script>";
                                        // $update="update stock set quantity=quantity-'$qn' where productname='$pn'";
                                        // mysqli_query($con, $update);
                                        $msg = "added successfull";
                                        echo "<script>alert('$msg');window.location.href='finalsell.php?s=".$bill."'; </script>";

                                    } 
                                    else 
                                    {
                                       
                                        echo "<script>alert('Something Wrong!');</script>";
                                    }
                                }
                                // else
                                // {
                                //     echo "<script>alert('out of stock');</script>";
                                // }
                                
                            // }
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
                                    <th>Bill No</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phno</th>
                                    <th>Customer Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                            $q = "select * from sell";
                            $res = mysqli_query($con, $q);
                            $c = 1;
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                                <tr class="bg-danger">
                                    <td><?php echo $c; ?>
                                    </td>
                                    <td> <?php echo $row['billno']; ?>
                                    </td>
                                    <td> <?php echo $row['customername']; ?>
                                    </td>
                                    <td> <?php echo $row['customerphno']; ?>
                                    </td>
                                    <td> <?php echo $row['customeraddress']; ?>
                                    </td>
                                    <td><center>
                                        <a href="finalsell.php?s=<?php echo $row['billno']; ?>"><i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:20px; color:green;"></i> </a>
                                        
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