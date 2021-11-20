<?php 
ob_start();
include "include/dbconfig.php";
include "functions.php";
$id       = trim(mysqli_real_escape_string($conn, $_GET['id']));
$institute = getInstitutesById($id);
if(!isset($institute)){
    echo "<h2 align='center'>Page Not Found </h2>";
    exit;
}
include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  extract($_POST);
  $branch    = trim(mysqli_real_escape_string($conn, $branch));
  $institute = trim(mysqli_real_escape_string($conn, $institute));
  $address   = trim(mysqli_real_escape_string($conn, $address));
  $contact   = trim(mysqli_real_escape_string($conn, $contact));
  $instituteCode = trim(mysqli_real_escape_string($conn, $instituteCode));
  $loginId       = trim(mysqli_real_escape_string($conn, $loginId));
 
  
  if(isset($branch)){
    $sql = "UPDATE `institutes` SET `branch_id`='$branch', `institute_name`='$institute', `address`='$address', `contact`='$contact',
            `institute_code`='$instituteCode', `status`='active' WHERE `id`= '$id'" ; 
   
    $res = mysqli_query($conn, $sql);

    // Update Branch Login Details.
    if($res){
      if(!empty($password)){
        $query = "UPDATE `users` SET  `user_id`= '$loginId', `password`='$password', `status`= '$status' WHERE `org_id`= '$id'" ;
       
      }else{
        $query = "UPDATE `users` SET  `user_id`= '$loginId', `status`= '$status') WHERE `org_id`= '$id'" ;
      
      }
      
      mysqli_query($conn, $query);

      $_SESSION['success_msg'] = "Institute updated successfully.";
    

      header('location: institute-read.php');
    }else{
      
      $_SESSION['success_msg'] = "Something went wrong.";
     header('location: institute-read.php');
     
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
            <h1>Institutes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Institutes</li>
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
              <h3 class="card-title">Edit Institute</h3>

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
                  <label>Branch</label>
                  <select class="form-control select2" style="width: 100%;" name="branch" id="branch">
                    <option value="">Select</option>
                    <?php echo getBranches($institute['branch_id']); ?>
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Contact</label>
                  <input type="text" class="form-control" name="contact" id="contact" value="<?php echo isset($institute['contact']) ? $institute['contact'] : "" ; ?>">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              <div class="form-group">
                  <label>Institute Name</label>
                  <input type="text" class="form-control" name="institute" id="institute" value="<?php echo isset($institute['institute_name']) ? $institute['institute_name'] : "" ; ?>"> 
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Institute Code</label>
                  <input type="text" class="form-control" name="instituteCode" id="instituteCode" value="<?php echo isset($institute['institute_code']) ? $institute['institute_code'] : "" ; ?>">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Login Id</label>
                  <input type="text" class="form-control" name="loginId" id="loginId" value="<?php echo isset($institute['user_id']) ? $institute['user_id'] : "" ; ?>">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Address</label>
                  <textarea name="address" id="address" class="form-control" ><?php echo isset($institute['address']) ? $institute['address'] : "" ; ?></textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2" style="width: 100%;" name="status" id="status">
                    <option value="">Select</option>
                    <option value="active" <?php if($institute['status'] == "active"){ echo "selected"; } ?>>Active</option>
                    <option value="disable" <?php if($institute['status'] == "disable"){ echo "selected"; } ?> >Disable</option>
                   
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
           
            <!-- /.row -->

            <!-- /.row -->
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
