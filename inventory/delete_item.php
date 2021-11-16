<?php 
ob_start();
include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php
include "include/dbconfig.php";
include "include/helpers.php";
$id = trim(mysqli_real_escape_string($conn, $_GET['id']));
$item=getItem($id);

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
     
  
  if(isset($name)){
    $sql = "delete FROM `product` where  id='$id'" ;
    $res = mysqli_query($conn, $sql);
    if($res){
      $_SESSION['success_msg'] = "Product Updated successfull.";
      header('location: itemdetails.php');
    }
	else{
      
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
              <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
                  <div class="card-body">
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Product Code</label>
 <input type="text" class="form-control" id="id" name="id" value="<?php echo $id;?>" placeholder="Enter Code" readonly >
                 
                </div><div class="form-group">
                  <label>Product HSN</label>
 <input type="text" class="form-control" id="hsn" name="hsn" value="<?php echo $item['hsn'];?>" placeholder="Enter HSN" >
                 
                </div><div class="form-group">
                  <label>GST</label>
 <input type="text" class="form-control" id="gst" name="gst" value="<?php echo $item['gst'];?>" placeholder="Enter GST" >
                 
                </div><div class="form-group">
                  <label>Photo</label>
 <input type="file" class="form-control" id="pic" name="pic" >
                 
                </div>
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Product Name</label>
                   <input type="text" class="form-control" value="<?php echo $item['name'];?>" id="name" name="name" placeholder="Enter Product Name">
                 
                </div>
				<div class="form-group">
                  <label>Unit </label>
                   <input type="text" class="form-control" id="unit" value="<?php echo $item['unit'];?>" name="unit" placeholder="Enter Unit">
                 
                </div><div class="form-group">
                  <label>Description</label>
                   <input type="text" class="form-control" id="descp" value="<?php echo $item['descp'];?>" name="descp" placeholder="Enter Name">
                 
                </div>
				
				<img src="itemimage/<?php echo $item['pic'] ?>" width="100" height="100"></div>
                
               
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
