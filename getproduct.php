<?php 
include('dbcon.php');

$s=$_GET['q'];
$s1=$_GET['q1'];

?>
<select name="product" >
    <option>Select product name</option>
    <?php 

$q = "select productname from product where categoryname='$s' and subcategoryname='$s1'";
$res = mysqli_query($con, $q);
while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <option value="<?php echo $row['productname']; ?>"><?php echo $row['productname']; ?></option>
    <?php
    }
    ?>
</select>
