<?php
 
    include('dbcon.php');
    $s1=$_GET["s"];
    $b=$_GET["bill"];
$query="DELETE from tempsell where slno='$s1'";
                                        if(mysqli_query($con, $query))
                                        {
                                            $msg="Category Deleted";
                                            echo "<script>alert('$msg');window.location.href='finalsell.php?s=".$b."'; </script>";
                                        }
                                        else
                                        {
                                            echo "<script>alert('Something Wrong!');</script>";
                                        }
                                    
                                    ?>
                               

