<?php
 require '../includes/config.php';
//settings
 session_start();
if(!isset($_SESSION['aid']))
{
  header("Location: signin");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $page_name." | Admin Panel | ".$option['website_name']; ?></title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index"><?php echo $option['website_name']; ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
	  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="website-option">
            <span class="nav-link-text">Website Settings</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="all-contents">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Website Content</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="dhistory">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Deposits</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="whistory">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Withdrawals</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
         <a class="nav-link" href="lhistory">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Loans</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
         <a class="nav-link" href="all-users">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="view-tickets">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Support</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
		
	  
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <span style="color:white;"><?php echo $_SESSION['admin_name']; ?></span> (<i class="fa fa-fw fa-sign-out"></i>Logout)</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $page_name; ?></li>
      </ol>