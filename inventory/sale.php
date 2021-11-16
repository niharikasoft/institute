
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- All header links are here -->
  <?php include "header_link.php"?>
<link rel="stylesheet" href="../dist/css/bootstrap-select.css">

  <style type="text/css">
    .note-editable{
      height: 173.438px;
    }
  </style>
</head>-->
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Navbar -->
    <?php include "include/header.php"
	?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <?php include "include/sidebar.php"?>
    <?php include "include/dbconfig.php";
	
	function getProducts()
	{
		include "include/dbconfig.php";
		$sql = "SELECT * FROM `product`";
        $res = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($res))
		  {
			$option.='<option value="'.$row['id'].'">'.$row['name'].'</option>';
		  }
		echo $option;
	}
	
	function getBuyer()
	{
		include "include/dbconfig.php";
		$sql = "SELECT * FROM `party`";
        $res = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($res))
		  {
			$option.='<option value="'.$row['id'].'">'.$row['name'].'</option>';
		  }
		echo $option;
	}
	
	
	
	?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark"></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Invoice</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- form -->
        <div class="col-md-12">
            <!-- general form elements disabled -->
            <form role="form" id="task_create" enctype="multipart/form-data">
              <input type="hidden" name="accting_yr_id" value="<?php echo $_SESSION['accting_yr_id']?>" id="accting_yr_id">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">New Invoice</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
			  <div class="row">
                    <div class="col-sm-12"> <div class="success-messages"></div></div>
                    <div class="col-sm-3">
                      <div class="form-group">
                       <label>Buyer Name</label>
                        <select id="buyerName" name="buyerName" class="form-control" >
                        <option value="">-- Select -- </option> 
						<?php getBuyer();?>
                        </select>
                      </div>
                      </div>                    
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Invoice Date</label>
                        <input type="date" class="form-control" id="invoiceDate" name="invoiceDate" value="<?php echo date('Y-m-d');?>">                        
                      </div>
                    </div>
        			<div class="col-sm-3">
                              <div class="form-group">
                                <label>Place of Supply</label>
                                 <select id="address"  name="address" class="form-control required">
                      								<option value="">-Select-</option>
                      								<option value="35-Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                      								<option value="28-Andhra Pradesh">Andhra Pradesh</option>
                      								<option value="37-Andhra Pradesh (New)">Andhra Pradesh (New)</option>
                      								<option value="12-Arunachal Pradesh">Arunachal Pradesh</option>
                      								<option value="18-Assam">Assam</option>
                      								<option value="10-Bihar">Bihar</option>
                      								<option value="04-Chandigarh">Chandigarh</option>
                      								<option value="22-Chattisgarh">Chattisgarh</option>
                      								<option value="26-Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                      								<option value="25-Daman and Diu">Daman and Diu</option>
                      								<option value="07-Delhi">Delhi</option>
                      								<option value="30-Goa">Goa</option>
                      								<option value="24-Gujarat">Gujarat</option>
                      								<option value="06-Haryana">Haryana</option>
                      								<option value="02-Himachal Pradesh">Himachal Pradesh</option>
                      								<option value="01-Jammu and Kashmir">Jammu and Kashmir</option>
                      								<option value="20-Jharkhand">Jharkhand</option>
                      								<option value="29-Karnataka">Karnataka</option>
                      								<option value="32-Kerala">Kerala</option>
                      								<option value="31-Lakshadweep Islands">Lakshadweep Islands</option>
                      								<option value="23-Madhya Pradesh">Madhya Pradesh</option>
                      								<option value="27-Maharashtra">Maharashtra</option>
                      								<option value="14-Manipur">Manipur</option>
                      								<option value="17-Meghalaya">Meghalaya</option>
                      								<option value="15-Mizoram">Mizoram</option>
                      								<option value="13-Nagaland">Nagaland</option>
                      								<option value="21-Odisha">Odisha</option>
                      								<option value="34-Pondicherry">Pondicherry</option>
                      								<option value="03-Punjab">Punjab</option>
                      								<option value="08-Rajasthan">Rajasthan</option>
                      								<option value="11-Sikkim">Sikkim</option>
                      								<option value="33-Tamil Nadu">Tamil Nadu</option>
                      								<option value="36-Telangana">Telangana</option>
                      								<option value="16-Tripura">Tripura</option>
                      								<option value="09-Uttar Pradesh">Uttar Pradesh</option>
                      								<option value="05-Uttarakhand">Uttarakhand</option>
                      								<option value="19-West Bengal">West Bengal</option>
                						  </select>
                						</div>
                    </div>
					<div class="col-sm-3">
						<label>Account</label>
                                 <select id="acc_name"  name="acc_name" class="form-control required">
									<option value="">-- Select --</option>
                      			  </select>
					</div>
                    
                  </div>				            
				 <button type="button" class="btn btn-default" id="addRowBtn" onclick="addRow()"><i class="fa fa-plus"></i> Add New</button><br/>
      				<table class="table" id="productTable">
        				<thead>
        					<th width="25%">Product Name</th>
							<th width="15%">Qnty</th>
        					<th width="10%">Unit</th>
        					<th>Rate</th>
        					
        					<th width="10%">Piece</th>
        					<!--<th>Discount</th>-->
        					<th width="8%">GST</th>
        					<th>Total</th>
        					<th></th>
        				</thead>
      				<tbody>
					<!--data-live-search="true" data-live-search-placeholder="Search"-->
      				<?php
      			  		$arrayNumber = 0;
      			  		for($x = 1; $x < 6; $x++) { ?>
      					<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">
      						<td align="center">
      							<select id="productName<?php echo $x; ?>" name="productName[]" onblur="checkStock(<?php echo $x; ?>)" onchange="fetchSelectedProduct(<?php echo $x; ?>)" class="form-control" required>
      								<option value="">-- Select -- </option>
      								<?php getProducts();?>
      							</select>
								<input type="hidden" id="stock<?php echo $x; ?>" name="stock[]">
      						</td>
							<td align="center">
      							<input type="number" onblur="checkStock(<?php echo $x; ?>)" step="1" id="dozen<?php echo $x; ?>" name="dozen[]" onclick="getTotal(<?php echo $x; ?>)" onkeyup="getTotal(<?php echo $x; ?>)" min="0"  step="1" class="form-control" required>
      						</td>
							<td align="center">
      							<select id="unit<?php echo $x; ?>" name="unit[]" onchange="getTotal(<?php echo $x; ?>)" onblur="checkStock(<?php echo $x; ?>)"  class="form-control" required>
      								<option value="1" pcs="1">KG</option> 
      								<!--<option value="5" pcs="10">BOX</option> -->
      							</select>
							</td>
      						<td align="center">
      							<input type="number" id="rate<?php echo $x; ?>" name="rate[]" class="form-control"  required>
      						</td>
      						
      						<td align="center">
      							<input type="number" onblur="checkStock(<?php echo $x; ?>)" id="piece<?php echo $x; ?>" min="0" step="1" name="piece[]" onclick="getTotal(<?php echo $x; ?>)" onkeyup="getTotal(<?php echo $x; ?>)" class="form-control" required>
      						</td>
      						<!--<td align="center">
      							<input type="number"  id="discount<?php echo $x; ?>" min="0" step="0.1" value="0" name="discount[]" onclick="getTotal(<?php echo $x; ?>)" onkeyup="getTotal(<?php echo $x; ?>)" class="form-control">
      						</td> -->
      						<td align="center">
      							<input type="number"   id="gst<?php echo $x; ?>" name="gst[]" class="form-control" required>
      						</td>
      						<td align="center">
      							<input type="text" readonly id="total<?php echo $x; ?>" name="total[]" class="form-control">
      						</td>
      						<td align="center">
      							<button type="button" class="btn btn-sm" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="fa fa-trash"></i></button>
      						</td>
      					</tr>
      					<?php } ?>
      				</tbody>
      				</table>
					<table class="table table-condensed" id="discountTable">
					  <thead>
						<th>Subamount</th>
						<th>Discount</th>
						<th>GST %</th>
						<th>Total</th>
						
					  </thead>
					  <tbody>
					  </tbody>
					</table>
					<table border="0" cellpadding="5" width="100%" >
						
						<tr>
							<td align="right" width="80%" ><b>Grand Total</b>  </td>
							<td align="right" ><input type="text" name="grandTotal" id="grandTotal" class="form-control" required readonly> </td>
						</tr>
						<tr>
							<td align="right" width="80%" ><b>Payment Type</b> </td>
							<td align="right" > 
								<select  class="form-control" name="paymentType" id="paymentType">
										<option value="">~~SELECT~~</option>
										<option value="CHEQUE">Cheque</option>
										<option value="CASH" >Cash</option>
										<option value="CARD">Credit Card</option>
										<option value="DUE" selected>NOT PAID / DUE</option>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right" width="80%" ><b>Amount Paid</b> </td>
							<td align="right"> 
								<input type="text" class="form-control" value="0" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" />
							
							</td>
						</tr>
            <tr>
              <td align="right" width="80%"><b>Kooli</b> </td>
              <td align="right">                
                <select class="form-control" name="kooli" id="kooli">
                  <option value="">--Select--</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="right" width="80%"><b>Bag Qnty.</b> </td>
              <td align="right" width="80%"> 
                <input type="text" class="form-control" value="0" id="bag_qnty" name="bag_qnty" required/>
              </td>
            </tr>
            <tr>
              <td align="right" width="80%"><b>Rate/Per Bags</b> </td>
              <td align="right" width="80%"> 
                <input type="text" class="form-control" value="0" id="rate_perbag" name="rate_perbag" required/>
              </td>
            </tr>
            <tr>
              <td align="right" width="80%"><b>Kooli Amount :</b> </td>
              <td align="right" width="80%"> 
                <label id="kooli_amnt"></label>
              </td>
            </tr>
						</table>
					
            </div>    
              <div class="card-footer">
                  <input type="submit" value="Create Invoice" class="btn btn-primary float-right">
                  <input type="hidden" value="new_invoice" id="action" class="btn btn-success float-right">
                 
                </div>              
            </div>			
            <!-- /.card -->
            </form>
        </div>
        <!-- Table -->



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer_link.php'?>

  
</div>
<!-- ./wrapper -->

