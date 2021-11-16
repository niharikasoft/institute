<?php 
ob_start();
include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php
include "include/dbconfig.php";



if($_SERVER['REQUEST_METHOD'] == "POST")
{
	
	  $target_file="";

	$target_dir = "itemimage/";
	$target_file = basename($_FILES["pic"]["name"]);
move_uploaded_file($_FILES["pic"]["tmp_name"], $target_dir.$target_file); 
    
  extract($_POST);
  $name = trim(mysqli_real_escape_string($conn, $name));
  $hsn = trim(mysqli_real_escape_string($conn, $hsn));
  $gst = trim(mysqli_real_escape_string($conn, $gst));
  $descp = trim(mysqli_real_escape_string($conn, $descp));
  //$name = trim(mysqli_real_escape_string($conn, $name));
  
  if(isset($name)){
    $sql = "INSERT INTO `product`( `name`, `hsn`, `unit`, `gst`, `descp`, `pic`) VALUES 
	                             ('$name','$hsn','$unit','$gst','$descp','$target_file')" ;
    $res = mysqli_query($conn, $sql);
    if($res){
      $_SESSION['success_msg'] = "Product saved successfull.";
      header('location: itemdetails.php');
    }else{
      
      $_SESSION['success_msg'] = "Something went wrong.";
     
    }
  }
  

}

$sql1 = "SELECT max(id) as id FROM `product`";
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
            <h1>Product</h1>
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
            <h3 class="card-title">Product Creat</h3>

           
          </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST" enctype="multipart/form-data" data-parsley-validate>
                  <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Product Code</label>
 <input type="text" class="form-control" id="code" name="code" value="<?php echo $max;?>" placeholder="Enter Code" readonly >
                 
                </div><div class="form-group">
                  <label>Product HSN</label>
 <input type="text" class="form-control" id="hsn" name="hsn"  placeholder="Enter HSN" >
                 
                </div><div class="form-group">
                  <label>GST</label>
 <input type="text" class="form-control" id="gst" name="gst"  placeholder="Enter GST" >
                 
                </div><div class="form-group">
                  <label>Photo</label>
 <input type="file" class="form-control" id="pic" name="pic" >
                 
                </div>
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Product Name</label>
                   <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
                 
                </div>
				<div class="form-group">
                  <label>Unit </label>
                   <input type="text" class="form-control" id="unit" name="unit" placeholder="Enter Unit">
                 
                </div><div class="form-group">
                  <label>Description</label>
                   <input type="text" class="form-control" id="descp" name="descp" placeholder="Enter Name">
                 
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
