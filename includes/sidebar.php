 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="<?= SITE_URL ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Test project</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?= SITE_URL ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Guest</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item <?= (strpos($_SERVER['REQUEST_URI'], 'category') > 0) ? 'menu-open' : ''; ?> ">
                     <a href="#" class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], 'category') > 0) ? 'active' : ''; ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Category
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= SITE_URL . 'category/list.php' ?>" class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], 'category/list') > 0) ? 'active' : ''; ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>List</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= SITE_URL . 'category/add.php' ?>" class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], 'category/add') > 0) ? 'active' : ''; ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item <?= (strpos($_SERVER['REQUEST_URI'], 'product') > 0) ? 'menu-open' : ''; ?>">
                     <a href="#" class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], 'product') > 0) ? 'active' : ''; ?>">
                         <i class="nav-icon fas fa-tachometer-alt "></i>
                         <p>
                             Product
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= SITE_URL . 'product/list.php' ?>" class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], 'product/list') > 0) ? 'active' : ''; ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>List</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= SITE_URL . 'product/add.php' ?>" class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], 'product/add') > 0) ? 'active' : ''; ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Add</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>