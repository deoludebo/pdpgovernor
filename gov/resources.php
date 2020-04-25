<?php
    $pagetitle = 'Gallery | PDP Governors Forum';
    $currentPage = 'resources';

    include('php/header.php');
?>

<?php
	include 'php/config.php';

	$conn = new mysqli($servername, $username, $password, $db_name);

  $resources_type = "PDPGF";
  if (isset($_GET["type"])) {
    if ($_GET["type"] == "external") {
      $resources_type = "External";
    }
    else {
      header("Location: resources.php");
    }
  }
  $page_header = '<h1 class="title-line-left">'. $resources_type. ' Resources</h1>
  <div class="breadcrumbs">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li>'. $resources_type. ' Resources</li>
    </ul>
  </div>';
?>

<!--=================== PAGE-TITLE ===================-->
<div class="page-title" style="background-image: url(assets/img/Blur.jpg);">
  <div class="container">
    <?php
      echo $page_header;
    ?>
  </div>
</div>
<!--================= PAGE-TITLE END =================-->

  <section>
    <div class="container" style="padding-top: 50px">
      <div class="row">
        <div class="col-12 col-md-4 about-info">
          <div class="col-lg-12 col-md-12">
            <h2 class="title-line-left">OUR STATES</h2>
            <a href="states.php" class="btn btn-yellow">EXPLORE STATES</a>
          </div>
          <div class="col-lg-12 col-md-12">
            <button style="color: white; background: #88a4bc; padding: 10px 40px">OTHER STATES</button>
          </div>
          <div class="col-lg-12 col-md-12">
            <button style="color: white; background: #07923c; padding: 10px 40px">PDP STATES</button>
          </div>
        </div>
        <div class="col-12 col-md-8" id="map" align="center" style="margin-top: 10px">
        </div>
        <style>
          tspan {
            display: none
          }
        </style>
      </div>
    </div>
  </section>


	<?php

    include('php/footer.php');
?>
