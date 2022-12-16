<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Exam Assist | Dashboard</title>
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/title.png'); ?>" />

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bootstrap/css/bootstrap.min.css">
  <!-- Bootstrap Toggle -->
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/fullcalendar/fullcalendar.min.css">
  <!-- Graph -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- Close Graph -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/select2/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <link rel="stylesheet" href="<?php echo base_url('assets/');?>documentation/style.css">
   <!-- froala - text editor -->
   <link href="<?php echo base_url('assets/');?>plugins/froala/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url('assets/');?>plugins/froala/css/froala_style.min.css" rel="stylesheet" type="text/css" />

   <script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-3.1.1.js"></script> 
   <!-- Bootstrap 3.3.6 -->
   <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
   <!-- Bootstrap Toggle -->
   <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
   
   <script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
   <script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
   <!-- jQuery Knob Chart -->
   <script src="<?php echo base_url();?>assets/plugins/knob/jquery.knob.js"></script>
   <!-- daterangepicker -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
   <script src="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
   <!-- datepicker -->
   <script src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
   <!-- Bootstrap WYSIHTML5 -->
   <script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
   <!-- Slimscroll -->
   <script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
   <!-- FastClick -->
   <script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.js"></script>
   <!-- AdminLTE App -->
   <script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="<?php echo base_url();?>assets/dist/js/pages/dashboard.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
   <style type="text/css">
     .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
          background-color: #B0B3BA;
          border-color: #B0B3BA;
      }
   </style>
 </head>
 
 <body class="hold-transition skin-red-light sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo" style="padding: 0; background-color: #B0B3BA">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b style="color:#fff;">E</b><b style="color: #000;">A</b></span>
        <!-- logo for regular state and mobile devices -->
        <!-- <span class="logo-lg"><b> <img src="<?php  echo base_url(); ?>assets/images/logo2.png"/></b></span> -->
        <span class="logo-lg" style="border: 1px solid gray; background-color: #B0B3BA; padding-top: -5px">
            <b>Exam</b> <b style="color: red;">Assist</b>
        </span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" style="background-color: #B0B3BA">
        <!-- Sidebar toggle button-->
        <a href="#" style="color: #000; background-color: #B0B3BA" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="<?php echo base_url()?>auth/logout">
                <img src="<?php echo base_url();?>assets/dist/img/person.png" class="user-image" alt="User Image">
                <span class="hidden-xs" style="color: #000">Log Out</span>
              </a>
            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url();?>assets/dist/img/person2.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name'); ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->lang->line('header_online'); ?></a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header"><?php echo $this->lang->line('header_main_navidation'); ?></li>
          <li class="active treeview">
            <a href="<?php echo base_url();?>auth/dashboard">
              <i class="fa fa-dashboard"></i> 
              <span><?php echo $this->lang->line('header_dashboard'); ?></span>
              <span class="pull-right-container">
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </span>
            </a>
          </li>
          
          <li class="treeview">
            <a href="#" onclick="location.href = '<?php echo base_url("exam/exam_list");?>';">
              <i class="fa fa-cube text-blue"></i>
              <span><?php echo $this->lang->line('header_exam') ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right text-blue"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('exam/exam_list');?>"><i class="fa fa-circle-o text-green"></i>List</a></li>
              <li><a href="<?php echo base_url('exam/configure');?>"><i class="fa fa-circle-o text-yellow"></i>Configure Exam</a></li>
            </ul>
          </li>
            
          <li class="treeview">
            <a href="#">
              <i class="fa fa-file text-yellow"></i>
              <span><?php echo $this->lang->line('header_reports'); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right text-yellow"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="<?php echo base_url('reports/student_progress'); ?>">
                  <i class="fa fa-cube text-red"></i>
                  <span>Student Progress</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- submit button loader -->
    <style type="text/css">
      .button {
        position: relative;
        display: inline-block;
        text-align: center;
        padding: 1.6rem 3.125rem;
        border-radius: 0.3125rem;
        color: #000;
        font-weight: 400;
        overflow: hidden;
      }
      .button:before{
        position: absolute;
        content: '';
        bottom: 0;
        left: 0;
        width: 0%;
        height: 100%;
        background-color: #54d98c;
      }
      .button span {
        position: absolute;
        line-height: 0;
      }
      .button span i {
        transform-origin: center center;
      }
      .button span:nth-of-type(1) {
        top: 50%;
        transform: translateY(-50%);
      }
      .button span:nth-of-type(2) {
        top: 100%;
        transform: translateY(0%);
        font-size: 24px;
      }
      .button span:nth-of-type(3) {
        display: none;
      }
      .button.active {
        background-color: #2ecc71;
      }
      .button.active:before {
        width: 100%;
        transition: width 2.5s linear;
      }
      .button.active span:nth-of-type(1) {
        top: -100%;
        transform: translateY(-50%);
      }
      .button.active span:nth-of-type(2) {
        top: 50%;
        transform: translateY(-50%);
      }
      .button.active span:nth-of-type(2) i {
        animation: loading 1000ms linear infinite;
      }
      .button.active span:nth-of-type(3) {
        display: none;
      }
      @keyframes loading {
        100% {
          transform: rotate(360deg);
        }
      }
      @keyframes scale {
        0% {
          transform: scale(10);
        }
        50% {
          transform: scale(0.2);
        }
        70% {
          transform: scale(1.2);
        }
        90% {
          transform: scale(0.7);
        }
        100% {
          transform: scale(1);
        }
      }
    </style>
    <!-- submit button loader -->