<!-- All footer js links are here -->
<?php include "include/footer.php"?>
<script src="../dist/js/bootstrap-select.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
	var productOptions = "";
    
	get_prod_list();
	get_customer_list();
    get_kooli_list();
    get_accounts_list();
	
	 $(window).keydown(function(event){
		if(event.keyCode == 13) {
		  event.preventDefault();
		  return false;
		}
		else if(event.keyCode == 107)
		{	
			event.preventDefault();
			addRow();
		}
	});
    $('#paymentType').on('change',function(){
		if($(this).val()=="DUE"){
			$('#paid').val("0");
		}
		else{
			$('#paid').val($('#grandTotal').val());
		}
	});
	$('#buyerName').on('change',function(){
		$('#address').val($('#buyerName option:selected').attr('state'));
	});
	$('#grossDiscount').on('click keyup',function(){
		findGrandTotal();
	});
      $.validator.setDefaults({
        submitHandler: function () {
           //alert( "Form successful submitted!" );
        var count = $("input[name='dozen[]']").length ;
       
		var arr = [];
		var extraDisc = [];

          for(var i = 1; i <= count; i++){
            if($('#productName'+i).val() == '' || $('#rate'+i).val() == '' ||  $('#dozen'+i).val() == '' ||  $('#gst'+i).val() == ''){
                  var valid_stat = false;                                            
                  $('<span id="cmplt_row" >Plese Complete This Row</span>').insertAfter($('#productName'+i));                     
					
			}else{               
                  var valid_stat = true;
            }
          }

          if(valid_stat == true){
				 
				 for(var i = 0; i < $('#productTable tbody tr').length; i++){
					 
					 var tr = $("#productTable tbody tr")[i];
					var count = $(tr).attr('id');
					count = count.substring(3);
					arr.push({ "prod_id": $('#productName'+count).val(), "rate": $('#rate'+count).val(), "dozen": $('#dozen'+count).val(),"unit":$('#unit'+count).val(),"unitName":$('#unit'+count+' option:selected').text(), "piece": $('#piece'+count).val(), "gst": $('#gst'+count).val() });
				  }

			for(var j = 1; j <= $('#discountTable tbody tr').length; j++){
					extraDisc.push({ "extra_d": $('#extraDiscount'+j).val() || 0, "Tax": $('#Tax'+j).val() || 0});
			}

					
          
					 var formData = new FormData();
                      var action = $('#action').val();
                      var buyerName = $('#buyerName').val();
                      var invoiceDate = $('#invoiceDate').val();
                      var prod_data = JSON.stringify(arr);
                      var disc_data = JSON.stringify(extraDisc);
                  
                      formData.append('action', action);
                      formData.append('paymentType', $('#paymentType').val());
                      formData.append('buyerName', buyerName);
					           formData.append('accName', $('#acc_name').val());
                      formData.append('invoiceDate', invoiceDate);
                      formData.append('prod_data', prod_data);                       
                      formData.append('extraDisc', disc_data);                       
                      formData.append('accnt_yr_id', $('#accting_yr_id').val());                       
                      formData.append('grossDiscount', $('#grossDiscount').val());                       
                      formData.append('paidAmount', $('#paid').val());                       
                      formData.append('address', $('#address').val()); 
                      if($('#kooli').val() != ""){
                          formData.append('kooli_id', $('#kooli').val()); 
                          formData.append('bag_qnty', $('#bag_qnty').val());
                          formData.append('rate_perbag', $('#rate_perbag').val());
                      }else{
                          formData.append('kooli_id', ''); 
                          formData.append('bag_qnty', '');
                          formData.append('rate_perbag', '');
                      }

                      
                      // for (var pair of formData.entries()) {
                      //     console.log(pair[0]+ ', ' + pair[1]); 
                      // }                      
                         
						// alert(invoiceDate);
						
                       $.ajax ({
                                      type: "POST",             
                                      enctype: 'multipart/form-data',
                                      url: "../ajax/ajax-admin.php",
                                      data: formData,           
                                      contentType: false,       
                                      cache: false,            
                                      processData:false,        
                                      beforeSend: function(){
                                           $(".overlay").css('display','flex');
                                         },
                                         complete: function(){
                                          $(".overlay").css('display','none');
                                         },
                                        success: function( result ) {  
											                                   
                                          console.log(result);
                                          var dataObj = JSON.parse(result);
                                          if(dataObj.res == '1'){
                                            
                                            $('#task_create')[0].reset();
                                            toastmsg(dataObj.msg,'success');
											$('#discountTable tbody').html("");
                                             $(".success-messages").html('<div class="alert alert-success">'+
											'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
											'<strong><i class="fa fa-check"></i> </strong>&nbsp;&nbsp; Invoice Has Been Created Successfully&nbsp;&nbsp;<a target="_blank" href="printInvoice.php?id='+dataObj.invoiceNo+'&acc_id='+dataObj.accId+'&acc_yr_id='+dataObj.acc_yr+'"><button type="button" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print</button></a>'+      		            		            	
										   '</div>');
								
											$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);
                                          }else{
                                              toastmsg(dataObj.msg,'error');
                                          }

                                      }
                      });
			}
		}

         
              });
     
    
      $('#task_create').validate({
          rules: {
            buyerName: {
              required: true
            },            
            invoiceDate: {
              required: true,
            },           
          },
          messages: {
           
            buyerName: {
              required: "Please Select Buyer Name"
            },            
            invoiceDate: {
              required: "Please Enter Invoice Date"
            },
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
      });  
             
  });
  
  $('#bag_qnty').on('keyup',function(){
    getKooliAmnt();
  });

  $('#rate_perbag').on('keyup',function(){
    getKooliAmnt();
  });

  function getKooliAmnt(){
    var bags = parseFloat($('#bag_qnty').val()) || 0;
    var rate = parseFloat($('#rate_perbag').val()) || 0;
    var tot_amnt = bags * rate;
    $('#kooli_amnt').text(tot_amnt);
  }

	
  function get_customer_list()
  {
            var formData = new FormData();
            formData.append('id', '');
            formData.append('page', '');
            formData.append('offset', '');
            formData.append('keyword', '');
            formData.append('status', '');
            formData.append('action', 'load_customer_list');

      $.ajax ({
                            type: "POST",             
                            enctype: 'multipart/form-data',
                            url: "../ajax/ajax-admin.php",
                            data: formData,           
                            contentType: false,       
                            cache: false,             
                            processData:false,
							beforeSend:function(){
									 $(".overlay").css('display','flex');
								},
                            complete: function(){
                                $(".overlay").css('display','none');
                               },
                              success: function( result ) {
                                // get_client_name('1');
                                console.log(result);
                                var dataObj = JSON.parse(result);
                                console.log(dataObj);
                                $('#table_body').empty();
                                if(dataObj.res == '1'){ 
									var option='<option value="">-- Select --</option><option value="CASH" state="19-West Bengal">CASH A/C</option> ';
                                    for(var i = 0; i<dataObj.count;i++){
										option+='<option value="'+dataObj.records[i].id+'" state="'+dataObj.records[i].state+'">'+dataObj.records[i].name+'</option>' ;
                                   }
									$('#buyerName').html(option);
									$('#buyerName').selectpicker('refresh');
                                }else{  
									alert(dataObj.records);
								 }
                            }
                });
  }
 
 function get_accounts_list(){
            var formData = new FormData();
            
            formData.append('action', 'load_accounts');
            

      $.ajax ({
                            type: "POST",             
                            enctype: 'multipart/form-data',
                            url: "../ajax/ajax-admin.php",
                            data: formData,           
                            contentType: false,       
                            cache: false,             
                            processData:false,
							beforeSend:function(){
									 $(".overlay").css('display','flex');
							},
                            complete: function(){
									 $(".overlay").css('display','none');
                            },
                            success: function( result ){
                               
                                var dataObj = JSON.parse(result);
                                
                                if(dataObj.res == '1'){ 
									var option='<option value="">--Select--</option>';
                                    for(var i = 0; i<dataObj.count;i++){
										option +='<option value="'+dataObj.records[i].id+'">'+dataObj.records[i].name+'</option>' ;
                                   }
									$('#acc_name').html(option);
                                }else{  
									alert(dataObj.records);
								 }
                            }
                });
  }

  function get_kooli_list(){
            var formData = new FormData();
            formData.append('id', '');
            formData.append('page', '');
            formData.append('offset', '');
            formData.append('keyword', '');
            formData.append('status', '');
            formData.append('action', 'load_kooli_list');

      $.ajax ({
                            type: "POST",             
                            enctype: 'multipart/form-data',
                            url: "../ajax/ajax-admin.php",
                            data: formData,           
                            contentType: false,       
                            cache: false,             
                            processData:false,
                            beforeSend:function(){
                                 $(".overlay").css('display','flex');
                              },
                            complete: function(){
                                $(".overlay").css('display','none');
                               },
                              success: function( result ) {
                                // get_client_name('1');
                                console.log(result);
                                var dataObj = JSON.parse(result);
                                console.log(dataObj);
                                $('#table_body').empty();
                                if(dataObj.res == '1'){ 
                                      var option='<option value="">--Select--</option>';
                                                        for(var i = 0; i<dataObj.count;i++){
                                        $('#kooli').append('<option value="'+dataObj.records[i].id+'">'+dataObj.records[i].name+'</option>') ;
                                                       }
                                                    }else{  
                                      alert(dataObj.records);
                                     }
                            }
                });
  }



  function get_prod_list(productId = '',type = "ALL" ,row = null){
            var formData = new FormData();
            formData.append('id', productId);
            formData.append('page', '');
            formData.append('offset', '');
            formData.append('keyword', '');
            formData.append('cat_id', '12');
            formData.append('action', 'load_prod_list');
		
      $.ajax ({
                            type: "POST",             
                            enctype: 'multipart/form-data',
                            url: "../ajax/ajax-admin.php",
                            data: formData,           
                            contentType: false,       // The content type used when sending data to the server.
                            cache: false,             // To unable request pages to be cached
                            processData:false,         
                            beforeSend:function(){
									 $(".overlay").css('display','flex');
								},
                            complete: function(){
                                $(".overlay").css('display','none');
                               },
                              success: function( result ) {
                                // get_client_name('1');
                                console.log(result);
								var options="";
                                var dataObj = JSON.parse(result);
                                console.log(dataObj);
                                $('#table_body').empty();
                                if(dataObj.res == '1'){
									if(type == "ALL"){
										for(var i = 0; i<dataObj.count;i++){ 
												
											  $('#productName1').append('<option value='+dataObj.records[i].id+'>'+dataObj.records[i].name+'-'+dataObj.records[i].size+'</option>');
											  $('#productName2').append('<option value='+dataObj.records[i].id+'>'+dataObj.records[i].name+'-'+dataObj.records[i].size+'</option>');
											  $('#productName3').append('<option value='+dataObj.records[i].id+'>'+dataObj.records[i].name+'-'+dataObj.records[i].size+'</option>');
											  $('#productName4').append('<option value='+dataObj.records[i].id+'>'+dataObj.records[i].name+'-'+dataObj.records[i].size+'</option>');
											  $('#productName5').append('<option value='+dataObj.records[i].id+'>'+dataObj.records[i].name+'-'+dataObj.records[i].size+'</option>');
											options += '<option value='+dataObj.records[i].id+'>'+dataObj.records[i].name+'-'+dataObj.records[i].size+'</option>';
										
										} 
										productOptions = options; 
										$('#productName1').selectpicker('refresh');	
										$('#productName2').selectpicker('refresh');	
										$('#productName3').selectpicker('refresh');	
										$('#productName4').selectpicker('refresh');	
										$('#productName5').selectpicker('refresh');	
									}
									else{
										var Pieces = 12 ;
										var qnty = 1;
										//var totalQuantity = qnty * Pieces ;
										var totalQuantity = qnty ;
										
										var discount=0;var rate=parseFloat(dataObj.records[0].rate) || 0 ;
										var gst= parseFloat(dataObj.records[0].gst) || 0;
										/* var total=((dozen*rate)*(100-discount)/100)*(100+gst)/100 ; */
										var total=((rate * totalQuantity)*(100-discount)/100) ;
										
										var dozenStock = Math.floor(dataObj.records[0].stock / 12);
										var pieceStock = (dataObj.records[0].stock % 12);
										
										$('#gst'+row).val(dataObj.records[0].gst);
										$('#rate'+row).val(dataObj.records[0].rate);
										$('#stock'+row).val(dataObj.records[0].stock);
										
										/* $("#dozen"+row).attr({
										   "max" : dozenStock
										   
										});
										$("#piece"+row).attr({
										   "max" : pieceStock
										   
										}); */
										/* $('#dozen'+row).val("1"); */
										$('#piece'+row).val("0");
										$('#total'+row).val(total.toFixed(2));
										findSubAmount();
										findGrandTotal();
									}
                                }else{  
                                   
                                }
                            }
                });
  }

 function getTotal(row = null) {
	if(row) {
		var Pieces = parseInt($("#unit"+row+" option:selected").attr('pcs')) ;
		var totalQuantity= (parseInt($("#dozen"+row).val() || 0) * Pieces) + parseInt($("#piece"+row).val() || 0) ;
		var total = (parseFloat($("#rate"+row).val()) || 0) * totalQuantity;
		
		var discount= parseFloat($('#discount'+row).val()) || 0;
		/* var gst= parseFloat($('#gst'+row).val()) || 0; */
		
		var subAmount 	=  total *(100 - discount)/100;
		/* var totalAmount = subAmount * (100 + gst)/100; */
		var totalAmount = subAmount;
		
		
		$("#total"+row).val(totalAmount.toFixed(2));
		
		findSubAmount();
		findGrandTotal();

	} else {
		alert('no row !! please refresh the page');
	}
}





 

  function makeid(length) {
     var result           = '';
     var characters       = 'ABCDEFGHIJ0123456789KLabcdefghijklmnopqrstuvwxyz0123456789';
     var charactersLength = characters.length;
     for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
     }
     return result;
  }
 // /success
