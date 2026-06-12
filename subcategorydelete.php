<?php
 
    include('dbcon.php');
    $s=$_GET["s"];
$query="DELETE from subcategory where slno='$s'";
                                        if(mysqli_query($con, $query))
                                        {
                                            $msg="Category Deleted";
                                            echo "<script>alert('$msg');window.location.href='addsubcategory.php';</script>";
                                        }
                                        else
                                        {
                                            echo "<script>alert('Something Wrong!');</script>";
                                        }
                                    
                                    ?>
                               

