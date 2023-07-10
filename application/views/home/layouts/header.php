<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
    <head>
        <meta charset="utf-8" />
        <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
        />

        <title><?= $this->renderSection('title') ?></title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
        <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
        />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/boxicons.css')?>" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/core.css')?>" class="template-customizer-core-css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/theme-default.css')?>" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css')?>" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')?>" />

        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="<?php echo base_url('assets/vendor/css/pages/page-auth.css')?>" />
        <!-- Helpers -->
        <script src="<?php echo base_url('assets/vendor/js/helpers.js')?>"></script>

        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="<?php echo base_url('assets/js/config.js')?>"></script>
    </head>

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Layout container -->
                <div class="layout-page">
          
                    <!-- Navbar -->
                    <?php include "navbar.php" ?>
                    
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                    
                    </div>
                    
                    <!-- Footer -->
                    <?php include 'footer.php' ?>
                </div>
            </div>
        </div>

    </body>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo base_url('assets/vendor/libs/jquery/jquery.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/libs/popper/popper.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/js/bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')?>"></script>

    <script src="<?php echo base_url('assets/vendor/js/menu.js')?>"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo base_url('assets/vendor/libs/apex-charts/apexcharts.js')?>"></script>

    <!-- Main JS -->
    <script src="<?php echo base_url('assets/js/main.js')?>"></script>

    <!-- Page JS -->
    <script src="<?php echo base_url('assets/js/dashboards-analytics.js')?>"></script>
    <script src="<?php echo base_url('assets/js/ui-modals.js')?>"></script>
    <script src="<?php echo base_url('assets/js/masonry.pkgd.min.js')?>"></script>
</html>