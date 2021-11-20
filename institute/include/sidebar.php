 <?php
 include "../utils/functions.php";
 $master = ['course-read.php', 'course-create', 'course-edit', 'fees-read.php'];
 $admission = ['admission-read.php', 'admission-create', 'admission-edit'];
 
 ?>
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="../files/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Portal</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../files/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Institute Panel</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
          
            </ul>
          </li>
         <!--  <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->

          <li class="nav-item <?php menuOpen($master, $fileName); ?>">
            <a href="#" class="nav-link <?php activePage($master, $fileName); ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="course-read.php" class="nav-link <?php if( $fileName == "course-read.php" ){ echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Courses</p>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="fees-read.php" class="nav-link <?php if( $fileName == "fees-read.php" ){ echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Fees</p>
                </a>
              </li> -->
              
              
            </ul>
          <li class="nav-item <?php menuOpen($admission, $fileName); ?>">
            <a href="#" class="nav-link <?php activePage($admission, $fileName); ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Admission
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admission-read.php" class="nav-link <?php if( $fileName == "admission-read.php" ){ echo "active"; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Admission</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li> -->
         
         
         
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>