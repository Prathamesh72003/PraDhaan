<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Project</title>
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../vendors/feather/feather.css" />
    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css" />
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
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css" />
    <link rel="shortcut icon" href="../images/favicon.png" />
  </head>

  <body>
    <div class="container-scroller">
      <!-- NAVBAR STARTS -->

      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div
          class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
        >
          <a class="navbar-brand brand-logo mr-5" href="./admin_dash.php"
            ><img src="../images/logo.svg" class="mr-2" alt="logo"
          /></a>
          <a class="navbar-brand brand-logo-mini" href="./admin_dash.php"
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

      <!-- NAVBAR ENDS -->

      <!-- PAGE STARTS -->

      <div class="container-fluid page-body-wrapper">
        <!-- LEFT SIDE PANEL STARTS-->

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="./admin_dash.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
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

        <!-- LEFT SIDE PANEL ENDS-->

        <!-- DETAILS CONTAINER -->

        <div class="main-panel">
          <div class="content-wrapper">
            <!-- DETAILS TOP SECTION CARD START-->

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                  <div class="card-body">
                    <div
                      id="detailedReports"
                      class="carousel slide detailed-report-carousel position-static pt-2"
                      data-ride="carousel"
                    >
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <div class="row">
                            <div
                              class="col-md-12 col-xl-3 d-flex flex-column justify-content-start"
                            >
                              <div class="ml-xl-4 mt-3">
                                <p class="card-title">Todays Transactions</p>
                                <h1 class="text-primary">Rs. 5,00,000</h1>
                                <h3
                                  class="font-weight-500 mb-xl-4 text-primary"
                                >
                                  Ongoing: August, 2023
                                </h3>
                                <!-- <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> -->
                              </div>
                            </div>
                            <div class="col-md-12 col-xl-9">
                              <div class="row">
                                <div class="col-md-6 border-right">
                                  <div
                                    class="table-responsive mb-3 mb-md-0 mt-3"
                                  >
                                    <table
                                      class="table table-borderless report-table"
                                    >
                                      <tr>
                                        <td class="text-muted">PROFIT</td>
                                        <td class="w-100 px-0">
                                          <div
                                            class="progress progress-md mx-4"
                                          >
                                            <div
                                              class="progress-bar bg-primary"
                                              role="progressbar"
                                              style="width: 70%"
                                              aria-valuenow="70"
                                              aria-valuemin="0"
                                              aria-valuemax="100"
                                            ></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">
                                            713
                                          </h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">IN DRAWERS</td>
                                        <td class="w-100 px-0">
                                          <div
                                            class="progress progress-md mx-4"
                                          >
                                            <div
                                              class="progress-bar bg-danger"
                                              role="progressbar"
                                              style="width: 30%"
                                              aria-valuenow="30"
                                              aria-valuemin="0"
                                              aria-valuemax="100"
                                            ></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">
                                            583
                                          </h5>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td class="text-muted">OUT DRAWERS</td>
                                        <td class="w-100 px-0">
                                          <div
                                            class="progress progress-md mx-4"
                                          >
                                            <div
                                              class="progress-bar bg-warning"
                                              role="progressbar"
                                              style="width: 95%"
                                              aria-valuenow="95"
                                              aria-valuemin="0"
                                              aria-valuemax="100"
                                            ></div>
                                          </div>
                                        </td>
                                        <td>
                                          <h5 class="font-weight-bold mb-0">
                                            924
                                          </h5>
                                        </td>
                                      </tr>
                                    </table>
                                  </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                  <canvas id="north-america-chart"></canvas>
                                  <div id="north-america-legend"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- DETAILS TOP SECTION CARD ENDS-->

            <!-- DETAILS BOTTOM SECTION CARD START-->

            <div class="row">
              <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <p class="card-title mb-0">TRANSACTION HISTORY</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-borderless">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Product Item 1</td>
                            <td class="font-weight-bold">Rs. 362</td>
                            <td>21 Sep 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-success">ICOMING</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Product Item 2</td>
                            <td class="font-weight-bold">Rs. 116</td>
                            <td>13 Jun 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-success">INCOMING</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Product Item 3</td>
                            <td class="font-weight-bold">Rs. 551</td>
                            <td>28 Sep 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-danger">OUTGOING</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Product Item 4</td>
                            <td class="font-weight-bold">Rs. 523</td>
                            <td>30 Jun 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-danger">OUTGOING</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Product Item 5</td>
                            <td class="font-weight-bold">Rs. 781</td>
                            <td>01 Nov 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-danger">Cancelled</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Product Item 6</td>
                            <td class="font-weight-bold">Rs. 283</td>
                            <td>20 Mar 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-danger">OUTGOING</div>
                            </td>
                          </tr>
                          <tr>
                            <td>Product Item 7</td>
                            <td class="font-weight-bold">Rs. 897</td>
                            <td>26 Oct 2018</td>
                            <td class="font-weight-medium">
                              <div class="badge badge-success">INCOMING</div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <!-- TODO LIST -->
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">To Do Lists</h4>
                    <div class="list-wrapper pt-2">
                      <ul
                        class="d-flex flex-column-reverse todo-list todo-list-custom"
                      >
                        <li>
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" />
                              Meeting with Urban Team
                            </label>
                          </div>
                          <i class="remove ti-close"></i>
                        </li>
                        <li class="INCOMING">
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked />
                              Duplicate a project for new customer
                            </label>
                          </div>
                          <i class="remove ti-close"></i>
                        </li>
                        <li>
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" />
                              Project meeting with CEO
                            </label>
                          </div>
                          <i class="remove ti-close"></i>
                        </li>
                        <li class="INCOMING">
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked />
                              Follow up of team zilla
                            </label>
                          </div>
                          <i class="remove ti-close"></i>
                        </li>
                        <li>
                          <div class="form-check form-check-flat">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" />
                              Level up for Antony
                            </label>
                          </div>
                          <i class="remove ti-close"></i>
                        </li>
                      </ul>
                    </div>
                    <div class="add-items d-flex mb-0 mt-2">
                      <input
                        type="text"
                        class="form-control todo-list-input"
                        placeholder="Add new task"
                      />
                      <button
                        class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"
                      >
                        <i class="icon-circle-plus"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- DETAILS BOTTOM SECTION CARD ENDS-->
          </div>
        </div>
      </div>
    </div>

    <script src="../vendors/js/vendor.bundle.base.js"></script>
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
