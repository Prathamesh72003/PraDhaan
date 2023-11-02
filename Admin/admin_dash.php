<?php
include "../db.php";
session_start();
if(!isset($_SESSION["admin_session"])){
  header("Location: ../index.php");

}
else{

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
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome <?= $_SESSION["admin_session"] ?> </h3>
                    <h6 class="font-weight-normal mb-0">
                      Have a look at your collections!
                    </h6>
                  </div>
                  <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                      <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        
                      
                      <input type="date" id="selectedDate" name="selectedDate" class="form-control" required>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                  <div class="card-people mt-auto">
                    <img src="../images/dashboard/ppl.png" alt="people" />
                    <div class="weather-info"></div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 grid-margin transparent">
                <div class="row">
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body">
                        <p class="mb-4">Today’s Checkouts</p>
                        <?php
                          date_default_timezone_set('Asia/Kolkata');
                          $current_date = date('Y-m-d'); 
                            $query = "SELECT COUNT(*) AS record_count FROM Invoice where DATE(datetime) = '$current_date'";
                            $result = mysqli_query($conn, $query);

                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                $record_count = $row['record_count'];
                            } else {
                                $record_count = 0; 
                            }
                        ?> 
                        <p class="fs-30 mb-2"><?= $record_count ?></p>
                        <p><?= $current_date ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <p class="mb-4">Active Vendors</p>
                        <?php
                          date_default_timezone_set('Asia/Kolkata');
                          $current_date = date('Y-m-d'); 
                            $query = "SELECT COUNT(*) AS record_count FROM vendor where active=1";
                            $result = mysqli_query($conn, $query);

                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                $record_count = $row['record_count'];
                            } else {
                                $record_count = 0; 
                            }
                        ?> 
                        <p class="fs-30 mb-2"><?= $record_count ?></p>
                        <p><?= $current_date ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <p class="mb-4">This months total checkout amount</p>
                        <?php
                          date_default_timezone_set('Asia/Kolkata');
                          $currentMonth = date('m');
                          $currentYear = date('Y'); 
                          $query = mysqli_query($conn, "SELECT SUM(total_amount) AS total_checkout_money FROM Invoice WHERE MONTH(datetime) = $currentMonth AND YEAR(datetime) = $currentYear");

                          if ($query) {
                          $result = mysqli_fetch_assoc($query);
                          $totalCheckoutMoney = $result['total_checkout_money'];
                          } else {
                          echo "Error executing the query: " . mysqli_error($conn);
                          }

                        ?> 
                        <p class="fs-30 mb-2">Rs. <?= $totalCheckoutMoney ?></p>
                        <p><?= $current_date ?> (30 days)</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <p class="mb-4">Number of Clients</p>
                        <p class="fs-30 mb-2">47033</p>
                        <p>0.22% (30 days)</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" style="margin-top: 20px;">
              <div class="col-md-7 grid-margin stretch-card"> 
                <div class="card">
                <div class="card-body">
                 
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Contact</th>
                          <th>Amount</th>
                          <th>Sold By</th>
                          <th>Date</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                          
                      <?php  
                      
                      $query = mysqli_query($conn, "SELECT * FROM Invoice ORDER BY datetime DESC LIMIT 8");
                      while ($row = mysqli_fetch_array($query)) {
                        
                        $cust_name = $row['customer_name'];
                        $contact = $row['contact'];
                        $totalamt = $row['total_amount'];
                        $date = $row['datetime'];
                        $soldby = $row['sales_person_name'];
      
                      ?>

                        <tr>
                          <td><?= $cust_name ?></td>
                          <td><?= $contact ?></td>
                          <td class="font-weight-bold"><?= $totalamt ?></td>
                          <td><?= $soldby ?></td>
                          <td><?= $date ?></td>
                          
                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div style="width: 100%;margin-top: 10px;text-align: right;"> <a href="#" class="text-info">View all</a></div>
                 
                </div>
              </div>
            </div>
              <div class="col-md-5 grid-margin stretch-card">

                <div class="card">
                  <div class="card-body">

                    <div class="d-flex justify-content-between">
                      <p class="card-title">Sales Report</p>
                      <a href="#" class="text-info">View all</a>
                    </div>
                    <!-- <p class="font-weight-500">
                      The total number of sessions within the date range. It is
                      the period time a user is actively engaged with your
                      website, page or app, etc
                    </p> -->
                    <div
                      id="sales-legend"
                      class="chartjs-legend mt-4 mb-2"
                    ></div>
                    <canvas id="sales-chart"></canvas>
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