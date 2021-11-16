<?php 
ob_start();
include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php
include "include/dbconfig.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  extract($_POST);
  $branch = trim(mysqli_real_escape_string($conn, $branch));
  
  if(isset($branch)){
    $sql = "INSERT INTO `branches`(`name`, `status`) VALUES ('$branch', 'active')" ;
    $res = mysqli_query($conn, $sql);
    if($res){
      $_SESSION['success_msg'] = "Branch saved successfull.";
      header('location: branch-read.php');
    }else{
      
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
            <h1>Branches</h1>
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
                <h3 class="card-title">Branches</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Branch Name</label>
                    <input type="text" class="form-control" id="branch" name="branch" placeholder="Enter Branch">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</section>
  </div>
  <!-- /.content-wrapper -->
<?php include "include/footer.php"; ?>
