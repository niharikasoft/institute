<?php 
ob_start();
include "include/header.php";
include "include/sidebar.php";
include "include/dbconfig.php";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  extract($_POST);
  
  $studentName = trim(mysqli_real_escape_string($conn, $studentName));
  $fatherName  = trim(mysqli_real_escape_string($conn, $fatherName));
  $contact     = trim(mysqli_real_escape_string($conn, $contact));
  $address     = trim(mysqli_real_escape_string($conn, $address));
  $postOffice  = trim(mysqli_real_escape_string($conn, $postOffice));
  $policeStation  = trim(mysqli_real_escape_string($conn, $policeStation));
  $district   = trim(mysqli_real_escape_string($conn, $district));
  $pin        = trim(mysqli_real_escape_string($conn, $pin));
  $instituteId = $_SESSION['institute_id'];
  $paymentDate = date('Y-m-d') ;
  $length = count($month);

  // Create Student.
  $sql    = "INSERT INTO `students`(`institute_id`, `student_name`, `father_name`, `contact`, `address`, `post_office`, `police_station`, `district`, `pin`, `dob`, `gender`) 
          VALUES ('$instituteId','$studentName','$fatherName','$contact','$address','$postOffice','$policeStation','$district','$pin','$dob','$gender')" ;
  $res    = mysqli_query($conn, $sql);
  $studentId = mysqli_insert_id($conn);
  $registrationNo = getRegistrationNo($course, $_SESSION['institute_code']) ;

 // Create Admission.
 $query = "INSERT INTO `admissions`(`institute_id`, `student_id`, `registration_no`, `course_id`, `admission_date`, `status`) 
           VALUES ('$instituteId', '$studentId', '$registrationNo', '$course', '$date', 'active')" ;
  
 $result      = mysqli_query($conn, $query);
 $admissionId = mysqli_insert_id($conn);

 // Fees Entry.
 for($i=0 ; $i< $length ; $i++){
  $month = $_POST['month'][$i] ;
  $feesQuery = "INSERT INTO `collected_fees`(`institute_id`, `student_id`, `admission_id`, `total_fees`, `collection_date`, `of_month`, `of_year`, `payment_mode`) 
  VALUES ('$instituteId', '$studentId', '$admissionId', '$amountPaid', '$paymentDate', '$month', '$year', '')" ;
  $feesQueryRes  =  mysqli_query($conn, $feesQuery) ;

}
if($feesQueryRes){
  $_SESSION['success_msg'] = "Admission saved successfully.";
  header('location: admission-read.php');
}else{
  $_SESSION['success_msg'] = "Something went wrong.";
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
            <h1>Admission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admission</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">New Admission</h3>

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
              <div class="col-md-4">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="studentName" id="studentName">
                   
                </div>
                <!-- /.form-group -->
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
              <div class="form-group">
                  <label>Father Name</label>
                  <input type="text" class="form-control" name="fatherName" id="fatherName">
              </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                  <label>Contact No</label>
                  <input type="number" class="form-control" name="contact" id="contact">
              </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="address" id="address">
                   
                </div>
                <!-- /.form-group -->
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
              <div class="form-group">
                  <label>Post Office</label>
                  <input type="text" class="form-control" name="postOffice" id="postOffice">
              </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                  <label>Police Station</label>
                  <input type="text" class="form-control" name="policeStation" id="policeStation">
              </div>
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <label>District</label>
                  <input type="text" class="form-control" name="district" id="district" required>
              </div>
              </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label>Pin Code</label>
                  <input type="number" class="form-control" name="pin" id="pin" required>
              </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control" name="gender" id="gender" required>
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              
             
            </div>
            <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <label>DOB</label>
                  <input type="date" class="form-control" name="dob" id="dob" required>
              </div>
              </div>
            </div>
           
          </div>
          <div class="card-header">
            <h3 class="card-title">Course Details</h3>

            <div class="card-tools">
             <!--  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> -->
            </div>
          </div>
          <div class="card-body">
              <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Course</label>
                  <select class="form-control" name="course" id="course" required>
                    <option value="">Select</option>
                    <?php echo getCourseByInstitute($_SESSION['institute_id']) ;?>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-4">
              <div class="form-group">
                  <label>Course Price</label>
                  <input type="number" class="form-control" name="coursePrice" id="coursePrice" required>
              </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-4">
              <div class="form-group">
                  <label>Admission Date</label>
                  <input type="date" class="form-control" name="date" id="date" required value="<?php echo date('Y-m-d');?>">
              </div>
                <!-- /.form-group -->
              </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Amount Paid</label>
                        <input type="number" class="form-control" name="amountPaid" id="amountPaid" required>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label>Amount Paid For Month</label>
                  <select class="select2" multiple="multiple" name="month[]" data-placeholder="Select Month" style="width: 100%;">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-4">
                <div class="form-group">
                  <label>Year</label>
                  <select class="form-control"  name="year" id="year" required>
                    <option value="">Select</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                  </select>
                </div>
                    <!-- /.form-group -->
                </div>
              
              </div>
              
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
<script>
    $(document).ready(function(){
        $('.select2').select2();

    });
</script>
