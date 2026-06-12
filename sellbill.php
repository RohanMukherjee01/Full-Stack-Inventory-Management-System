<?php
include('topnavbar.php');
include('sidenavbar.php');
include('dbcon.php');
?>
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
function getproduct(str) 
{
  if (str.length == 0) {
    document.getElementById("product").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("product").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "getproduct.php?q=" + str, true);
    xmlhttp.send();
  }
}
function getcompany(str) 
{
  if (str.length == 0) {
    document.getElementById("company").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("company").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "getcompany.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<!-- end navbar side -->
<!--  page-wrapper -->
<div id="page-wrapper">

    <div class="row">
        <!-- page header -->
        <div class="col-lg-12">
            <h1 class="page-header ">Sell</h1>
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
                                <label>Customer Name </label>
                                <input class="form-control" placeholder="Enter customer name" name="customername" required>

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

                                    <label class="col-sm-2 col-form-label" >Sub Category </label>
                                    <div class="col-sm-12">

                                        <select class="form-control" id="subcat" name="subcategoryname" required  onchange="getproduct(this.value);">
                                            <option>Select Sub-Category </option>
                                           
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">

                                    <label class="col-sm-2 col-form-label">Product Name </label>
                                    <div class="col-sm-12">

                                        <select class="form-control" id="product" name="product" required  onchange="getcompany(this.value);">
                                            <option>Select Product </option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Quantity </label>
                                    <input class="form-control" placeholder="Enter product quantity" name="quantity" type="text" required>
                                </div>
                                <div class="form-group">
                                    <label>Price </label>
                                    <input class="form-control" placeholder="Enter product price" name="price" required >
                                </div>
                                


                                <center><button type="submit" style="padding:5px 30px 5px 30px;" class="btn btn-success" name="show" onclick="return confirm('Do you want to Add')" ;>Add</button></center>
                            </form>
                            <?php
                            if (isset($_POST["show"]))
                             {
                                $co=$_POST["customername"];
                                $c = $_POST["categoryname"];
                                $sc = $_POST["subcategoryname"];
                                $pn=$_POST["product"];
                                $qn=$_POST["quantity"];
                                $pr=$_POST["price"];
                                $q= "select * from stock where productname='$pn' and quantity>='$qn'";
                                 $res = mysqli_query($con, $q);
                                $rc = mysqli_num_rows($res);
                                if ($rc == 1) 
                                {
                                    $insert= "INSERT INTO sell VALUES('','$co','$c','$sc','$pn','$qn','$pr')";

                                    if (mysqli_query($con, $insert)) 
                                    {
                                        echo "<script>alert('Adding sucessfull');</script>";
                                        $update="update stock set quantity=quantity-'$qn' where productname='$pn'";
                                        mysqli_query($con, $update);

                                    } 
                                    else 
                                    {
                                       
                                        echo "<script>alert('Something Wrong!');</script>";
                                    }
                                }
                                else
                                {
                                    echo "<script>alert('out of stock');</script>";
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
                                    <th>Customer Name</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name </th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
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
                                    <td> <?php echo $row['customername']; ?>
                                    </td>
                                    <td><?php echo $row['categoryname']; ?>
                                    </td>
                                    <td><?php echo $row['subcategoryname']; ?>
                                    </td>
                                    <td><?php echo $row['productname']; ?>
                                    </td>
                                    <td><?php echo $row['quantity']; ?>
                                    </td>
                                    <td><?php echo $row['price']; ?>
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