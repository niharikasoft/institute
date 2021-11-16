<?php 
ob_start();
include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php
include "include/dbconfig.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  extract($_POST);
  $name = trim(mysqli_real_escape_string($conn, $name));
  
  if(isset($name)){
    $sql = "INSERT INTO `category`(`name`) VALUES ('$name')" ;
    $res = mysqli_query($conn, $sql);
    if($res){
      $_SESSION['success_msg'] = "Category saved successfull.";
      header('location: catdetails.php');
    }else{
      
      $_SESSION['success_msg'] = "Something went wrong.";
     
    }
  }
  

}

$sql1 = "SELECT max(id) as id FROM `category`";
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
            <h1>Category</h1>
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
            <h3 class="card-title">Category Creat</h3>

           
          </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
                  <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Category Code</label>
 <input type="text" class="form-control" id="code" name="code" value="<?php echo $max;?>" placeholder="Enter Code" readonly>
                 
                </div>
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Category Name</label>
                   <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                 
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
