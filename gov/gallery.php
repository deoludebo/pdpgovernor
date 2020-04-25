<?php
    $pagetitle = 'Gallery';
    $currentPage = 'gallery';

    include('php/header.php');
?>

<?php
	include 'php/config.php';

	$conn = new mysqli($servername, $username, $password, $db_name);

  $gallery_type = "Photo";
  $g_t = 1;
  if (isset($_GET["type"])) {
    if ($_GET["type"] == "video") {
      $gallery_type = "Video";
      $g_t = 2;
    }
    else {
      header("Location: gallery.php");
    }
  }
  $page_header = '<h1 class="title-line-left">'. $gallery_type. ' Gallery</h1>
  <div class="breadcrumbs">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li>'. $gallery_type. ' Gallery</li>
    </ul>
  </div>';

  $result = $conn -> query("SELECT * FROM gallery WHERE type=" . $g_t);
  $gallery = '<h2 class="title-line">'. $gallery_type. ' Gallery</h2>
    <div class="row team-cover">';
    while($row = $result -> fetch_assoc()) {
      $gallery .= '<div class="col-6 col-sm-6 team-item">
        <a href="#" class="team-img">
          <img src="' . $row["src"] . '" alt="state">
        </a>
        <p>' . $row["caption"] . '</p></div>';
    }
    $gallery .= "</div>";
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
<!--=================== S-OUR-TEAM ===================-->
	<section class="s-our-team about-team speakers-our-team">
		<div class="our-team-bg" style="background-image: url(assets/img/bg-team-about.svg);"></div>
		<div class="container" align="left">
      <div>
				<?php
          echo $gallery;
         ?>
		   </div>
		</div>
	</section>
	<!--================= S-OUR-TEAM END =================-->
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
