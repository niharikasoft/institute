<?php 
ob_start();
include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php
include "include/dbconfig.php";
include "include/helpers.php";
$id = trim(mysqli_real_escape_string($conn, $_GET['id']));
 $unit=getUnit($id);


if($_SERVER['REQUEST_METHOD'] == "POST")
{
  extract($_POST);
  //$id    = trim(isset($_GET['id']) ? $_GET['id'] : "");
  $name = trim(mysqli_real_escape_string($conn, $name));
  $id = trim(mysqli_real_escape_string($conn, $code));
  
  if(isset($name)){
    $sql = "update  `unit` set `name`='$name' where  id='$id'" ;
    $res = mysqli_query($conn, $sql);
    if($res){
      $_SESSION['success_msg'] = "Unit Updated successfull.";
      header('location: unitdetails.php');
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
            <h1>Units</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Branches</li>
            </ol>
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
            <h3 class="card-title">Unit Update</h3>

           
          </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
                  <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Unit Code</label>
 <input type="text" class="form-control" id="code" name="code" value="<?php echo $unit['id']?>" readonly>
                 
                </div>
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Unit Name</label>
                   <input type="text" class="form-control" id="name" name="name"  value="<?php echo $unit['name']?>"  placeholder="Enter Name">
                 
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
