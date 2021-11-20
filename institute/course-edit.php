<?php 
ob_start();
include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php
include "include/dbconfig.php";

$id       = trim(mysqli_real_escape_string($conn, $_GET['id']));
$course   = getCourseById($id);
$action   = trim(mysqli_real_escape_string($conn, $_GET['action']));


if($action == "delete"){
    $sql = "DELETE FROM `courses` WHERE `id`='$id'" ;
    $res = mysqli_query($conn, $sql);
    if($res){
      $_SESSION['success_msg'] = "Course deleted successfully.";
      header('location: course-read.php');
    }else{
      
      $_SESSION['success_msg'] = "Something went wrong.";
     
    }
}
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  extract($_POST);
  
  $employeeName = trim(mysqli_real_escape_string($conn, $employeeName));
  $contact = trim(mysqli_real_escape_string($conn, $contact));
 
  if(isset($employeeName)){
    $sql = "UPDATE `courses` SET `course_name`='$courseName', `price`='$price', `fees_type`='$feeType',
            `status`='$status' WHERE `id`='$id'" ;
    $res = mysqli_query($conn, $sql);
    if($res){
      
      $_SESSION['success_msg'] =  "Course updated successfully";
     
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
            <h3 class="card-title">Edit Course</h3>

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
          <form action="<?php echo $_SERVER['REQUEST_URI'] ; ?>" method="POST">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="courseName" id="courseName" value="<?php echo isset($course['course_name']) ? $course['course_name'] : "" ; ?>">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              <div class="form-group">
                  <label>Price</label>
                  <input type="text" class="form-control" name="price" id="price" value="<?php echo isset($course['price']) ? $course['price'] : "" ; ?>">
              </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Fees Type</label>
                 <select name="feeType" id="feeType" class="form-control">
                    <option value="mothly" <?php if($course['fees_type'] == "mothly"){ echo "selected"; } ?>>Active</option>
                    <option value="yearly" <?php if($course['fees_type'] == "yearly"){ echo "selected"; } ?>>Disable</option>
                 </select>
                </div>
              </div>
                <!-- /.form-group -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Status</label>
                 <select name="status" id="status" class="form-control">
                    <option value="">Select</option>
                    <option value="active" <?php if($course['status'] == "active"){ echo "selected"; } ?>>Active</option>
                    <option value="disable" <?php if($course['status'] == "disable"){ echo "selected"; } ?>>Disable</option>
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
          <a href="employee-read.php">
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
