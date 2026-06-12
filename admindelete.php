<?php session_start();
if(empty($_SESSION["un"]))
{
    $msg="please login";
    echo "<script>alert('$msg');window.location.href='login.php'; </script>";
}
 
    include('dbcon.php');
    $s=$_GET["s"];
$query="DELETE from admin where slno='$s'";
                                        if(mysqli_query($con, $query))
                                        {
                                            $msg="Admin Deleted";
                                            echo "<script>alert('$msg');window.location.href='alladmin.php';</script>";
                                        }
                                        else
                                        {
                                            echo "<script>alert('Something Wrong!');</script>";
                                        }
                                    
                                    ?>
                               

