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
            <!-- <li class="nav-item">
              <a class="nav-link" href="./Accounts.php">
                <i class="material-icons">currency_rupee</i>
                <span class="menu-title">Accounts</span>
              </a>
            </li> -->
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
                      <h4 class="card-title">Add The Product</h4>
                    </div>

                    <p class="card-description"></p>
                    <form class="forms-sample" method="POST">
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input name="proname" required type="text" class="form-control" id="pronameid"
                            placeholder="Enter the item" />
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Buy Price</label>
                        <div class="col-sm-9">
                          <input name="buyprice" required type="text" class="form-control" id="exampleInputEmail2"
                            placeholder="Enter the Buy Price" />
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sale Price</label>
                        <div class="col-sm-9">
                          <input name="mrp" required type="text" class="form-control" id="exampleInputEmail2"
                            placeholder="Enter the Selling Price" />
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Quantity</label>
                        <div class="col-sm-9">
                          <input name="units" required type="text" class="form-control" id="exampleInputEmail2"
                            placeholder="Enter the Item Quantity" />
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                          <select class="form-control" id="categoryid" name="category">
                            <?php
                            $cat_query = mysqli_query($conn, "select * from category");
                            while ($row = mysqli_fetch_array($cat_query)) {
                              $catname = $row['category_name'];
                              ?>

                              <option>
                                <?= $catname ?>
                              </option>

                            <?php } ?>


                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Vendor</label>
                        <div class="col-sm-9">
                          <select class="form-control" id="vendorid" name="vendor">
                            <?php
                            $ven_query = mysqli_query($conn, "select * from vendor");
                            while ($row = mysqli_fetch_array($ven_query)) {
                              $vendor = $row['name'];
                              ?>

                              <option>
                                <?= $vendor ?>
                              </option>

                            <?php } ?>


                          </select>
                        </div>
                      </div>
                      
                      <div class="form-check form-check-flat form-check-primary"></div>
                      <div style="
                          width: 100%;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                        ">
                        <!-- <button type="button" class="btn btn-primary mr-2" name="genbarcode" id="genbarcodeid">
                          ADD
                        </button> -->
                        <button type="submit" class="btn btn-primary mr-2" name="genbarcode" id="genbarcode">
                          ADD PRODUCT
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

           
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card" style="width: 100%">
                  <div class="card-body">
                    <div style="
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        width: 100%;
                      ">
                      <h4 class="card-title">Add Category</h4>
                    </div>

                    <p class="card-description"></p>
                    <form class="forms-sample" method="POST">
                      <div class="form-group row">
                        <label for="catname" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                          <input name="catname" required type="text" class="form-control" id="catnameid"
                            placeholder="Enter the categry name" />
                        </div>
                      </div>
                
                      
                      <div class="form-check form-check-flat form-check-primary"></div>
                      <div style="
                          width: 100%;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                        ">
                        <button type="submit" class="btn btn-primary mr-2" name="addcat" id="addcat">
                          ADD CATRGORY
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
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
    <script>
        $('#genbarcodeid').on('click',function(){
            var item= $('#pronameid').val();
            var category= $('#categoryid').val();
            var globalid = item+category;
            
            $('#barcodeid').val(globalid);
            var barcodetxt = $('#barcodeid').val();
            var barcodeImage = '<center><img alt="testing" style="height: 150px; width: 560px;" src="barcode.php?codetype=Code39&size=100&text=' + barcodetxt + '&print=true"/></center>';
            $('#barcodeimg').html(barcodeImage);
               });
             
    </script>

    <script>
          
          function PrintImg(){
            var prtContent = document.getElementById("barcodeimg");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
          }  

    </script>
  </body>

  </html>
  <?php

if (isset($_POST['addcat'])) {
  $catname = $_POST['catname'];
  $insert = mysqli_query($conn,"insert into `category`(`category_name`) values('$catname')");
  
  if($insert){
   echo "<script>alert('Category added')</script>";
   echo "<script>window.open('insertProduct.php','_self')</script>";
  }

  else{
    echo "<script>alert('Product not added')</script>";

  }
}

if(isset($_POST['genbarcode'])){
  
  $proname = $_POST['proname'];
  $mrp = $_POST['mrp'];
  $buyprice = $_POST['buyprice'];
  $cat = $_POST['category'];
  $units = $_POST['units'];
  $vendor = $_POST['vendor'];

  $length = 12; 
  $randomNumber = '';
  for ($i = 0; $i < $length; $i++) {
      $randomNumber .= mt_rand(0, 9); 
  }

  $barcode = $randomNumber;

  date_default_timezone_set('Asia/Kolkata'); 
  $currentDateTime = date('Y-m-d H:i:s'); 

  $insert = mysqli_query($conn,"insert into `product`(`name`,`price`,`buy_price`,`unit`,`category`,`bar_code`,`created`) values('$proname','$mrp','$buyprice','$units','$cat','$barcode','$currentDateTime')");
  $insto = mysqli_query($conn, "INSERT INTO `stock`(`item`, `quantity`, `vendor`, `price`, `date`) VALUES ('$proname','$units','$vendor','$buyprice','$currentDateTime')");

  if($insert){
   echo "<script>alert('Product added')</script>";
  }

  else{
    echo "<script>alert('Product not added')</script>";

  }
  if($insto){
   echo "<script>alert('Stock added')</script>";
  }

  else{
    echo "<script>alert('Stock not added')</script>";

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