<html>
    
    <style>
        #color 
        {
            background-color: #29465B;
            border-bottom: 1px solid #eceff1 !important;
            
        }
        #color1 
        {
            background-color: #29465B;
            border-bottom: 0px  white !important;
            
        }
        
        </style>
        <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>
<body>

    <nav class="navbar  navbar-static-side" role="navigation">
        <!-- sidebar-collapse -->
        <div class="sidebar-collapse">
            <!-- side-menu -->
            <ul class="nav" id="side-menu" style=" background-color:#29465B; height:0px;">
                <br>

                <li id="color"  >
                    <a href="dashboard.php"><i class="fa fa-home fa-2x"></i> <font size="3px" id="size">   Dashboard</font>
               </a> 
                </li>
                <li id="color">
                    <a href="addadmin.php"><i class="fa fa-user fa-2x"></i><font size="3px" id="size">      Add Admin</font></a>
                </li>
                <li id="color">
                    <a href="#"><i class="fa fa-plus-square fa-2x"></i><font size="3px" id="size">      Add Item</font><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li  id="color1">
                            <a href="addcategory.php">Category</a>
                        </li>
                        <li id="color1">
                            <a href="addsubcategory.php">Sub Category</a>
                        </li>
                        <li id="color1">
                            <a href="product.php">Product</a>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>
                <li id="color">
                    <a href="#"><i class="fa fa-file fa-2x"></i><font size="3px" id="size">   Billing</font><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li id="color1">
                            <a href="purchase.php">Purchase</a>
                        </li>
                        <li id="color1">
                            <a href="sell.php">Sell</a>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>
                <li id="color">
                    <a href="#"><i class="fa fa-bar-chart-o fa-2x"></i><font size="3px" id="size">   Report</font><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li id="color1">
                            <a href="alladmin.php">All Admin</a>
                        </li>
                        <li id="color1">
                            <a href="totalsell.php">Sell Report</a>
                        </li>
                        <li id="color1">
                            <a href="monthlysell.php">Monthly Sell Report</a>
                        </li>
                        <li id="color1">
                            <a href="totalpurchase.php">Purchae Report</a>
                        </li>
                        <li id="color1">
                            <a href="monthlypurchase.php">Monthly Purchase Report</a>
                        </li>
                        <li id="color1">
                            <a href="totalproduct.php">Stock</a>
                        </li>
                        <li id="color1">
                            <a href="outofstock.php">Out Of Stock</a>
                        </li>
                    </ul>
                    <!-- second-level-items -->
                </li>


            </ul>
            <!-- end side-menu -->
        </div>
        <!-- end sidebar-collapse -->
    </nav>
</body>

</html>