<?php 
include('dbcon.php');
?>
<select name="company" >
    <option>Select Company</option>
    <?php 
$s=$_GET['q'];
$q = "select distinct companyname from purchase  where productname='$s'";
$res = mysqli_query($con, $q);
while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <option value="<?php echo $row['companyname']; ?>"><?php echo $row['companyname']; ?></option>
    <?php
    }
    ?>
</select>
