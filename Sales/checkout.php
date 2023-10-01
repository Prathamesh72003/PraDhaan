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

    <title>Product Checkout</title>

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
          <a class="navbar-brand brand-logo mr-5" href="././sales_dash.php"
            ><img src="../images/logo.svg" class="mr-2" alt="logo"
          /></a>

          <a class="navbar-brand brand-logo-mini" href="././sales_dash.php"
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

        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="././sales_dash.php">
                <i class="icon-grid menu-icon"></i>

                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./Checkout.php">
                <i class="material-icons">shopping_cart</i>

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
              <div class="col-md-7 grid-margin stretch-card">
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
                      <h4 class="card-title">Checkout For An Item</h4>
                    </div>

                    <p class="card-description"></p>

                    <form
                      class="forms-sample"
                      method="POST"
                    >
                      <hr />
                      <div class="form-group row">
                        <label
                          for="customerName"
                          class="col-sm-3 col-form-label"
                          >Customer Name</label
                        >

                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            id="customerName"
                            name="customerName"
                            placeholder="Enter the name"
                            required
                          />
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="customerContact"
                          class="col-sm-3 col-form-label"
                          >Customer Contact</label
                        >

                        <div class="col-sm-9">
                          <input
                            type="text"
                            class="form-control"
                            id="customerContact"
                            name="customerContact"
                            placeholder="Enter the Mobile Number"
                            required
                          />
                        </div>
                      </div>

                      <div class="form-group row">
                        <label
                          for="selectSales"
                          class="col-sm-3 col-form-label"
                          >Salesperson Name</label
                        >

                        <div class="col-sm-9">
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
                      </div>

                      <hr />

                      <table id="app">
                  <thead>
                    <th>Barcode</th>
                    <th>Name</th>
                    <th>Alias</th>
                    <th>MRP</th>
                    <th>Quantity</th>
                    <th>Available Quantity</th>
                    <th>Sale Price</th>
                  </thead>
                  <tbody>
                  <tr id="1">
                    <td>
                      <input type="text" id="bar_code_1" class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,1)" name="bar_code[]" />
                    </td>
                    <td>
                      <select name="name[]" id="name_1" class="form-control" onchange="get_detail_name(this.value,1)">
                        <option value="">Choose Product</option>
                        <?php $sqlP = $conn->query("SELECT * FROM product WHERE status = 1 ORDER BY name ASC");
                        while($rowP = $sqlP->fetch_array()){?>
                        <option value="<?php echo $rowP['name']?>"><?php echo $rowP['name'];?></option>
                        <?php }?>
                      </select>
                    </td>
                    <td>
                      <input type="text" id="alias_1" class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,1)" name="alias[]" />
                    </td>
                    <td>
                      <input type="text" class="form-control" readonly id="mrp_1" name="mrp[]" />
                    </td>
                    <td>  
                      <input type="number" class="form-control" onkeyup="calculate_price(this.value,1)" step="0.001" id="quantity_1" name="quantity[]" />
                    </td>
                    <td>
                      <input type="text" readonly class="form-control" id="av_quantity_1" name="av_quantity[]" />
                    </td>
                    <td>
                      <input type="number" class="form-control" onkeyup="get_quantity(this.value,1)" step="0.01" id="sale_price_1" name="sale_price[]" />
                      <input type="hidden" class="form-control" id="sale_price_org_1" name="sale_price_org[]" />
                      <input type="hidden" class="form-control" id="igst_1" name="igst[]" />
                    </td>
                  </tr>
                  </tbody>
                </table>


                      <hr />

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
                        <button type="button" id="add" class="btn btn-primary mr-2">
                          ADD ITEM
                        </button>
                      </div>
                    <!-- </form> -->
                  </div>
                </div>
              </div>
              <div class="col-md-5  mt-4" style="background-color:#fff;">
               <!-- <form method="POST"> -->
               <div class="p-4">
                  <div class="text-center">
                     <h4>Receipt</h4>
                  </div>
                  <span class="mt-4"> Time : </span><span  class="mt-4" id="time"></span>
                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <span id="day"></span> : <span id="year"></span>
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <p>Order No:</p>
                     </div>
                  </div>
                  <div class="row">
                     </span>
                     <table id="receipt_bill" class="table">
                        <thead>
                           <tr>
                              <th> No.</th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th class="text-center">Price</th>
                              <th class="text-center">Total</th>
                           </tr>
                        </thead>
                        <tbody id="new" >
                         
                        </tbody>
                        
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark">
                              <h5><strong>Gross Total: ₹ </strong></h5>
                           </td>
                           <td class="text-center text-danger">
                              <h5 id="totalPayment"><strong> </strong></h5>
                              <input type="hidden" name="totalPaymentInput" id="totalPaymentInput" display>
                              
                           </td>
                        </tr>
                     </table>
                  </div>
                  <div style="width=100%; display: flex; justify-content: center; align-item: center;">

                        <button type="submit" name="checkoutbtn" class="btn btn-primary mr-2">Print Receipt And Checkout</button>

                     </div>
               </div>

               </form>
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

  // THIS DA CODE FOR BARCODE SCANNING

  function RestrictSpace() {
    if (event.keyCode == 32) {
        return false;
    }
}