function addRow() 
{
	$("#addRowBtn").button("loading");

	var tableLength = $("#productTable tbody tr").length;

	var tableRow;
	var arrayNumber;
	var count;

	if(tableLength > 0) {		
		tableRow = $("#productTable tbody tr:last").attr('id');
		arrayNumber = $("#productTable tbody tr:last").attr('class');
		count = tableRow.substring(3);	
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;					
	} else {
		// no table row
		count = 1;
		arrayNumber = 0;
	}
   //alert(count);
			var tr = 
			'<tr id="row'+count+'" class="'+arrayNumber+'">'+			  				
				'<td align="center">'+
							'<select id="productName'+count+'" onblur="checkStock('+count+')"  name="productName[]" class="form-control"  required onchange="fetchSelectedProduct(\''+count+'\')">'+
								'<option value="">-- Select -- </option>'+
								
							'</select>'+
							'<input type="hidden" id="stock'+count+'" name="stock[]">'+
						'</td>'+
						'<td align="center">'+
							'<input type="number" onblur="checkStock('+count+')"  id="dozen'+count+'" min="0" step="1" name="dozen[]" onclick="getTotal('+count+')" onkeyup="getTotal('+count+')" class="form-control" required>'+
						'</td>'+
						'<td align="center">'+
      							'<select id="unit'+count+'" name="unit[]" onchange="getTotal('+count+')" onblur="checkStock('+count+')"  class="form-control" required>'+
      								'<option value="1" pcs="1">KG </option> '+

      							'</select></td>'+
						'<td align="center">'+
							'<input type="number" step="0.1" id="rate'+count+'" name="rate[]" class="form-control" onclick="getTotal('+count+')" onkeyup="getTotal('+count+')" required >'+
						'</td>'+

							
						'<td align="center">'+
							'<input type="number" onblur="checkStock('+count+')" id="piece'+count+'" min="0" step="1" name="piece[]" onclick="getTotal('+count+')" onkeyup="getTotal('+count+')" class="form-control">'+
						'</td>'+
						
						'<td align="center">'+
							'<input type="number"  id="gst'+count+'" name="gst[]" class="form-control" required >'+
						'</td>'+
						'<td align="center">'+
							'<input type="text" readonly id="total'+count+'" name="total[]" class="form-control">'+
						'</td>'+
						'<td align="center">'+
							'<button type="button" class="btn btn-sm" id="removeProductRowBtn" onclick="removeProductRow(\''+count+'\')"><i class="fa fa-trash"></i></button>'+
						'</td>'+
			'</tr>';
			if(tableLength > 0) {							
				$("#productTable tbody tr:last").after(tr);
			} else {				
				$("#productTable tbody").append(tr);
			}		
		
    	$("#productName"+count).selectpicker('refresh');

	}
