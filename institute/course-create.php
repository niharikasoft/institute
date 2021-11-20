<?php 
ob_start();
include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php
include "include/dbconfig.php";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  extract($_POST);
  
  $courseName = trim(mysqli_real_escape_string($conn, $courseName));
  $price = trim(mysqli_real_escape_string($conn, $price));
  
  
  if(isset($courseName)){
    $sql = "INSERT INTO `courses`(`course_name`, `price`, `fees_type`, `status`)
            VALUES('$courseName', '$price', '$feeType', 'active')" ;
    $res = mysqli_query($conn, $sql);
    if($res){
      $_SESSION['success_msg'] = "Course saved successfully.";
      header('location: course-read.php');
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
            <h1>Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">New Course</h3>

            <div class="card-tools">
             <!--  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST" autocomplete="off">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="courseName" id="courseName">
                   
                </div>
                <!-- /.form-group -->
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              <div class="form-group">
                  <label>Price</label>
                  <input type="number" class="form-control" name="price" id="price">
              </div>
                
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Fees Type</label>
                  <select class="form-control" name="feeType" id="feeType">
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              
             
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="course-read.php">
          <button type="button" class="btn btn-default">Cancel</button>
          </a>
          
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