function default_focus(){
    document.getElementById('bar_code_1').focus();
}

function get_detail(b,n){
    var nx = n+1;
    
    $.ajax({  
        type:"POST",  
        url:"ajax_product.php",  
        data:{bar_code:b,action_type:"get_detail"},
        success:function(data){
            var data = $.parseJSON(data);
            if(data.type == 'Success'){
                
                //Check Duplicate Value
                var barCode = document.querySelectorAll("#dd input[name='bar_code[]']");
                for(key=0; key < barCode.length - 1; key++)  {
                    if(barCode[key].value == data.bar_code){
                        alert("Already Exist");
                        document.getElementById('bar_code_'+n).value = '';
                        document.getElementById('bar_code_'+n).focus();
                        return false;
                    }                   
                }
                
                var newRow = $('#app tbody').append('<tr id='+nx+'><td><input type="text"  class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" required /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+')" required ><option value="">Choose Product</option><?php $sqlP = $conn->query("SELECT * FROM product WHERE status = 1 ORDER BY name ASC"); while($rowP = $sqlP->fetch_array()){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" id="alias_'+nx+'" class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,'+nx+')" name="alias[]" /></td><td><input type="text"  id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="number" id="quantity_'+nx+'" step="0.001" class="form-control" onkeyup="calculate_price(this.value,'+nx+')" name="quantity[]" required /></td><td><input type="text" id="av_quantity_'+nx+'" readonly class="form-control" name="av_quantity[]" /></td><td><input type="number" id="sale_price_'+nx+'"  class="form-control" onkeyup="get_quantity(this.value,'+nx+')" name="sale_price[]" step="0.01" required /><input type="hidden" class="form_control" id="sale_price_org_'+nx+'" name="sale_price_org[]" /><input type="hidden" class="form-control" id="igst_'+nx+'" name="igst[]" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove">Delete</a></td></tr>');
                document.getElementById('name_'+n).value = data.name;
                document.getElementById('alias_'+n).value = data.alias;
                document.getElementById('mrp_'+n).value = data.sale_price;
                document.getElementById('quantity_'+n).value = 1;
                document.getElementById('av_quantity_'+n).value = data.av_quantity;
                document.getElementById('sale_price_'+n).value = data.sale_price;
                document.getElementById('sale_price_org_'+n).value = data.sale_price;
                document.getElementById('igst_'+n).value = data.igst;
                
                //Get

				
				//Get Value For Total
				var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
				var newA = [];
				for(key=0; key < salePrice.length; key++)  {
					if(salePrice[key].value != ''){
						newA.push(parseFloat(salePrice[key].value));
					}
				}
				var aac = newA.reduce(getSum);
				document.getElementById('getTotal').value = Math.round(parseFloat(aac));
				
				document.getElementById('bar_code_'+nx).focus();
			}else{
				alert("Barcode Not Found");
				document.getElementById('bar_code_'+n).value = '';
				document.getElementById('bar_code_'+n).focus();
				return false;
			}
		}  
	});
}