function removeProductRow(row = null) {
	
	if(row) {
		$("#row"+row).remove();


		findGrandTotal();
		findSubAmount();
	} else {
		alert('error! Refresh the page again');
	}
}
function fetchSelectedProduct(row = null){
	
	if(row){
		
		get_prod_list($('#productName'+row).val(),"SINGLE",row);
		
	}
}
function findSubAmount() {
	var tableProductLength = $("#productTable tbody tr").length;
	var totalSubAmount = 0;
	var result = [];
	for(x = 0; x < tableProductLength; x++) {
		 var tr = $("#productTable tbody tr")[x];
		var count = $(tr).attr('id');
		count = count.substring(3);
	
		
		
		if($('#productName'+count).val() != ""){
			
		var subAmount = $("#total"+count).val();
		//alert(subAmount);
		var vat = $("#gst"+count).val() || 0;
		
		if(!result[vat]){
			//alert(count);
			result[vat] = {Id: vat , Amount: subAmount};
			
		}
		else{
			var value= result[vat].Amount ;
			result[vat].Amount = parseFloat(value) + parseFloat(subAmount);
		}
		
		}
		
	} 
	
	console.log(result);
	$('#discountTable tbody').html("");
	var serial=1;
	for (var key in result) {
   
	var tempAmount=result[key].Amount;
	var Tax       =result[key].Id;
	var tempTotal = parseFloat(tempAmount)*(100+parseFloat(Tax))/100;
	var tr='<tr>'+
				'<td><input type="text" value="'+result[key].Amount+'" class="form-control" id="subTotal'+serial+'"  name="subTotal[]" readonly /></td>'+
				'<td><input type="number" value="0" min="0" step="0.01" class="form-control" id="extraDiscount'+serial+'" onclick="updateTotal('+serial+')" onkeyup="updateTotal('+serial+')" name="extraDiscount[]" /></td>'+
				'<td><input type="text" value="'+result[key].Id+'" class="form-control" id="Tax'+serial+'" name="Tax[]" readonly /></td>'+
				'<td><input type="text" value="'+tempTotal.toFixed(2)+'" class="form-control" id="Total'+serial+'" name="Total[]" readonly /></td>'+
			'</tr>';
	if($("#discountTable tbody tr").length > 0) {							
				$("#discountTable tbody tr:last").after(tr);
	} 
	else {				
				$("#discountTable tbody").append(tr);
	}
		serial++;
}

findGrandTotal();

}
function checkStock(row = NULL)
{
	if(row)
	{
		if($('#productName'+row).val() !="")
		{
		var totalPieces=0;
		if($('#unit'+row).val() == '3')
		{
			 totalPieces = parseFloat($('#dozen'+row).val() || 0) * 12  + parseFloat($('#piece'+row).val() || 0) ;
		}
		else{
			 totalPieces = parseFloat($('#dozen'+row).val() || 0) * 10  + parseFloat($('#piece'+row).val() || 0) ;
		}
		
			/* alert($('#piece'+row).val());
			alert(totalPieces);
			alert(parseFloat($('#stock'+row).val()));  */
		
		if(totalPieces > parseFloat($('#stock'+row).val()))
		{
			/* 
				alert(totalPieces);
				alert(parseFloat($('#stock'+row).val())); 
			*/
			
			alert($('#productName'+row+' option:selected').text()+" Stock Exceeded");
			$('#dozen'+row).val("");
			$('#piece'+row).val("");
			
		}
		}
	}
}
function updateTotal(row = NULL){
	var Tax = parseFloat($('#Tax'+row).val()) || 0 ;
	var subTotal = parseFloat($('#subTotal'+row).val()) || 0 ;
	var Discount = parseFloat($('#extraDiscount'+row).val()) || 0 ;
	 
	 var amount = subTotal*(100 -Discount )/100 ;
	 var  Total= amount * (100 + Tax)/100;
	 $('#Total'+row).val(Total.toFixed(2));
	findGrandTotal(); 
}
function findGrandTotal()
{
	var len = $('#discountTable tbody tr').length;
	var grandTotal=0;
	for($x=1 ; $x<=len ; $x++){
		grandTotal += parseFloat($('#Total'+$x).val()) || 0 ;
		
	}
	
	$('#grandTotal').val(grandTotal.toFixed(2));
	/* $('#grandTotalValue').val(grandTotal.toFixed(2));
	$('#paid').val(grandTotal.toFixed(2)); */
} 
</script>
</body>
</html>
