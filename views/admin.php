<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $data['page_title'] ?> | <?= WEBSITE_TITLE ?></title>

    <!-- BOOTSTRAP STYLES-->
    <link href="<?= ROOT ?>assets/admin_assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?= ROOT ?>assets/admin_assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="<?= ROOT ?>assets/admin_assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="<?= ROOT ?>assets/admin_assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="<?= ROOT ?>assets/css/modal.css" rel="stylesheet">
    <link href="<?= ROOT ?>assets/css/loader.css" rel="stylesheet">
    <link href="<?= ROOT ?>assets/admin_assets/summernote/summernote.min.css" rel="stylesheet" />

    <link rel="shortcut icon" href="<?= ROOT ?>assets/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= ROOT ?>assets/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= ROOT ?>assets/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= ROOT ?>assets/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?= ROOT ?>assets/images/favicon.png">

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;background:#1C77A8;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= ROOT ?>"><img src="<?= ROOT ?>assets/images/logo.png" width="70px"/></a>
            </div>

            <div class="header-right" >

              <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation" style="padding-top:15px;">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a  href="<?= ROOT ?>admin/banners" class="<?php if(isset($_SESSION['dashboard'])) echo $_SESSION['dashboard']; unset($_SESSION['dashboard']); ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="#" class="<?php if(isset($_SESSION['upload-top'])) echo $_SESSION['upload-top']; unset($_SESSION['upload-top']); ?>"><i class="fa fa-shopping-cart "></i>Assignments <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level <?php if(isset($_SESSION['upload-in'])) echo $_SESSION['upload-in']; unset($_SESSION['upload-in']); ?>">
                            <li>
                                <a href="<?= ROOT ?>admin/my_assignments" class="<?php if(isset($_SESSION['upload'])) echo $_SESSION['upload']; unset($_SESSION['upload']); ?>"><i class="fa fa-upload"></i>My Assignments</a>
                            </li>
                            <li>
                                <a href="<?= ROOT ?>admin/allocate_assignments" class="<?php if(isset($_SESSION['update'])) echo $_SESSION['update']; unset($_SESSION['update']); ?>"><i class="fa fa-refresh "></i>Allocate Assignments</a>
                            </li>
                             
                            
                           
                        </ul>
                    </li>

                    
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner"  style="border-radius:7px;">
                
                <?php if(isset($_SESSION['admin_page'])) include "admin_pages/".strtolower($_SESSION['admin_page']).".php"; ?>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2021 Grocenda | Design By : <a href="http://www.binarytheme.com/" target="_blank">Grocenda Store</a>
    </div>
    <!-- /. FOOTER  -->

     <!-- Modal content begin-->

    <!-- The Modal -->
    <div id="myModal2" class="modal2">
      <!-- Modal content -->
      <div id="modal-container">
        <div class="modal-content">
          <span class="close" id="close2">&times;</span>
          <div id="modal-message">
            <p></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal content end-->

    <!-- The Modal -->
    <div id="myLoader" class="modal2">
      <!-- Modal content -->
      <div id="modal-container2">
        
      </div>
    </div>
    <!-- Modal content end-->

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?= ROOT ?>assets/admin_assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?= ROOT ?>assets/admin_assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?= ROOT ?>assets/admin_assets/js/jquery.metisMenu.js"></script>
    <script src="<?= ROOT ?>js/loader.js"></script>
    <script src="<?= ROOT ?>js/modal.js"></script>
    <script src="<?= ROOT ?>js/cropper.js"></script>
    <script src="<?= ROOT ?>js/croppeer_jsmin.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?= ROOT ?>assets/admin_assets/js/custom.js"></script>
    <script src="<?= ROOT ?>assets/admin_assets/js/admin.js"></script>
    <script src="<?= ROOT ?>assets/admin_assets/summernote/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
          $('#summernote').summernote();
        });
    </script>

</body>
</html>