function get_detail_name(i,n){
	var nx = n+1;
	
	$.ajax({  
		type:"POST",  
		url:"ajax_product.php",  
		data:{name:i,action_type:"get_detail_by_name"},
		success:function(data){ 
			var data = $.parseJSON(data);
			if(data.type == 'Success'){
				
				//Check Duplicate Value
				var barCode = document.querySelectorAll("#dd input[name='bar_code[]']");
				for(key=0; key < barCode.length - 1; key++)  {
					if(barCode[key].value == data.bar_code){
						alert("Already Exist");
						return false;
					}					
				}
								
				//Appending New Row
				var newRow = $('#app tbody').append('<tr id='+nx+'><td><input type="text"  class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" required /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+')" required ><option value="">Choose Product</option><?php $sqlP = $conn->query("SELECT * FROM product WHERE status = 1 ORDER BY name ASC"); while($rowP = $sqlP->fetch_array()){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" id="alias_'+nx+'" class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,'+nx+')" name="alias[]" /></td><td><input type="text"  id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="number" id="quantity_'+nx+'" step="0.001" class="form-control" onkeyup="calculate_price(this.value,'+nx+')" name="quantity[]" required /></td><td><input type="text" id="av_quantity_'+nx+'" readonly class="form-control" name="av_quantity[]" /></td><td><input type="number" id="sale_price_'+nx+'" onkeyup="get_quantity(this.value,'+nx+')"  class="form-control" name="sale_price[]" step="0.01" required /><input type="hidden" class="form-control" id="sale_price_org_'+nx+'" name="sale_price_org[]" /><input type="hidden" class="form-control" id="igst_'+nx+'" name="igst[]" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove">Delete</a></td></tr>');
				document.getElementById('bar_code_'+n).value = data.bar_code;
				document.getElementById('alias_'+n).value = data.alias;
				document.getElementById('mrp_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).value = 1;
				document.getElementById('av_quantity_'+n).value = data.av_quantity;
				document.getElementById('sale_price_'+n).value = data.sale_price;
				document.getElementById('sale_price_org_'+n).value = data.sale_price;
				document.getElementById('igst_'+n).value = data.igst;
				
				//Get Value For Total
				var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
				var newA = [];
				for(key=0; key < salePrice.length; key++)  {
					if(salePrice[key].value != ''){
						newA.push(parseFloat(salePrice[key].value));
					}
				}
				var aac = newA.reduce(getSum);
				document.getElementById('getTotal').value = Math.round(parseFloat(aac));
				
				document.getElementById('name_'+nx).focus();
			}else{
				alert("Prduct Not Found!");
			}
		}  
	});
}

