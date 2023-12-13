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
        <!-- to be removed -->

        <!-- partial -->

        <!-- partial:partials/_sidebar.php -->

        <?php  include './nav.php' ?>

        <!-- partial -->

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 stretch-card grid-margin">
                <div
                  class="card" style = "height: auto;"
                >
                  <div class="card-body">

                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Payment To</th>
                          <th>Delete</th>
                         
                        </tr>
                      </thead>
                      <tbody id="showdata">
                          
                      <?php  
                      
                      $query = mysqli_query($conn, "SELECT * FROM payment");
                      while ($row = mysqli_fetch_array($query)) {
                        $id = $row['id'];
                        $payto = $row['mode'];
                      ?>

                        <tr id="<?php echo $id; ?>">
                          <td><?= $id ?></td>
                          <td data-target="newmode"><?= $payto ?></td>
                          <td><form method="POST"><button type="submit" name="del" value="<?= $id ?>" class="btn btn-danger">Delete</button></form></td>
                          
                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>

            <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

            <div class="modal fade" id="modemodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Payement options</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">New Mode: </label>
            <input type="text" name="newmode" id="newmode" class="form-control">
          </div>
          <input type="hidden" name="prodId" id="prodId">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a href="#" id="savemode" class="btn btn-default">Update</a>
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
    
    <script>

      // search
      $(document).ready(function(){
   $('#getName').on("keyup", function(){
     var getName = $(this).val();
     $.ajax({
       method:'POST',
       url:'searchajax.php',
       data:{name:getName},
       success:function(response)
       {
            $("#showdata").html(response);
       } 
     });
   });
  });

      var temp;
    $(document).ready(function() {
        $(document).on('click', 'a[data-role=update]', function() {
            var id = $(this).data('id')
            // $('#addunits').val(addunits);
            var prevmode = $('#'+id).children('td[data-target=newmode]').text();

            $('#newmode').val();
            $('#prodId').val(id);
            $('#modemodal').modal('toggle')
        });

        $('#savemode').click(function() {
            var id = $('#prodId').val();
            var newmode = $('#newmode').val();
            
            $.ajax({
                url: 'newmodeup.php',
                method: 'post',
                data: { id: id, newmode: newmode},
                success: function(response) {
                    $('#'+id).children('td[data-target=newmode]').text((newmode));
                    $('#newmode').val("");
                    $('#modemodal').modal('toggle')
                } 
            });
});


    });
    
</script>

  </body>
</html>


<?php


if (isset($_POST['del'])) {
    $deleteId = mysqli_real_escape_string($conn, $_POST['del']);
    echo 'Delete ID: ' . htmlspecialchars($deleteId) . '<br>';
    $deleteQuery = "DELETE FROM payment WHERE id = $deleteId";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {
        echo "<script>window.open('./addpaymentmodes.php','_self')</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
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