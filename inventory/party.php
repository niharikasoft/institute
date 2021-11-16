<?php 
ob_start();
include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php
include "include/dbconfig.php";



if($_SERVER['REQUEST_METHOD'] == "POST")
{
	
	  /*$target_file="";

	$target_dir = "itemimage/";
	$target_file = basename($_FILES["pic"]["name"]);
move_uploaded_file($_FILES["pic"]["tmp_name"], $target_dir.$target_file); */
    
  extract($_POST);
  $cat = trim(mysqli_real_escape_string($conn, $cat));
  $name = trim(mysqli_real_escape_string($conn, $name));
  $addrress = trim(mysqli_real_escape_string($conn, $addrress));
  $phn1 = trim(mysqli_real_escape_string($conn, $phn1));
  $phn2 = trim(mysqli_real_escape_string($conn, $phn2));
  $mailid = trim(mysqli_real_escape_string($conn, $mailid));
  $gst = trim(mysqli_real_escape_string($conn, $gst));
  $date = trim(mysqli_real_escape_string($conn, $date));
  $blnce = trim(mysqli_real_escape_string($conn, $blnce));
  //$name = trim(mysqli_real_escape_string($conn, $name));
  
  if(isset($name)){
    $sql = "INSERT INTO `party`(`cat`, `name`, `addrress`, `phn1`, `phn2`, `gst`, `mailid`, `date`, `blnce`) VALUES 
	                           ('$cat','$name','$addrress','$phn1','$phn2','$gst','$mailid','$date','$blnce')" ;
    $res = mysqli_query($conn, $sql);
    if($res){
      $_SESSION['success_msg'] = "Party saved successfull.";
      header('location: partydetails.php');
    }else{
      
      $_SESSION['success_msg'] = "Something went wrong.";
     
    }
  }
  

}

$sql1 = "SELECT max(id) as id FROM `party`";
 $res1 = mysqli_query($conn, $sql1);
 $row1 = mysqli_fetch_assoc($res1);
 $max=$row1['id']+1;

?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Party</h1>
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
            <h3 class="card-title">Party Creat</h3>

           
          </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST" enctype="multipart/form-data" data-parsley-validate>
                  <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Party Id</label>
 <input type="text" class="form-control" id="code" name="code" value="<?php echo $max;?>" placeholder="Enter Code" readonly >
                 
                </div><div class="form-group">
                  <label>Party Category</label>
 <input type="text" class="form-control" id="cat" name="cat"  placeholder="Enter Category" >
                 
                </div>
				<div class="form-group">
                  <label>Phone No 1</label>
 <input type="text" class="form-control" id="phn1" name="phn1"  placeholder="Enter Phone No" >
                 
                </div>
				<div class="form-group">
                  <label>Email Id</label>
 <input type="text" class="form-control" id="mailid" name="mailid"  placeholder="Enter Mail Id" >
                 
                </div>
				<div class="form-group">
                  <label>Balance</label>
 <input type="text" class="form-control" id="blnce" name="blnce"  placeholder="Enter Balance" >
                 
                </div>
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Party Name</label>
                   <input type="text" class="form-control" id="name" name="name" placeholder="Enter Party Name">
                 
                </div>
				<div class="form-group">
                  <label>Party Address</label>
 <input type="text" class="form-control" id="addrress" name="addrress"  placeholder="Enter Address" >
                 
                </div>
				<div class="form-group">
                  <label>Phone No 2 </label>
                   <input type="text" class="form-control" id="phn2" name="phn2" placeholder="Enter Phone No">
                 
                </div><div class="form-group">
                  <label>GST No</label>
                   <input type="text" class="form-control" id="gst" name="gst" placeholder="Enter GST No">
                 
                </div>
				
				<div class="form-group">
                  <label>Date Of Entry</label>
                   <input type="date" class="form-control" id="date" name="date">
                 
                </div>
               
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
          </div>
		  
		  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