function get_detail_alias(a,n){
	var nx = n+1;
	
	$.ajax({  
		type:"POST",  
		url:"ajax_product.php",  
		data:{alias:a,action_type:"get_detail_by_alias"},
		success:function(data){
			
			var data = $.parseJSON(data);
			if(data.type == 'Success'){
				
				//Check Duplicate Value
				var aliasA = document.querySelectorAll("#dd input[name='alias[]']");
				for(key=0; key < aliasA.length - 1; key++)  {
					if(aliasA[key].value == data.alias){
						alert("Alias Exist");
						document.getElementById('alias_'+n).value = '';
						document.getElementById('alias_'+n).focus();
						return false;
					}					
				}
				
				var newRow = $('#app tbody').append('<tr id='+nx+'><td><input type="text"  class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" required /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+')" required ><option value="">Choose Product</option><?php $sqlP = $conn->query("SELECT * FROM product WHERE status = 1 ORDER BY name ASC"); while($rowP = $sqlP->fetch_array()){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" id="alias_'+nx+'" class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,'+nx+')" name="alias[]" /></td><td><input type="text"  id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="number" id="quantity_'+nx+'" step="0.001" class="form-control" onkeyup="calculate_price(this.value,'+nx+')" name="quantity[]" required /></td><td><input type="text" id="av_quantity_'+nx+'" readonly class="form-control" name="av_quantity[]" /></td><td><input type="number" id="sale_price_'+nx+'"  class="form-control" onkeyup="get_quantity(this.value,'+nx+')" name="sale_price[]" step="0.01" required /><input type="hidden" class="form-control" id="sale_price_org_'+nx+'" name="sale_price_org[]" /><input type="hidden" class="form-control" id="igst_'+nx+'" name="igst[]" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove">Delete</a></td></tr>');
				document.getElementById('name_'+n).value = data.name;
				document.getElementById('bar_code_'+n).value = data.bar_code;
				document.getElementById('mrp_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).value = 1;
				document.getElementById('av_quantity_'+n).value = data.av_quantity;
				document.getElementById('sale_price_'+n).value = data.sale_price;
				document.getElementById('sale_price_org_'+n).value = data.sale_price;
				document.getElementById('igst_'+n).value = data.igst;
				
				//Get Value For Total
				var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
				var newA = [];
				for(key=0; key < salePrice.length; key++)  {
					if(salePrice[key].value != ''){
						newA.push(parseFloat(salePrice[key].value));
					}
				}
				var aac = newA.reduce(getSum);
				document.getElementById('getTotal').value = Math.round(parseFloat(aac));
				
				document.getElementById('bar_code_'+nx).focus();
			}else{
				alert("Alias Not Found");
				document.getElementById('alias_'+n).value = '';
				document.getElementById('alias_'+n).focus();
				return false;
			}
		}  
	});
}

function calculate_price(q,n){
	var sale_price_org = document.getElementById('sale_price_org_'+n).value;
	var sp = document.getElementById('sale_price_'+n).value;
	//var total = document.getElementById('getTotal').value;
	var gt = document.getElementById('sale_price_'+n).value = (sale_price_org * q).toFixed(2);
	
	
	var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");

	var newA = [];
	for(key=0; key < salePrice.length ; key++)  {
		if(salePrice[key].value != ''){
			newA.push(parseFloat(salePrice[key].value));
		}
	}
	
	//alert(newA);
	var aac = newA.reduce(getSum);
	document.getElementById('getTotal').value = Math.round(parseFloat(aac));
	//alert(aac);
	//document.getElementById('getTotal').value = Math.round((parseFloat(total) - parseFloat(sp)) + parseFloat(gt));
}

function getSum(total, num) {
  return parseFloat(total + num);
}
function get_quantity(p,n){
	
	var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");

	var newA = [];
	for(key=0; key < salePrice.length; key++)  {
		if(salePrice[key].value != ''){
			newA.push(parseFloat(salePrice[key].value));
		}
	}
	
	//alert(newA);
	var aac = newA.reduce(getSum);
	document.getElementById('getTotal').value = Math.round(parseFloat(aac));
	//alert(aac);
	
	
	var sale_price_org = document.getElementById('sale_price_org_'+n).value;
	var spgF = parseFloat(sale_price_org);
	var sp = document.getElementById('sale_price_'+n).value;
	var spF = parseFloat(sp);
	document.getElementById('quantity_'+n).value = (p/parseFloat(sale_price_org)).toFixed(3);
		
}

