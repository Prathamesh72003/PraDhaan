<?php
include "../db.php";
session_start();
if(!isset($_SESSION["sales_session"])){
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
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <title>Skydash Admin</title>

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
              <a class="nav-link" href="./sales_dash.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./checkout.php">
                <i class="material-icons">shopping_cart </i>
                <span class="menu-title">Checkout</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../index.php">
                <i class="material-icons">logout </i>
                <span class="menu-title"> Logout</span>
              </a>
            </li>
          </ul>
        </nav>

        <!-- partial -->

        <div class="main-panel">
          <div class="content-wrapper" style="width: 100%">
            <div
              class="row"
              style="justify-content: center; align-items: center"
            >
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card" style="width: 100%">
                  <div class="card-body">
                    <div
                      style="
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        width: 100%;
                      "
                    >
                      <h4 class="card-title">Sales Person Details</h4>
                    </div>

                    <p class="card-description"></p>
                    <form
                      class="forms-sample"
                      method="POST"
                    >
                      <div class="form-group row">
                        <label
                          for="exampleInputUsername2"
                          class="col-sm-3 col-form-label"
                          >Name</label
                        >
                        <div class="col-sm-9">
                          <input
                            name="sname"
                            required
                            type="text"
                            class="form-control"
                            id="exampleInputUsername2"
                            placeholder="Enter the name"
                          />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label
                          for="exampleInputEmail2"
                          class="col-sm-3 col-form-label"
                          >Mobile no.</label
                        >
                        <div class="col-sm-9">
                          <input
                            name="smobile"
                            required
                            type="text"
                            class="form-control"
                            id="exampleInputEmail2"
                            placeholder="Enter the Mobile Number"
                          />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label
                          for="exampleInputEmail2"
                          class="col-sm-3 col-form-label"
                          >Address</label
                        >
                        <div class="col-sm-9">
                          <input
                          name="saddress"
                          required
                            type="text"
                            class="form-control"
                            id="exampleInputEmail2"
                            placeholder="Enter the Address"
                          />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label
                          for="exampleInputEmail2"
                          class="col-sm-3 col-form-label"
                          >Identity Proof</label
                        >
                        <div class="col-sm-9">
                          <input
                          name="sidentity"
                          required
                            type="text"
                            class="form-control"
                            id="exampleInputEmail2"
                            placeholder="Enter Adhaar no./PAN no."
                          />
                        </div>
                      </div>

                      <div
                        class="form-check form-check-flat form-check-primary"
                      ></div>
                      <div
                        style="
                          width: 100%;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                        "
                      >
                        <button type="submit" class="btn btn-primary mr-2" name="sbtn">
                          ADD
                        </button>
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

if(isset($_POST['sbtn'])){
  
  $sname = $_POST['sname'];
  $smobile = $_POST['smobile'];
  $saddress = $_POST['saddress'];
  $sidentity = $_POST['sidentity'];
  $items_sold = 0;

  $insert =mysqli_query($conn,"insert into `salesperson`(`name`,`mobile_no`,`address`,`identity_proof`,`items_sold`) values('$sname','$smobile','$saddress','$sidentity','$items_sold')");

  if($insert){
  echo "<script>alert('Sales Person added!')</script>";
  echo "<script>window.open('./sales_dash.php','_self')</script>";
  }
  else{
    echo "<script>alert('Sales Person not added')</script>";
    echo "<script>console.log('Not done')</script>";
  }
}  


if(isset($_POST['logoutt'])){
  session_start();
   unset($_SESSION['sales_session']);
   session_destroy();
   echo "<script>window.open('../index.php','_self')</script>";
   //exit();
}

}

?>