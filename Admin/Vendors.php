<?php
include "../db.php";
session_start();
if (!isset($_SESSION["admin_session"])) {
  header("Location: ../index.php");
} else {


  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "delete from `vendor` where `id`='$id'");
  }
  $vendor_year = 2023;
  if (isset($_GET['vendoryear'])) {
    $vendor_year = $_GET['vendoryear'];
  }
  $vendor_month = 1;
  if (isset($_GET['vendormonth'])) {
    $vendor_month = $_GET['vendormonth'];
  }

?>

  <!DOCTYPE html>

  <html lang="en">

  <head>
    <!-- Required meta tags -->

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <title>PraDhaan Admin</title>

    <!-- plugins:css -->

    <link rel="stylesheet" href="../vendors/feather/feather.css" />

    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css" />

    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css" />

    <!-- endinject -->

    <!-- Plugin css for this page -->

    <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css" />

    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css" />

    <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css" />

    <!-- End plugin css for this page -->

    <!-- inject:css -->

    <link rel="stylesheet" href="../css/vertical-layout-light/style.css" />

    <!-- endinject -->

    <link rel="shortcut icon" href="../images/favicon.png" />

    <style>
      i.mysize {
        font-size: 6em;
        color: #fff;
      }

      .btn {
        background: #fff;
        color: darkred;
        font-size: 1.2em;
        padding: 5px 30px;
        text-decoration: none;
        position: absolute;
        right: 20px;
      }
    </style>
  </head>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.php -->

      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo mr-5" href="./admin_dash"><img src="../images/logo.svg" class="mr-2" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="admin_dash"><img src="../images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>

      <!-- partial -->

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.php -->

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="admin_dash.php">
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
                <i class="material-icons">supervisor_account </i>
                <span class="menu-title">Vendors</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./GenReport.php">
                <i class="material-icons">book</i>
                <span class="menu-title">Reports</span>
              </a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" href="./Accounts.php">
                <i class="material-icons">currency_rupee</i>
                <span class="menu-title">Accounts</span>
              </a>
            </li> -->
            <li class="nav-item" style="margin: 20px; display: flex;align-item: center">
              <form method="POST">
                <!-- <a class="nav-link"> -->
                <i class="material-icons">logout </i>
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

              <div style="margin-bottom: 40px; float: right;">
                <form action="#" style="">
                  <label for="vendormonth">Select Month:</label>
                  <select id="vendormonth" name="vendormonth">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>

                  <select id="vendoryear" name="vendoryear">
                    <?php
                    for ($year = 2023; $year <= 2045; $year++) {
                      echo "<option value=\"$year\">$year</option>";
                    }
                    ?>
                  </select>

                  <input type="submit" value="Update month">
                </form>
              </div>


              <div class="col-md-12 stretch-card grid-margin">
                <div class="card data-icon-card-primary" style="height: 300px">
                  <div class="card-body">
                    <div style="
                        margin-top: 70px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        flex-direction: column;
                      ">
                      <p class="card-title text-white" style="font-size: 35px">
                        Add Vendors
                      </p>
                      <a href="./vendor_dets.php">
                        <button style="background: none; border: none">
                          <i class="material-icons mysize">add_circle</i>
                        </button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">

              <?php

              $query = mysqli_query($conn, "select * from vendor");
              while ($row = mysqli_fetch_array($query)) {
                $id = $row['id'];
                $name = $row['name'];
                $mobile = $row['mobile_no'];
                $address = $row['address'];
                $ddate = $row['date'];
                $value = $row['active'];

                if ($value == '1') {
                  $color = '#b5dfb5';
                } elseif ($value == '0') {
                  $color = '#e79494';
                }

              ?>
                <div class="col-md-3 stretch-card grid-margin">
                  <div class="card" style="margin-left=10px;">
                    <div class="card-body" style="border: 1px solid grey; border-radius: 20px;background-color: <?php echo $color; ?>">
                      <div style="display:flex; flex-direction: column">
                        <a href='Vendors.php?id=<?= $id ?>' class='btn'>Delete</a>
                        <a href="getvenrep.php?id=<?= $id ?>&month=<?= $vendor_month ?>&year=<?= $vendor_year  ?>" class='btn' style="margin-top: 40px">Report</a>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-borderless">


                          <tbody>
                            <tr>
                              <td class="pl-0">Sr. No</td>
                              <td style="background-color: <?php echo $color; ?> border-top-left-radius: 10px;border-top-right-radius: 10px">
                                <p class="mb-0">
                                  <span class="font-weight-bold mr-2"><?= $id ?></span>
                                </p>
                              </td>
                            </tr>

                            <tr>
                              <td class="pl-0">Name</td>

                              <td style="background-color: <?php echo $color; ?>">
                                <p class="mb-0">
                                  <span class="font-weight-bold mr-2"><?= $name ?></span>
                                </p>
                              </td>
                            </tr>

                            <tr>
                              <td class="pl-0">Mobile</td>

                              <td style="background-color: <?php echo $color; ?>">
                                <p class="mb-0">
                                  <span class="font-weight-bold mr-2"><?= $mobile ?></span>
                                </p>
                              </td>
                            </tr>

                            <tr>
                              <td class="pl-0">Address</td>

                              <td style="background-color: <?php echo $color; ?>">
                                <p class="mb-0">
                                  <span class="font-weight-bold mr-2"><?= $address ?></span>
                                </p>
                              </td>
                            </tr>
                            <tr>
                              <td class="pl-0">Date</td>

                              <td style="background-color: <?php echo $color; ?> border-bottom-left-radius: 10px;border-bottom-right-radius: 10px">
                                <p class="mb-0">
                                  <span class="font-weight-bold mr-2"><?= $ddate ?></span>
                                </p>
                              </td>
                            </tr>


                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>

            <div style="width: 100%; text-align: right">
              <a><Text style="
                    color: rgb(70, 20, 189);
                    cursor: pointer;
                    padding: 10px;
                  ">View All</Text></a>
            </div>
          </div>

          <!-- content-wrapper ends -->

          <!-- partial:partials/_footer.php -->

          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
                <i class="ti-heart text-danger ml-1"></i></span>
            </div>
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">By Dhanashree & Prathamesh
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

    <script src="../js/off-canvas.js"></script>

    <script src="../js/hoverable-collapse.js"></script>

    <script src="../js/template.js"></script>

    <script src="../js/settings.js"></script>

    <script src="../js/todolist.js"></script>

    <script src="../js/dashboard.js"></script>

    <script src="../js/Chart.roundedBarCharts.js"></script>
  </body>

  </html>
<?php

  if (isset($_POST['logoutt'])) {
    session_start();
    // session_unset($_SESSION['ad']);

    unset($_SESSION['admin_session']);
    session_destroy();
    echo "<script>window.open('../index.php','_self')</script>";
    //exit();
  }
}

?>