function remove_data(r){
	$('#'+r).remove();
	//Get Value For Total
	var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
	var newA = [];
	for(key=0; key < salePrice.length; key++)  {
		if(salePrice[key].value != ''){
			newA.push(parseFloat(salePrice[key].value));
		}
	}
	var aac = newA.reduce(getSum);
	document.getElementById('getTotal').value = Math.round(parseFloat(aac));
	
}



  // BARCODE SCANNING ENDS HERE



  // RECIEPT PART STARTS HERE

   $(document).ready(function(){
     $('#vegitable').change(function() {
      var id = $(this).find(':selected')[0].id;
       $.ajax({
          method:'POST',
          url:'fetch_product.php',
          data:{id:id},
          dataType:'json',
          success:function(data)
            {
               $('#price').text(data.product_price);

               //$('#qty').text(data.product_qty);
            }
       });
     });
   
     //add to cart 
     var count = 1;
     $('#add').on('click',function(){
   
        var name = $('#name_1').val();
        var qty = $('#quantity_1').val();
        var price = $('#mrp_1').val();

        $('#bar_code_1').val('');
        $('#name_1').val('');
        $('#alias_1').val('');
        $('#mrp_1').val('');
        $('#quantity_1').val('');
        $('#av_quantity_1').val('');
        $('#sale_price_1').val('');

        if(qty == 0)
        {
           var erroMsg =  '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
           $('#errorMsg').html(erroMsg).fadeOut(9000);
        }
        else
        {
           billFunction(); // Below Function passing here 
        }
        
        function billFunction()
          {
          var total = 0;
      
          $("#receipt_bill").each(function () {
          var total =  price*qty;
          var subTotal = 0;
          subTotal += parseInt(total);
         
          var table =   '<tr><td>'+ count +'</td><td>'+ name + '</td><td>' + qty + '</td><td>' + price + '</td><td><strong><input type="hidden" id="total" value="'+total+'">' +total+ '</strong></td></tr>';
          $('#new').append(table)

           // Code for Sub Total of Vegitables 
            var total = 0;
            $('tbody tr td:last-child').each(function() {
                var value = parseInt($('#total', this).val());
                if (!isNaN(value)) {
                    total += value;
                }
            });
             $('#subTotal').text(total);
              
              var Tax = (total * 1) / 1;
              $('#taxAmount').text(Tax.toFixed(2));

             // Code for Total Payment Amount

             var Subtotal = $('#subTotal').text();
             var taxAmount = $('#taxAmount').text();

             var totalPayment = parseFloat(Subtotal) + parseFloat(taxAmount);
             $('#totalPayment').text(total.toFixed(2));
             $('#totalPaymentInput').val(total.toFixed(2));
       
         });
         count++;
        } 
       });
           // Code for year 
            
           var currentdate = new Date(); 
             var datetime = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/" 
                + currentdate.getFullYear();
                $('#year').text(datetime);

           // Code for extract Weekday     
                function myFunction()
                 {
                    var d = new Date();
                    var weekday = new Array(7);
                    weekday[0] = "Sunday";
                    weekday[1] = "Monday";
                    weekday[2] = "Tuesday";
                    weekday[3] = "Wednesday";
                    weekday[4] = "Thursday";
                    weekday[5] = "Friday";
                    weekday[6] = "Saturday";

                    var day = weekday[d.getDay()];
                    return day;
                    }
                var day = myFunction();
                $('#day').text(day);
     });
</script>

<!-- // Code for TIME -->
<script>
    window.onload = displayClock();

     function displayClock(){
       var time = new Date().toLocaleTimeString();
       document.getElementById("time").innerHTML = time;
        setTimeout(displayClock, 1000); 
     }
</script>
  </body>
</html>

<?php

 if (isset($_POST['checkoutbtn'])) {

  $customer_name = $_POST['customerName'];
  $contact = $_POST['customerContact'];
  $sales_person_name = $_POST['selectSales'];
  $total_amount = $_POST['totalPaymentInput'];
  date_default_timezone_set('Asia/Kolkata'); 
  $currentDateTime = date('Y-m-d H:i:s'); 

  $sql = "INSERT INTO Invoice (customer_name, contact, sales_person_name, total_amount, datetime)
  VALUES ('$customer_name', '$contact', '$sales_person_name', $total_amount, '$currentDateTime')";

  $usql = "UPDATE sales_person SET items_sold = items_sold + 1 WHERE name = '$sales_person_name'";

  if ($conn->query($sql) === TRUE && $conn->query($usql) === TRUE ) {
    echo "<script>alert('Record inserted successfully.')</script>";  
  } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
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
