<?php 
include('dbcon.php');
?>
<select name="subcategoryname" >
    <option>Select sub category</option>
    <?php 
$s=$_GET['q'];
$q = "select subcategoryname from subcategory where categoryname='$s'";
$res = mysqli_query($con, $q);
while ($row = mysqli_fetch_assoc($res)) {
    ?>
        <option value="<?php echo $row['subcategoryname']; ?>"><?php echo $row['subcategoryname']; ?></option>
    <?php
    }
    ?>
</select>
