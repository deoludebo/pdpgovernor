<?php
    $pagetitle = 'Our States';
    $currentPage = 'index';

    include('php/header.php');
?>

<?php
	include 'php/config.php';

	$conn = new mysqli($servername, $username, $password, $db_name);

  if (isset($_GET["state"])) {
    $id = $_GET['state'];
    $stmt = $conn->prepare("SELECT * FROM states WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt -> get_result();
    if ($result -> num_rows > 0)
    {
      while($row = $result -> fetch_assoc()) {
        $page_data = '<!--=================== PAGE-TITLE ===================-->
      	<div class="page-title" style="background-image: url(assets/img/Blur.jpg);">
      		<div class="container">
      			<h1 class="title-line-left">' . $row["name"] . ' State</h1>
      			<div class="breadcrumbs">
      				<ul>
      					<li><a href="index.php">Home</a></li>
      					<li><a href="states.php">States</a></li>
      					<li><a>' . $row["name"] . ' State</a></li>
      				</ul>
      			</div>
      		</div>
      	</div>
      	<!--================= PAGE-TITLE END =================-->

        <!--================ ABOUT-THE-COURSE ================-->
      	<section class="about-the-course" style="padding-top: 50px">
      		<div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-3 col-md-6">
                <img src="' . $row["image"] . '">
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-10">
                ' . $row["info"] . '
              </div>
            </div>
      		</div>
      	</section>
      	<!--============== ABOUT-THE-COURSE END ==============-->';
      }
    }
    else {
      header("Location: states.php");
      exit;
    }
  }
  else{
    $result = $conn -> query("SELECT * FROM states");
    $states_table = "";
    while($row = $result -> fetch_assoc()) {
      $states_table .= '<div class="col-6 col-sm-4 team-item">
        <a href="states.php?state=' . $row["id"] . '" class="team-img">
          <img src="' . $row["image"] . '" alt="state">
        </a>
        <h4 class="title"><a href="states.php?state=' . $row["id"] . '">' . $row["name"] . ' State</a></h4>
        <ul class="soc-link">
          <li><a target="_blank" href="states.php?state=' . $row["id"] . '"><i class="fas fa-link"></i></a></li>
        </ul>
      </div>';
    }
    $page_data = '<!--=================== PAGE-TITLE ===================-->
  	<div class="page-title" style="background-image: url(assets/img/Blur.jpg);">
  		<div class="container">
  			<h1 class="title-line-left">Our States</h1>
  			<div class="breadcrumbs">
  				<ul>
  					<li><a href="index.php">Home</a></li>
  					<li>Our States</li>
  				</ul>
  			</div>
  		</div>
  	</div>
  	<!--================= PAGE-TITLE END =================-->
  <!--=================== S-OUR-TEAM ===================-->
  	<section class="s-our-team about-team speakers-our-team">
  		<div class="our-team-bg" style="background-image: url(assets/img/bg-team-about.svg);"></div>
  		<div class="container">
  			<h2 class="title-line">Our States</h2>
  			<p class="slogan">Get to know more about Nigeria\'s Top Performing States.</p>
  			<div class="row team-cover">
  				' . $states_table . '
  			</div>
  		</div>
  	</section>
  	<!--================= S-OUR-TEAM END =================-->';
  }

  $conn->close();
  echo $page_data;
?>
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
