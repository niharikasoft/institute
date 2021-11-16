<?php 
ob_start();
include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php
include "include/dbconfig.php";
include "include/helpers.php";
//$id = trim(mysqli_real_escape_string($conn, $_GET['id']));
$id    = trim(isset($_GET['id']) ? $_GET['id'] : "");
  
$part=getParty($id);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
 
 extract($_POST);
 
  $id = trim(mysqli_real_escape_string($conn, $code));
  $cat = trim(mysqli_real_escape_string($conn, $cat));
  $name = trim(mysqli_real_escape_string($conn, $name));
  $addrress = trim(mysqli_real_escape_string($conn, $addrress));
  $phn1 = trim(mysqli_real_escape_string($conn, $phn1));
  $phn2 = trim(mysqli_real_escape_string($conn, $phn2));
  $gst = trim(mysqli_real_escape_string($conn, $gst));
  $mailid = trim(mysqli_real_escape_string($conn, $mailid));
  $date = trim(mysqli_real_escape_string($conn, $date));
  $blnce = trim(mysqli_real_escape_string($conn, $blnce));
    
  
  if(isset($name)){
	  
		  $sql = "delete FROM `party` where  id='$id'" ;
    
	  
    $res = mysqli_query($conn, $sql);
    if($res){
     $_SESSION['success_msg'] = "Party Delete successfull.";
      header('location: partydetails.php');
	
    }
	else{
		//echo $sql;
      
      $_SESSION['success_msg'] = "Something went wrong.";
     
    }
  }
  

}



?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="card card-secondary">
              <div class="card-header">
            <h3 class="card-title">Product Delete</h3>

           
          </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST" enctype="multipart/form-data" data-parsley-validate>
                  <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Party Id</label>
 <input type="text" class="form-control" id="code" name="code" value="<?php echo $id;?>" placeholder="Enter Code" readonly >
                 
                </div><div class="form-group">
                  <label>Party Category</label>
 <input type="text" class="form-control" id="cat" name="cat" value="<?php echo $part['cat'];?>"  placeholder="Enter Category" >
                 
                </div>
				<div class="form-group">
                  <label>Phone No 1</label>
 <input type="text" class="form-control" id="phn1" name="phn1" value="<?php echo $part['phn1'];?>"  placeholder="Enter Phone No" >
                 
                </div>
				<div class="form-group">
                  <label>Email Id</label>
 <input type="text" class="form-control" id="mailid" name="mailid" value="<?php echo $part['mailid'];?>"  placeholder="Enter Mail Id" >
                 
                </div>
				<div class="form-group">
                  <label>Balance</label>
 <input type="text" class="form-control" id="blnce" name="blnce" value="<?php echo $part['blnce'];?>" placeholder="Enter Balance" >
                 
                </div>
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Party Name</label>
                   <input type="text" class="form-control" id="name" name="name" value="<?php echo $part['name'];?>" placeholder="Enter Party Name">
                 
                </div>
				<div class="form-group">
                  <label>Party Address</label>
 <input type="text" class="form-control" id="addrress" name="addrress" value="<?php echo $part['addrress'];?>"  placeholder="Enter Address" >
                 
                </div>
				<div class="form-group">
                  <label>Phone No 2 </label>
                   <input type="text" class="form-control" id="phn2" name="phn2" value="<?php echo $part['phn2'];?>" placeholder="Enter Phone No">
                 
                </div><div class="form-group">
                  <label>GST No</label>
                   <input type="text" class="form-control" id="gst" name="gst" value="<?php echo $part['gst'];?>" placeholder="Enter GST No">
                 
                </div>
				
				<div class="form-group">
                  <label>Date Of Entry</label>
                   <input type="date" class="form-control" value="<?php echo $part['date'];?>" id="date" name="date">
                 
                </div>
               
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
          </div>
		  
		  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Delete</button>
                </div>
                <!-- /.card-body -->
                
              </form>
            </div>
          </div>
        </div>
      </div>
</section>
  </div>
  <!-- /.content-wrapper -->
<?php include "include/footer.php"; ?>
