<?php include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>

<?php 
function getCourses(){
  include "include/dbconfig.php"; 
  $instituteId = $_SESSION['institute_id'];
  $sql = "SELECT * FROM `courses` WHERE `institute_id`='$instituteId' ORDER BY `id` DESC ";
  $res = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($res))
  {
    extract($row);
    echo '<tr>
              <td>'.$id.'</td>
              <td>'.$course_name.'</td>
              <td>'.$price.'</td>
              <td>'.$fees_type.'</td>
              <td><span class="tag tag-success">'.$status.'</span></td>
              <td>
                <a href="course-edit.php?id='.$id.'&action=edit">
                  <button type="button" class="btn btn-sm"><i class="fa fa-edit"></i></button>
                </a>
                <a class="delete-btn" href="course-edit.php?id='.$id.'&action=delete">
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
                <h3 class="card-title">All Courses</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                  <a href="course-create.php"><button class="btn btn-sm btn-primary">Add New</button></a>
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
                     <!--  <th>Branch</th> -->
                      <th>Course Name</th>
                      <th>Price</th>
                      <th>Fees Type</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php getCourses(); ?>
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