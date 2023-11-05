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
                <div class="card" style="width: 100%">
                  <div class="card-body">
                  <form method="post" action="process_data.php">
                    <div class="form-group">
                        <label for="customer_name">Customer Name:</label>
                        <input type="text" class="form-control" name="customer_name" required>
                    </div>
            <div class="form-group">
                <label for="invoice_date">Invoice Date:</label>
                <input type="date" class="form-control" name="invoice_date" id="invoice_date" required>
                <script>
                    // Function to format the current date as "YYYY-MM-DD"
                    function getCurrentDate() {
                        const today = new Date();
                        const year = today.getFullYear();
                        const month = String(today.getMonth() + 1).padStart(2, '0');
                        const day = String(today.getDate()).padStart(2, '0');
                        return `${year}-${month}-${day}`;
                    }

                    // Set the default value for the "Invoice Date" input
                    document.getElementById('invoice_date').value = getCurrentDate();
                </script>
            </div>

            <div class="form-group">
                <label for="selectSales">Sales Person</label>
                <select class="form-control" id="selectSales" name="selectSales">
                    <?php
                      $sales_query = mysqli_query($conn, "select * from sales_person");
                      while ($row = mysqli_fetch_array($sales_query)) {
                        $name = $row['name'];
                        ?>

                        <option>
                          <?= $name ?>
                        </option>

                      <?php } ?>
                  </select>
            </div>
            
            <div class="form-group">
                <label for="paymentType">Payment</label>
                <select class="form-control" id="paymentType" name="paymentType">
                          <?php
                            $sales_query = mysqli_query($conn, "select * from payment");
                            while ($row = mysqli_fetch_array($sales_query)) {
                              $mode = $row['mode'];
                              $id = $row['id'];
                              ?>

                              <option value="<?php echo $id ?>">
                                <?= $mode ?>
                              </option>

                            <?php } ?>
                          </select>

                          <input
                            type="hidden"
                            class="form-control"
                            id="mode"
                            name="mode"
                            readonly
                            required
                          />
            </div>

            <table class="table table-bordered" id="product_table">
        
            <tr>
                <th>Barcode</th>
                <th>Product</th>
                <th>selling_price</th>
                <th>Available unit</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="barcode[]" class="barcode">
                </td>
                <td>
                    <select name="products[]" class="product">
                    <?php
                        // Your database connection details
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "gati";

                        // Create a connection
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Fetch products from the 'products' table
                        $stmt = $conn->query("SELECT id, name FROM product");

                        // Display product options in the select element
                        while ($row = $stmt->fetch()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input readonly type="text" name="selling_price[]" class="selling_price">
                </td>
                <td>
                    <input readonly type="text" name="availunits[]" class="avail_units">
                </td>
                <td>
                    <input type="number" name="quantities[]" class="quantity" min="1">
                </td>
                <td>
                    <input readonly type="text" name="total_price[]" class="total_price">
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="deleteProductRow(this)">Delete</button>
                </td>
            </tr>

            
            <tr id="total_row">
                <td colspan="5"><strong>Total</strong></td>
                <td><input readonly type="text" id="grand_total" name="grand_total" class="grand_total" value="0"></td>
            </tr>

            <tr id="disc_row">
                <td colspan="5"><strong>Discounted Price</strong></td>
                <td><input type="text" id="disc" name="disc" class="disc"></td>
            </tr>
           
            </table>

            <button type="button" style="margin-top: 30px" class="btn btn-primary" onclick="addProductRow()">Add Product</button><br><br>

            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Generate Invoice">
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

    <script>

$(document).ready(function(){
      $("#paymentType").change(function(){
        var id = $(this).find(":selected").val();
        var dataString = 'id='+id;
        $.ajax({
          url: "getPayments.php",
          dataType: "json",
          data: dataString,
          cache: false,
          success: function(payData){
            if (payData) {
              $('#mode').val(payData.alice);
            }
          }
        })
      })
     })


       $(document).ready(function() {
    $('#product_table').on('change', '.barcode', function() {
        var barcode = $(this).val();
        var $row = $(this).closest('tr');

        $.ajax({
            type: 'GET',
            url: 'fetch_product_data.php',
            data: { barcode: barcode },
            success: function(data) {
                var productData = JSON.parse(data);
                $row.find('.selling_price').val(productData.selling_price);
                $row.find('.avail_units').val(productData.avail_units);
                
                var productSelect = $row.find('select[name="products[]"]');
                if (productData.product_name) {
                    productSelect.find('option').each(function() {
                        if ($(this).text() === productData.product_name) {
                            $(this).prop('selected', true);
                            productSelect.val(productData.product_id);
                        }
                    });
                }
                calculateTotalPrice($row);
            },
            error: function() {
                alert('Failed to fetch product data.');
            }
        });
    });

    $('#product_table').on('change', '.quantity', function() {
        calculateTotalPrice($(this).closest('tr'));
    });
});


        function calculateTotalPrice($row) {
            var quantity = parseFloat($row.find('.quantity').val());
            var price = parseFloat($row.find('.selling_price').val()); // Use selling_price if available
            if (!isNaN(quantity) && !isNaN(price)) {
                $row.find('.total_price').val(parseInt(quantity * price));
            }

            var total = 0;
            $('.total_price').each(function() {
                total += parseInt($(this).val()) || 0;
            });
            $('#grand_total').val(total);
                
        }

        function deleteProductRow(btn) {
            var row = btn.parentNode.parentNode;
            var priceToDelete = parseInt(row.querySelector('.total_price').value) || 0;

            row.parentNode.removeChild(row);

            // Recalculate the total after deleting the row
            var total = 0;
            var totalPrices = document.querySelectorAll('.total_price');
            totalPrices.forEach(function(price) {
                total += parseInt(price.value) || 0;
            });

            // Subtract the deleted row's price from the total
            total -= priceToDelete;

            document.getElementById('grand_total').value = total;
        }



        function addProductRow() {
            fetch('get_products.php')
                .then(response => response.json())
                .then(data => {
                    let productOptions = '';
                    data.forEach(product => {
                        productOptions += `<option value="${product.id}">${product.name}</option>`;
                    });

                    var table = document.getElementById("product_table");
                    var row = table.insertRow(-1);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);
                    var cell4 = row.insertCell(3);
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                    var cell7 = row.insertCell(6);

                    cell1.innerHTML = '<input type="text" name="barcode[]" class="barcode">';
                    cell2.innerHTML = `<select name="products[]" class="product">${productOptions}</select>`;
                    cell3.innerHTML = '<input readonly type="text" name="selling_price[]" class="selling_price">';
                    cell4.innerHTML = '<input readonly type="text" name="availunits[]" class="avail_units">';
                    cell5.innerHTML = '<input type="number" name="quantities[]" class="quantity" min="1">';
                    cell6.innerHTML = '<input readonly type="text" name="total_price[]" class="total_price">';
                    cell7.innerHTML = '<button type="button" onclick="deleteProductRow(this)" class="btn btn-danger">Delete</button>';

                    var table = document.getElementById("product_table");
                    var totalRow = document.getElementById("total_row");
                    var discRow = document.getElementById("disc_row");
                    if (totalRow) {
                        table.appendChild(totalRow); 
                        table.appendChild(discRow); 
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>

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