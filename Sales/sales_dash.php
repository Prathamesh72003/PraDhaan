<?php
include "../db.php";


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
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <title>PraDhaan Admin</title>

    <!-- plugins:css -->

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

    <style>
      i.mysize {
        font-size: 6em;
        color: #fff;
      }
    </style>
  </head>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.php -->

      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div
          class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
        >
          <a class="navbar-brand brand-logo mr-5" href="./sales_dash.php"
            ><img src="../images/logo.svg" class="mr-2" alt="logo"
          /></a>
          <a class="navbar-brand brand-logo-mini" href="./sales_dash.php"
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

        <!-- partial -->

        <!-- partial:partials/_sidebar.php -->

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
          
            <li class="nav-item">
              <a class="nav-link" href="./checkout.php">
                <i class="material-icons">shopping_cart </i>
                <span class="menu-title">Checkout</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="./getinvoice.php">
                <i class="material-icons">receipt_long </i>
                <span class="menu-title">Invoices</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="././sales_dash.php">
                <i class="icon-grid menu-icon"></i>

                <span class="menu-title">Add Sales Person</span>
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
              <div class="col-md-12 stretch-card grid-margin">
                <div class="card data-icon-card-primary" style="height: 300px">
                  <div class="card-body">
                    <div
                      style="
                        margin-top: 70px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        flex-direction: column;
                      "
                    >
                      <p class="card-title text-white" style="font-size: 35px">
                        Add Sales Person
                      </p>
                      <a href="./sales_dets.php">
                        <button style="background: none; border: none">
                          <i class="material-icons mysize">add_circle</i>
                        </button></a
                      >
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title">Sales List</p>
                    <hr>

                    <ul class="icon-data-list">
                      
                     <?php 
                     
                      $query = mysqli_query($conn,"SELECT * FROM `sales_person` ORDER BY `items_sold` DESC");
                      while ($row = mysqli_fetch_array($query)) {
                        $name = $row['name'];
                        $itemsold = $row['items_sold'];
                      
                      ?> 
                      <li>
                        <div class="d-flex">
                          <img src="../images/faces/defaultfacerec.png" alt="user" />

                          <div>
                            <p class="text-info mb-1"><?= $name ?></p>

                            <p class="mb-0">No. of Items sold: <?= $itemsold ?></p>
                          </div>
                        </div>
                      </li>
                      <hr>

                      <?php
                        }
                      ?>
                    </ul>
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
if(isset($_POST['logoutt'])){
  session_start();
   unset($_SESSION['sales_session']);
   session_destroy();
   echo "<script>window.open('../index.php','_self')</script>";
   //exit();
}

?>