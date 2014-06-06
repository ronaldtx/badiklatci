<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title><?php echo TITLEAPP; ?></title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--basic styles-->

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />

    <!--[if IE 7]>
      <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!--page specific plugin styles-->

    <!--fonts-->

    <link rel="stylesheet" href="assets/css/ace-fonts.css" />

    <!--ace styles-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />

    <!--[if lte IE 8]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!--inline styles related to this page-->
  </head>

  <body class="navbar-fixed breadcrumbs-fixed">
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a href="#" class="brand">
            <small>
<!--               <i class="icon-leaf"></i>
 -->              
            </small>
          </a><!--/.brand-->

          <ul class="nav ace-nav pull-right">
            
            <li class="light-blue">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <!-- <img class="nav-user-photo" src="<?php echo base_url(); ?>assets/avatars/user.jpg" alt="Jason's Photo" /> -->
                <span class="user-info">
                  <small>Selamat Datang,</small>
                  <?php echo ucwords($this->session->userdata('UserName')); ?>
                </span>

                <i class="icon-caret-down"></i>
              </a>

              <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
<!--                 <li>
                  <a href="#">
                    <i class="icon-cog"></i>
                    Settings
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="icon-user"></i>
                    Profile
                  </a>
                </li>
 -->
                <li class="divider"></li>

                <li>
                  <a href="<?php echo base_url()."signin/logout" ?>">
                    <i class="icon-off"></i>
                    Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul><!--/.ace-nav-->
        </div><!--/.container-fluid-->
      </div><!--/.navbar-inner-->
    </div>

    <div class="main-container container-fluid">
      <a class="menu-toggler" id="menu-toggler" href="#">
        <span class="menu-text"></span>
      </a>
      <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
      $this->load->view('sidebar');
      ?>

      <div class="main-content">
        <div class="breadcrumbs fixed" id="breadcrumbs">
          <ul class="breadcrumb">
            <li>
              <i class="icon-home home-icon"></i>
              <a href="<?php echo base_url(); ?>">Home</a>
            </li>
            <?php if(isset($breadcrumb))
                    echo $breadcrumb;
                  else
                    echo BREADCRUMBDEF;
            ?>
          </ul>
          <!--.breadcrumb-->

          <!-- <div class="nav-search" id="nav-search">
            <form class="form-search">
              <span class="input-icon">
                <input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
                <i class="icon-search nav-search-icon"></i>
              </span>
            </form>
          </div> --><!--#nav-search-->
        </div>

        <div class="page-content">
          <div class="row-fluid">
            <div class="span12">
              <!--PAGE CONTENT BEGINS-->
