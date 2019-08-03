<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>حجوزات</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url(); ?>assets/css/rtl.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/ngPrint.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->

  <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>assets/css/angularjs-datetime-picker.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/select.css" rel="stylesheet">
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/js/angular/angular.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-route.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-aria.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-cookies.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-loader.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-message-format.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-mocks.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-parse-ext.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-resource.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-sanitize.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-touch.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/ngprogress.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/angular/ngPrint.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/angular/angular-datatables.min.js"></script>
  
   <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-input-masks/4.4.1/angular-input-masks-standalone.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/angular/angularjs-datetime-picker.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/angular/select.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/Alert.js"></script>
   <script href="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <style>
    .alertSpan{
      position: absolute !important;
       height: 34px !important;
    display: flex !important;
    align-items: center !important;
    z-index: 1000 !important;
    left: 9px  !important;
    }
    .alert {
            position: fixed;
            z-index: 1;
            right: 0;
            left: 0;
            top:0;
            width: 409px;
            text-align: right;
        }
.select2 > .select2-choice.ui-select-match {
            /* Because of the inclusion of Bootstrap */
            height: 29px;
        }

        .selectize-control > .selectize-dropdown {
            top: 36px;
        }
        /* Some additional styling to demonstrate that append-to-body helps achieve the proper z-index layering. */
        .select-box {
          background: #fff;
          position: relative;
          z-index: 1;
        }
        .alert-info.positioned {
          margin-top: 1em;
          position: relative;
          z-index: 10000; /* The select2 dropdown has a z-index of 9999 */
        }

  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="padding-right:0 !important">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html" style="height: 3.375rem !important;">
        <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-check-square"></i>
        </div>
        <div class="sidebar-brand-text mx-3">حجوزات</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        عمليات النظام
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="/hjozat/Home/AddHjz">
         <i class="fas fa-search"></i>
          <span>بحث عن حجز</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Contract">
        <i class="fas fa-file-contract"></i>
          <span>العقود</span></a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="Clients">
         <i class="far fa-address-book"></i>
          <span>العملاء</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="department">
      <i class="far fa-list-alt"></i>
          <span>العميات السابقة</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="RecVoch">
        <i class="far fa-money-bill-alt"></i>
          <span>سند القبض</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="department">
        <i class="far fa-money-bill-alt"></i>
          <span>سند الصرف</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="department">
        <i class="fas fa-file-contract"></i>
          <span>الغاء العقد</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        التعاريف الاساسية
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
     

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="/hjozat/Home/Company">
         <i class="fas fa-landmark"></i>
        
          <span>المنشأة</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="department">
       <i class="far fa-building"></i>
          <span>الأقسام</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Period">
         <i class="far fa-clock"></i>
          <span>الفترات</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Services">
        <i class="far fa-plus-square"></i>
          <span>الخدمات</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="MoneyOrg">
         <i class="far fa-user-circle"></i>
          <span>المستخدمين</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="MoneyOrg">
      <i class="far fa-credit-card"></i>
          <span>جهات الصرف</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/hjozat/Home/department">
         <i class="far fa-check-circle"></i>
          <span>صلاحيات المستخدمين</span></a>
      </li>

      <!-- Nav Item - Tables -->
   

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar  static-top shadow" style="height: 3.375rem !important;margin-bottom: 0.5rem!important">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
           
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="visibility:hidden">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="visibility:hidden;">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown" >
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block" style="visibility:hidden"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">             
			 <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
               
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        <div class="col-md-12">
          <?php $this->load->view($content);  ?>
        </div>
        <!-- Begin Page Content -->
        

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<!-- Add Dep Modal -->


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

   <div class="alert alert-success alert-dismissible container" role="alert" id="success_alert" style="display:none">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong></strong>
    </div>
    <div class="alert alert-danger alert-dismissible container" role="alert" id="error_alert" style="display:none">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong style="text-align:center"> </strong>
    </div>


  <!-- Bootstrap core JavaScript-->
  <!-- <script src="<?php echo base_url(); ?>assets/js/angular/angular.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-route.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-aria.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-cookies.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-loader.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-message-format.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-mocks.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-parse-ext.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-resource.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-sanitize.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/angular/angular-touch.js"></script> -->

  

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->


  <!-- Page level custom scripts -->
  

</body>

</html>
