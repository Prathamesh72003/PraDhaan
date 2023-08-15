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
              <a
                class="nav-link active"
                id="todo-tab"
                data-toggle="tab"
                href="#todo-section"
                role="tab"
                aria-controls="todo-section"
                aria-expanded="true"
                >TO DO LIST</a
              >
            </li>

            <li class="nav-item">
              <a
                class="nav-link"
                id="chats-tab"
                data-toggle="tab"
                href="#chats-section"
                role="tab"
                aria-controls="chats-section"
                >CHATS</a
              >
            </li>
          </ul>

          <div class="tab-content" id="setting-content">
            <div
              class="tab-pane fade show active scroll-wrapper"
              id="todo-section"
              role="tabpanel"
              aria-labelledby="todo-section"
            >
              <div class="add-items d-flex px-3 mb-0">
                <form class="form w-100">
                  <div class="form-group d-flex">
                    <input
                      type="text"
                      class="form-control todo-list-input"
                      placeholder="Add To-do"
                    />

                    <button
                      type="submit"
                      class="add btn btn-primary todo-list-add-btn"
                      id="add-task"
                    >
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

            <div
              class="tab-pane fade"
              id="chats-section"
              role="tabpanel"
              aria-labelledby="chats-section"
            >
              <div
                class="d-flex align-items-center justify-content-between border-bottom"
              >
                <p
                  class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0"
                >
                  Friends
                </p>

                <small
                  class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal"
                  >See All</small
                >
              </div>
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
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 stretch-card grid-margin">
                <div
                  class="card"
                  style="height: 300px; background-color: #7da0fa"
                >
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
                        Add Stocks
                      </p>
                      <a href="./basic_elements.php"
                        ><button style="background: none; border: none">
                          <i class="material-icons mysize">add_circle</i>
                        </button></a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th class="pl-0 pb-2 border-bottom">Places</th>

                            <th class="border-bottom pb-2">Orders</th>

                            <th class="border-bottom pb-2">Users</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td class="pl-0">Kentucky</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">65</span
                                >(2.15%)
                              </p>
                            </td>

                            <td class="text-muted">65</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Ohio</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">54</span
                                >(3.25%)
                              </p>
                            </td>

                            <td class="text-muted">51</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Nevada</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">22</span
                                >(2.22%)
                              </p>
                            </td>

                            <td class="text-muted">32</td>
                          </tr>

                          <tr>
                            <td class="pl-0">North Carolina</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">46</span
                                >(3.27%)
                              </p>
                            </td>

                            <td class="text-muted">15</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Montana</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">17</span
                                >(1.25%)
                              </p>
                            </td>

                            <td class="text-muted">25</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Nevada</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">52</span
                                >(3.11%)
                              </p>
                            </td>

                            <td class="text-muted">71</td>
                          </tr>

                          <tr>
                            <td class="pl-0 pb-0">Louisiana</td>

                            <td class="pb-0">
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">25</span
                                >(1.32%)
                              </p>
                            </td>

                            <td class="pb-0">14</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th class="pl-0 pb-2 border-bottom">Places</th>

                            <th class="border-bottom pb-2">Orders</th>

                            <th class="border-bottom pb-2">Users</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td class="pl-0">Kentucky</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">65</span
                                >(2.15%)
                              </p>
                            </td>

                            <td class="text-muted">65</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Ohio</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">54</span
                                >(3.25%)
                              </p>
                            </td>

                            <td class="text-muted">51</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Nevada</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">22</span
                                >(2.22%)
                              </p>
                            </td>

                            <td class="text-muted">32</td>
                          </tr>

                          <tr>
                            <td class="pl-0">North Carolina</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">46</span
                                >(3.27%)
                              </p>
                            </td>

                            <td class="text-muted">15</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Montana</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">17</span
                                >(1.25%)
                              </p>
                            </td>

                            <td class="text-muted">25</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Nevada</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">52</span
                                >(3.11%)
                              </p>
                            </td>

                            <td class="text-muted">71</td>
                          </tr>

                          <tr>
                            <td class="pl-0 pb-0">Louisiana</td>

                            <td class="pb-0">
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">25</span
                                >(1.32%)
                              </p>
                            </td>

                            <td class="pb-0">14</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th class="pl-0 pb-2 border-bottom">Places</th>

                            <th class="border-bottom pb-2">Orders</th>

                            <th class="border-bottom pb-2">Users</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td class="pl-0">Kentucky</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">65</span
                                >(2.15%)
                              </p>
                            </td>

                            <td class="text-muted">65</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Ohio</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">54</span
                                >(3.25%)
                              </p>
                            </td>

                            <td class="text-muted">51</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Nevada</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">22</span
                                >(2.22%)
                              </p>
                            </td>

                            <td class="text-muted">32</td>
                          </tr>

                          <tr>
                            <td class="pl-0">North Carolina</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">46</span
                                >(3.27%)
                              </p>
                            </td>

                            <td class="text-muted">15</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Montana</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">17</span
                                >(1.25%)
                              </p>
                            </td>

                            <td class="text-muted">25</td>
                          </tr>

                          <tr>
                            <td class="pl-0">Nevada</td>

                            <td>
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">52</span
                                >(3.11%)
                              </p>
                            </td>

                            <td class="text-muted">71</td>
                          </tr>

                          <tr>
                            <td class="pl-0 pb-0">Louisiana</td>

                            <td class="pb-0">
                              <p class="mb-0">
                                <span class="font-weight-bold mr-2">25</span
                                >(1.32%)
                              </p>
                            </td>

                            <td class="pb-0">14</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div style="width: 100%; text-align: right">
              <a
                ><Text
                  style="
                    color: rgb(70, 20, 189);
                    cursor: pointer;
                    padding: 10px;
                  "
                  >View All</Text
                ></a
              >
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
