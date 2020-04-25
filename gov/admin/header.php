<?php
  include '../php/config.php';
  $conn = new mysqli($servername, $username, $password, $db_name);

    if (isset($_COOKIE["u_id"])) {
      $id = $_COOKIE["u_id"];
      $stmt = $conn->prepare("SELECT * FROM login_session WHERE login_id=?");
      $stmt->bind_param("s", $id);
      $stmt->execute();
      $result = $stmt -> get_result();
      if ($result -> num_rows <= 0) {
        header("Location: logout.php");
        exit;
      }
    }
    else {
      header("Location: login.php");
      exit;
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

  <!-- Begin page -->
  <div id="layout-wrapper">

    <header id="page-topbar">
      <div class="navbar-header">
        <!-- LOGO -->
        <div class="navbar-brand-box d-flex align-items-left">
          <a href="index.php" class="logo">
            <img src="../assets/img/pdp.png" alt="" style="max-height: 60px; background: white">
          </a>

          <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect waves-light" id="vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
          </button>
        </div>
      </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

      <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
          <!-- Left Menu Start -->
          <ul class="metismenu list-unstyled" id="side-menu">

            <li>
              <a href="index.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span>Manage Governors</span></a>
            </li>
            <li>
              <a href="edit-governors.php" class="waves-effect"><i class="mdi mdi-plus-box"></i><span>Add Governor</span></a>
            </li>
            <li>
              <a href="users.php" class="waves-effect"><i class="mdi mdi-account-plus"></i><span>Manage Users</span></a>
            </li>
            <li>
              <a href="subscribers.php" class="waves-effect"><i class="mdi mdi-message"></i><span>View Subscribers</span></a>
            </li>
            <li>
              <a href="gallery.php" class="waves-effect"><i class="mdi mdi-image"></i><span>Manage Gallery</span></a>
            </li>
            <!-- <li>
              <a href="documents.php" class="waves-effect"><i class="mdi mdi-file-document-box-plus"></i><span>Add Document</span></a>
            </li> -->
            <li>
              <a href="events.php" class="waves-effect"><i class="mdi mdi-cloud-search"></i><span>View Events</span></a>
            </li>
            <li>
              <a href="edit-event.php" class="waves-effect"><i class="mdi mdi-map-marker-multiple"></i><span>Add Event</span></a>
            </li>
            <!-- <li>
              <a href="history.php" class="waves-effect"><i class="mdi mdi-history"></i><span>History</span></a>
            </li> -->
            <li>
              <a href="info.php" class="waves-effect"><i class="mdi mdi-information"></i><span>Edit Info</span></a>
            </li>
            <li>
              <a href="states.php" class="waves-effect"><i class="mdi mdi-routes"></i><span>View States</span></a>
            </li>
             <li>
              <a href="edit-state.php" class="waves-effect"><i class="mdi mdi-cogs"></i><span>Edit States</span></a>
            </li>
            <li>
              <a href="news.php" class="waves-effect"><i class="mdi mdi-newspaper"></i><span>View News</span></a>
            </li>
            <li>
              <a href="edit-news.php" class="waves-effect"><i class="mdi mdi-file-document-box-plus"></i><span>Edit News</span></a>
            </li>
            <li>
              <a href="logout.php" class="waves-effect"><i class="mdi mdi-power"></i><span>Logout</span></a>
            </li>
          </ul>
        </div>
        <!-- Sidebar -->
      </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18"><?php echo $pagetitle; ?></h4>
              </div>
            </div>
          </div>
          <!-- end page title -->
