<?php
include "../db.php";
session_start();
if(!isset($_SESSION["admin_session"])){
  header("Location: ../index.php");

}
else{

?>

<?php 

include('../db.php');

date_default_timezone_set('Asia/Kolkata');
$currentMonth = date('m');
$currentYear = date('Y'); 

$sqlinvoice ="select * from Invoice WHERE MONTH(datetime) = $currentMonth AND YEAR(datetime) = $currentYear";
$sqlstock ="select * from stock WHERE MONTH(date) = $currentMonth AND YEAR(date) = $currentYear";
$sqlvendor ="select * from vendor WHERE MONTH(date) = $currentMonth AND YEAR(date) = $currentYear";

$resultinvoice = mysqli_query($conn,$sqlinvoice);
$resultstock = mysqli_query($conn,$sqlstock);
$resultvendor = mysqli_query($conn,$sqlvendor);

$finaldatainvoice=array();
$finaldatastock=array();
$finaldatavendor=array();

while($datain=mysqli_fetch_assoc($resultinvoice))
{
	$finaldatainvoice[]=$datain;
}

while($datast=mysqli_fetch_assoc($resultstock))
{
	$finaldatastock[]=$datast;
}

while($datave=mysqli_fetch_assoc($resultvendor))
{
	$finaldatavendor[]=$datave;
}

if(isset($_POST['invoice']))
{
	$filename = "invoicedata".date('Ymdhis') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	
	$firstrow=false;
	foreach($finaldatainvoice as $datain)
	{
		if(!$firstrow)
		{
			echo implode("\t",array_keys($datain))."\n";
			$firstrow=true;
		}
		
		echo implode("\t",array_values($datain))."\n";
		
	}
	
	exit;
	
}
if(isset($_POST['stock']))
{
	$filename = "stockdata".date('Ymdhis') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	
	$firstrow=false;
	foreach($finaldatastock as $data)
	{
		if(!$firstrow)
		{
			echo implode("\t",array_keys($data))."\n";
			$firstrow=true;
		}
		
		echo implode("\t",array_values($data))."\n";
		
	}
	
	exit;
	
}
if(isset($_POST['vendor']))
{
	$filename = "vendordata".date('Ymdhis') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");
	
	$firstrow=false;
	foreach($finaldatavendor as $data)
	{
		if(!$firstrow)
		{
			echo implode("\t",array_keys($data))."\n";
			$firstrow=true;
		}
		
		echo implode("\t",array_values($data))."\n";
		
	}
	
	exit;
	
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>PraDhaan Admin</title>
    <!-- plugins:css -->
    <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet">
    <link rel="stylesheet" href="../vendors/feather/feather.css" />
    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link
      rel="stylesheet"
      href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css"
    />
    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="../js/select.dataTables.min.css"
    />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.php -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div
          class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
        >
          <a class="navbar-brand brand-logo mr-5" href="./admin_dash.php"
            ><img src="../images/logo.svg" class="mr-2" alt="logo"
          /></a>
          <a class="navbar-brand brand-logo-mini" href="./admin_dash"
            ><img src="../images/logo-mini.svg" alt="logo"
          /></a>
        </div>
        <div
          class="navbar-menu-wrapper d-flex align-items-center justify-content-end"
        >
          <button
            class="navbar-toggler navbar-toggler align-self-center"
            type="button"
            data-toggle="minimize"
          >
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.php -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="ti-settings"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>
              Light
            </div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>
              Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default"></div>
            </div>
          </div>
        </div>
      
        <!-- partial:partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="./admin_dash.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./insertProduct.php">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Insert an Item</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./Stocks.php">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Stocks</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./Vendors.php">
                <i class = "material-icons">supervisor_account   </i>
                <span class="menu-title">Vendors</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./GenReport.php">
                <i class = "material-icons">book</i>
                <span class="menu-title">Reports</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./BarCodeGen.php">
                <i class = "material-icons">book</i>
                <span class="menu-title">Generate Bar-Codes</span>
              </a>
            </li>
            <li class="nav-item" style="margin: 20px; display: flex;align-item: center">
              <form method="POST">
                <!-- <a class="nav-link"> -->
                <i class = "material-icons">logout  </i>
                <span class="menu-title"><input style="border: none; background-color: #fff;" type="submit" name="logoutt" value="Logout"></span>
              <!-- </a> -->
            </form>

            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
           
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                
              </div>

            
            </div>
            <div class="row" style="margin-top: 20px;">
              	<div class="col-md-12 grid-margin stretch-card"> 
                	<div class="card">
                		<div class="card-body" style="background: #F5F7FF">
                        <h3 style="margin-left: 10px;margin-bottom: 50px">GENERATE ALL YOUR BARCODES</h3>
                        <form class="form-horizontal" method="post" action="barcode.php" target="_blank">
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="product">Product:</label>
                            <div class="col-sm-10">
                              <select class="form-control" id="product" name="product">
                                <?php
                                  $sales_query = mysqli_query($conn, "select * from product");
                                  while ($row = mysqli_fetch_array($sales_query)) {
                                    $name = $row['name'];
                                    $id = $row['id'];
                                    ?>

                                    <option value="<?php echo $id ?>">
                                      <?= $name ?>
                                    </option>

                                  <?php } ?>
                              </select> 
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="product_id">Product ID:</label>
                            <div class="col-sm-10">
                              <input readonly autocomplete="OFF" type="text" class="form-control" id="product_id" name="product_id">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="rate">Rate</label>
                            <div class="col-sm-10">          
                              <input readonly autocomplete="OFF" type="text" class="form-control" id="rate"  name="rate">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-2" for="print_qty">Barcode Quantity</label>
                            <div class="col-sm-10">          
                              <input readonly autocomplete="OFF" type="print_qty" class="form-control" id="print_qty"  name="print_qty">
                            </div>
                          </div>

                          <div class="form-group">  
                            <div class="col-sm-10">
                              <input readonly autocomplete="OFF" type="hidden" class="form-control" id="prod" name="prod">
                              <input readonly autocomplete="OFF" type="hidden" class="form-control" id="cat" name="cat">
                            </div>
                          </div>

                          <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary mr-2">GENERATE</button>
                            </div>
                          </div>
                        </form>
                		</div>
              		</div>
				</div>
			</div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.php -->
          <footer class="footer">
            <div
              class="d-sm-flex justify-content-center justify-content-sm-between"
            >
              <span
                class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"
                >Hand-crafted & made with
                <i class="ti-heart text-danger ml-1"></i
              ></span>
            </div>
            <div
              class="d-sm-flex justify-content-center justify-content-sm-between"
            >
              <span
                class="text-muted text-center text-sm-left d-block d-sm-inline-block"
                >By Dhanashree & Prathamesh
              </span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/template.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../js/dashboard.js"></script>
    <script src="../js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
    <script>
      $(document).ready(function(){
      $("#product").change(function(){
        var id = $(this).find(":selected").val();
        var dataString = 'id='+id;
        $.ajax({
          url: "GetData.php",
          dataType: "json",
          data: dataString,
          cache: false,
          success: function(prodData){
            if (prodData) {
              $('#prod').val(prodData.name);
              $('#product_id').val(prodData.id);
              $('#rate').val(prodData.mrp);
              $('#cat').val(prodData.category);
              $('#print_qty').val('30');
            }
          }
        })
      })
     })
    </script>
  </body>
</html>

<?php
if(isset($_POST['logoutt'])){
  session_start();
 // session_unset($_SESSION['ad']);

  unset($_SESSION['admin_session']);
  session_destroy();
  echo "<script>window.open('../index.php','_self')</script>";
  //exit();
}

}

?>