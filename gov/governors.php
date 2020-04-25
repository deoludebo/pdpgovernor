<?php
    $pagetitle = 'Our Governors';
    $currentPage = 'index';

    include('php/header.php');
?>

<?php
	include 'php/config.php';

	$conn = new mysqli($servername, $username, $password, $db_name);

  $governor_image = '<div class="col-12">
  <h1 class="title-line-left">Governors</h1>
  <div class="breadcrumbs">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li>Our Governors</li>
    </ul>
  </div>
  </div>';
  if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM governors WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt -> get_result();
    if ($result -> num_rows > 0)
    {
      while($row = $result -> fetch_assoc()) {
        $social_links = '<li><a target="_blank" href="governors.php?id=' . $row["id"] . '"><i class="fas fa-link"></i></a></li>';
        if ($row["facebook"] != "") {
          $social_links .= '<li><a target="_blank" href="' . $row["facebook"] . '"><i class="fab fa-facebook-f"></i></a></li>';
        }
        if ($row["twitter"] != "") {
          $social_links .= '<li><a target="_blank" href="' . $row["twitter"] . '"><i class="fab fa-twitter"></i></a></li>';
        }
        if ($row["linkedin"] != "") {
          $social_links .= '<li><a target="_blank" href="' . $row["linkedin"] . '"><i class="fab fa-linkedin"></i></a></li>';
        }
        if ($row["site"] != "") {
          $social_links .= '<li><a target="_blank" href="' . $row["site"] . '"><i class="fas fa-link"></i></a></li>';
        }
        $governors_table = '<div class="col-lg-10"><h5>' . $row["post"] . '</h5>
    		<h2>His Excellency ' . $row["name"] . '</h2>
    			<h4 class="title-line-left">' . $row["title"] . '</h4>
          <p>' . $row["bio"] . '</p><br><br>' . $row["full_bio"] . '</div>';
        $governor_image = '<div class="col-lg-8 col-md-12">
  			<h1 style="color: white">' . $row["name"] . '</h1>
  			<div class="breadcrumbs">
  				<ul>
  					<li><a href="index.php">Home</a></li>
  					<li><a href="governors.php">Governors</a></li>
  					<li>' . $row["name"] . '</li>
  				</ul>
  			</div>
  			</div><div class="col-lg-4 col-md-12" align="right" style="margin-top: 10px">
          <img src="' . $row["picture"] . '" style="max-height: 200px">
  		  </div>';
      }
    }
    else {
      header("Location: governors.php");
    }
  }
  else {
    $result = $conn -> query("SELECT * FROM governors");
    $governors_table = '<h2 class="title-line">Our Governors</h2>
    <p class="slogan">Get to know more about Nigeria\'s Top Performing Governors.</p>
    <div class="row team-cover">';
    while($row = $result -> fetch_assoc()) {
      $social_links = '<li><a target="_blank" href="governors.php?id=' . $row["id"] . '"><i class="fas fa-link"></i></a></li>';
      if ($row["facebook"] != "") {
        $social_links .= '<li><a target="_blank" href="' . $row["facebook"] . '"><i class="fab fa-facebook-f"></i></a></li>';
      }
      if ($row["twitter"] != "") {
        $social_links .= '<li><a target="_blank" href="' . $row["twitter"] . '"><i class="fab fa-twitter"></i></a></li>';
      }
      if ($row["linkedin"] != "") {
        $social_links .= '<li><a target="_blank" href="' . $row["linkedin"] . '"><i class="fab fa-linkedin"></i></a></li>';
      }
      if ($row["site"] != "") {
        $social_links .= '<li><a target="_blank" href="' . $row["site"] . '"><i class="fas fa-link"></i></a></li>';
      }
      $governors_table .= '<div class="col-6 col-sm-4 team-item">
        <a href="governors.php?id=' . $row["id"] . '" class="team-img">
          <img src="' . $row["picture"] . '" alt="state">
        </a>
        <h4 class="title"><a href="governors.php?id=' . $row["id"] . '">' . $row["name"] . '</a></h4><p>' . $row["bio"] . '</p>
        <ul class="soc-link">
          ' . $social_links . '
        </ul>
      </div>';
    }
    $governors_table .= "</div>";
  }
?>

	<!--=================== PAGE-TITLE ===================-->
	<div class="page-title" style="background-image: url(assets/img/Blur.jpg);">
		<div class="container row" style="flex-direction: row">
      <?php
        echo $governor_image;
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
          echo $governors_table;
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
