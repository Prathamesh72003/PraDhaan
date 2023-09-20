<?php
include "../db.php";
session_start();
if (!isset($_SESSION["admin_session"])) {
  header("Location: ../index.php");

} else {

  ?>


  <!DOCTYPE html>

  <html lang="en">

  <head>
    <!-- Required meta tags -->

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <title>Skydash Admin</title>

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
    </style>
  </head>

  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.php -->

      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo mr-5" href="./admin_dash.php"><img src="../images/logo.svg" class="mr-2"
              alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="./admin_dash.php"><img src="../images/logo-mini.svg"
              alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
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

        <div id="right-sidebar" class="settings-panel">
          <i class="settings-close ti-close"></i>

          <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                aria-controls="chats-section">CHATS</a>
            </li>
          </ul>

          <div class="tab-content" id="setting-content">
            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
              aria-labelledby="todo-section">
              <div class="add-items d-flex px-3 mb-0">
                <form class="form w-100">
                  <div class="form-group d-flex">
                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do" />

                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">
                      Add
                    </button>
                  </div>
                </form>
              </div>

              <div class="list-wrapper px-3">
                <ul class="d-flex flex-column-reverse todo-list">
                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" />

                        Team review meeting at 3.00 PM
                      </label>
                    </div>

                    <i class="remove ti-close"></i>
                  </li>

                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" />

                        Prepare for presentation
                      </label>
                    </div>

                    <i class="remove ti-close"></i>
                  </li>

                  <li>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" />

                        Resolve all the low priority tickets due today
                      </label>
                    </div>

                    <i class="remove ti-close"></i>
                  </li>

                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked />

                        Schedule meeting for next week
                      </label>
                    </div>

                    <i class="remove ti-close"></i>
                  </li>

                  <li class="completed">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked />

                        Project review
                      </label>
                    </div>

                    <i class="remove ti-close"></i>
                  </li>
                </ul>
              </div>

              <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">
                Events
              </h4>

              <div class="events pt-4 px-3">
                <div class="wrapper d-flex mb-2">
                  <i class="ti-control-record text-primary mr-2"></i>

                  <span>Feb 11 2018</span>
                </div>

                <p class="mb-0 font-weight-thin text-gray">
                  Creating component page build a js
                </p>

                <p class="text-gray mb-0">The total number of sessions</p>
              </div>

              <div class="events pt-4 px-3">
                <div class="wrapper d-flex mb-2">
                  <i class="ti-control-record text-primary mr-2"></i>

                  <span>Feb 7 2018</span>
                </div>

                <p class="mb-0 font-weight-thin text-gray">
                  Meeting with Alisa
                </p>

                <p class="text-gray mb-0">Call Sarah Graves</p>
              </div>
            </div>

            <!-- To do section tab ends -->

            <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
              <div class="d-flex align-items-center justify-content-between border-bottom">
                <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">
                  Friends
                </p>

                <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                  All</small>
              </div>

              <ul class="chat-list">
                <li class="list active">
                  <div class="profile">
                    <img src="images/faces/face1.jpg" alt="image" /><span class="online"></span>
                  </div>

                  <div class="info">
                    <p>Thomas Douglas</p>

                    <p>Available</p>
                  </div>

                  <small class="text-muted my-auto">19 min</small>
                </li>

                <li class="list">
                  <div class="profile">
                    <img src="images/faces/face2.jpg" alt="image" /><span class="offline"></span>
                  </div>

                  <div class="info">
                    <div class="wrapper d-flex">
                      <p>Catherine</p>
                    </div>

                    <p>Away</p>
                  </div>

                  <div class="badge badge-success badge-pill my-auto mx-2">
                    4
                  </div>

                  <small class="text-muted my-auto">23 min</small>
                </li>

                <li class="list">
                  <div class="profile">
                    <img src="images/faces/face3.jpg" alt="image" /><span class="online"></span>
                  </div>

                  <div class="info">
                    <p>Daniel Russell</p>

                    <p>Available</p>
                  </div>

                  <small class="text-muted my-auto">14 min</small>
                </li>

                <li class="list">
                  <div class="profile">
                    <img src="images/faces/face4.jpg" alt="image" /><span class="offline"></span>
                  </div>

                  <div class="info">
                    <p>James Richardson</p>

                    <p>Away</p>
                  </div>

                  <small class="text-muted my-auto">2 min</small>
                </li>

                <li class="list">
                  <div class="profile">
                    <img src="images/faces/face5.jpg" alt="image" /><span class="online"></span>
                  </div>

                  <div class="info">
                    <p>Madeline Kennedy</p>

                    <p>Available</p>
                  </div>

                  <small class="text-muted my-auto">5 min</small>
                </li>

                <li class="list">
                  <div class="profile">
                    <img src="images/faces/face6.jpg" alt="image" /><span class="online"></span>
                  </div>

                  <div class="info">
                    <p>Sarah Graves</p>

                    <p>Available</p>
                  </div>

                  <small class="text-muted my-auto">47 min</small>
                </li>
              </ul>
            </div>

            <!-- chat tab ends -->
          </div>
        </div>

        <!-- partial -->

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
                <i class="material-icons">supervisor_account </i>
                <span class="menu-title">Vendors</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./Accounts.php">
                <i class="material-icons">currency_rupee</i>
                <span class="menu-title">Accounts</span>
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
            <div class="row" style="justify-content: center; align-items: center">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card" style="width: 100%">
                  <div class="card-body">
                    <div style="
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        width: 100%;
                      ">
                      <h4 class="card-title">Stock Entry</h4>
                    </div>

                    <p class="card-description"></p>
                    <form class="forms-sample" method="POST">
                      
                    <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Item</label>
                        <div class="col-sm-9">
                          <select class="form-control" id="dropitemid" name="dropitem">
                            <?php
                            $vendor_query = mysqli_query($conn, "select * from product");
                            while ($row = mysqli_fetch_array($vendor_query)) {
                              $name = $row['name'];
                              ?>

                              <option>
                                <?= $name ?>
                              </option>

                            <?php } ?>


                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Quantity</label>
                        <div class="col-sm-9">
                          <input name="exsistingquantity" required type="text" class="form-control" id="exsistingquantityid"
                            placeholder="Enter the Quantity" />
                        </div>
                      </div>                      

                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Vendors</label>


                        <div class="col-sm-9">
                          <select class="form-control" id="exampleSelectGender" name="vendors">
                            <?php
                            $vendor_query = mysqli_query($conn, "select * from vendor where active=1");
                            while ($row = mysqli_fetch_array($vendor_query)) {
                              $vname = $row['name'];


                              ?>
                              <option>
                                <?= $vname ?>
                              </option>

                            <?php } ?>
                          </select>

                        </div>


                      </div>

                      <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                          <input name="price" required type="text" class="form-control"
                            id="exampleInputConfirmPassword2" placeholder="Enter the Price
                             " />
                        </div>
                      </div>
                      <div class="form-check form-check-flat form-check-primary"></div>
                      <div style="
                          width: 100%;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                        ">
                        <button type="submit" class="btn btn-primary mr-2" name="addstockbtn">
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

  if(isset($_POST['addstockbtn'])){
    $item = $_POST['dropitem'];
    $quantity = $_POST['exsistingquantity'];
    $vendor = $_POST['vendors'];
    $price = $_POST['price'];
    $category = "";
    $category_name = "";

    $fetch_query = mysqli_query($conn, "SELECT * FROM product WHERE name='$name'");
    while ($row = mysqli_fetch_array($fetch_query)) {
      $name = $row['name'];
      $category = $row['category'];
    }

    $fetch_cat_name = mysqli_query($conn, "SELECT * FROM category WHERE id='$category'");
    while ($row = mysqli_fetch_array($fetch_cat_name)) {
      $category_name = $row['category_name'];
    }

    date_default_timezone_set('Asia/Kolkata'); 
    $currentDateTime = date('Y-m-d H:i:s'); 

    $insert = mysqli_query($conn, "INSERT INTO `stock`(`item`, `quantity`, `category`, `vendor`, `price`, `date`) VALUES ('$item', '$quantity', '$category_name', '$vendor', '$price', '$currentDateTime')");
    $sql = "UPDATE product SET unit = unit + $quantity WHERE name = '$item'"; 
    if ($conn->query($sql) === TRUE) 
    { 
      echo "Record updated successfully"; 
    } 
    else 
    { 
      echo "Error updating record: " . $conn->error; 
    }

    if($insert){
    echo "<script>alert('Stock added!')</script>";
    echo "<script>window.open('./Stocks.php','_self')</script>";
    }
    else{
      echo "<script>alert('Stocks not added')</script>";
    }

  }                     


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