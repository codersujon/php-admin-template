 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="dashboard.php" class="brand-link">
     <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">RuperHatBD</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="" class="d-block">

           <!-- Manager Name Showing  -->
           <?php
            if (isset($_SESSION['bName'])) {
              echo $_SESSION['mName'];
            }
            ?>

         </a>
       </div>
     </div>

     <!-- SidebarSearch Form -->
     <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-sidebar">
             <i class="fas fa-search fa-fw"></i>
           </button>
         </div>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item menu-open">
           <a href="dashboard.php" class="nav-link active">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         <li class="nav-header">Controls Area</li>
         <li class="nav-item">
           <a href="usercontrols.php" class="nav-link">
             <i class="fas fa-code-branch nav-icon"></i>
             <p>Branch List</p>
           </a>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="fas fa-store nav-icon"></i>
             <p>
               Products
               <i class="fas fa-angle-left right"></i>
               <span class="badge badge-info right">2</span>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="addproduct.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Product</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="manageproduct.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Manage Product</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="fas fa-truck nav-icon"></i>
             <p>
               Purchase
               <i class="fas fa-angle-left right"></i>
               <span class="badge badge-info right">2</span>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="purchase.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Purchase</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="managepurchase.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Manage Purchase</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="fas fa-shopping-cart nav-icon"></i>
             <p>
               Sales
               <i class="fas fa-angle-left right"></i>
               <span class="badge badge-info right">2</span>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="sales.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Add Sale</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="managesales.php" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Manage Sales</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-item">
           <a href="logout.php" class="nav-link">
             <i class="nav-icon fas fa-power-off"></i>
             <p>Logout</p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>