<?php include "include/header.php"; ?>
<?php include "include/sidebar.php"; ?>
<?php 
function getBranches(){
  include "include/dbconfig.php"; 
  $sql = "SELECT * FROM `product`"; 
  $res = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($res))
  {
    echo '<tr>
					<td style="text-align:center;">'.$row['id'].'</td>
					<td style="text-align:center;">'.$row['name'].'</td>
					<td style="text-align:center;">'.$row['hsn'].'</td>
					<td style="text-align:center;">'.$row['unit'].'</td>
					<td style="text-align:center;">'.$row['gst'].'</td>
					<td style="text-align:center;">'.$row['descp'].'</td>
					<td style="text-align:center;"><img src="itemimage/'.$row['pic'].'" width="100" height="100"></td>
			<td style="text-align:center;">
				<a href="edit_item.php?id='.$row['id'].'">
				<button type="button" class="btn btn-xs btn-info" id="'.$row['id'].'" name="'.$row['name'].'"><i class="fa fa-edit"></i>
					</button>		
				</a>
				<a href="delete_item.php?id='.$row['id'].'">
				<button type="button" class="btn btn-xs btn-info" id="'.$row['id'].'" name="'.$row['name'].'"><i class="fa fa-trash"></i>
					</button>		
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
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
           <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Branches</li>
            </ol>-->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <?php if(isset($_SESSION['success_m']))?>
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
                <h3 class="card-title">All Products</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 250px;">
                  <a href="item.php"><button class="btn btn-sm btn-primary">Add New</button></a>
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
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="text-align:center;">Product Code</th>
                      <th style="text-align:center;">Product Name</th>
                      <th style="text-align:center;">Product HSN</th>
                      <th style="text-align:center;">Product Unit</th>
                      <th style="text-align:center;">GST</th>
                      <th style="text-align:center;">Description</th>
                      <th style="text-align:center;">photo</th>
                      <th style="text-align:center;">Action</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php  getBranches();?>
                  </tbody>
                </table>
              </div>
             
            </div>
        </div>
      </div>
</section>
  </div>
  
<?php include "include/footer.php"; ?>
