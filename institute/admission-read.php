<?php include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php 
$records =  getActiveAdmissions($_SESSION['institute_id']);
function showAdmissions($records)
{
  include "include/dbconfig.php"; 

  $records = json_decode($records);
  foreach ($records as $key => $record) {
    echo '<tr>
            <td>'.($key+1).'</td>
            <td>'.$record->registration_no.'</td>
            <td>'.$record->course_name.'</td>
            <td>'.$record->student_name.'</td>
            <td>'.$record->dob.'</td>
            <td>'.$record->gender.'</td>
            <td>'.$record->father_name.'</td>
            <td>'.$record->contact.'</td>
            <td>'.$record->address.'</td>
            <td>'.$record->post_office.'</td>
            <td>'.$record->police_station.'</td>
            <td>'.$record->district.'</td>
            <td>'.$record->pin.'</td>
            <td>
           
            <a href="#">
                <button type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
            </a>
           
            <a href="#">
                <button type="button" class="btn btn-sm"><i class="fa fa-trash"></i></button>
            </a>
            </td>
        </tr>';
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
            <?php if(isset($_SESSION['success_msg'])){?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
             <?php echo $_SESSION['success_msg']; unset($_SESSION['success_msg']);?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php }?>
          <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                  <a href="admission-create.php"><button class="btn btn-sm btn-primary">Add New</button></a>
                    &nbsp;
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-sm text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Registration No</th> 
                      <th>Course</th> 
                      <th>Student Name</th> 
                      <th>Birth Date</th> 
                      <th>Gender</th> 
                      <th>Father Name</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Post Office</th>
                      <th>Police Station</th>
                      <th>District</th>
                      <th>Pin</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php showAdmissions($records); ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
</section>
  </div>
  <!-- /.content-wrapper -->
<?php include "include/footer.php"; ?>
<script>
  $(document).ready(function(){
      $(document).find(".delete-btn").each(function () {
      $(this).on("click", function () {
          var status = confirm("Are sure to delete this data ?");
          if(!status){
            return false;
          }
        
      });
    });
  });
 
</script>