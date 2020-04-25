<?php
	include 'php/config.php';

	$conn = new mysqli($servername, $username, $password, $db_name);
	$result = $conn -> query("SELECT * FROM history ORDER BY date DESC LIMIT 4");
	$history_table = "";
	while($row = $result -> fetch_assoc()) {
		$date = date("Y-m-d", $row["date"]);
		$history_table .= '<div class="history-info">
      <h4 class="title"><span>' . $date . '. </span>' . $row["title"] . '</h4>
      <p>' . $row["description"] . '</p></div>';
	}

  $num_governors = $conn -> query("SELECT * FROM governors") -> num_rows;

	$result = $conn -> query("SELECT * FROM info ORDER BY id ASC");
	$result_arr = [];
	while($row = $result -> fetch_assoc()) {
		array_push($result_arr, $row["value"]);
	}

	$conn->close();
?>

<?php
    $pagetitle = 'Overview | PDP Governors Forum';
    $currentPage = 'index';

    include('php/header.php');
?>

	<!--=================== PAGE-TITLE ===================-->
	<div class="page-title" style="background-image: url(assets/img/Blur.jpg);">
		<div class="container">
			<h1 class="title-line-left">About Us</h1>
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>About Us</li>
				</ul>
			</div>
		</div>
	</div>
	<!--================= PAGE-TITLE END =================-->

	<!--==================== OVERVIEW ====================-->
	<section class="overview">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="overview-info">
                        <h2 class="title-line-left">Overview</h2>
                        <div class="overview-info-item">
							<h5>Brief Overview</h5>
							<p>The PDP Governors Forum or PDPGF is a political and policy think tank consisting of the
state governors affiliated with the People's Democratic Party in Nigeria</p>
						</div>
						<div class="overview-info-item">
							<h5>Inception Since 2013</h5>
							<p>The Forum was formed on 24 February 2013 when it split away from the Nigeria Governors Forum (NGF).</p>

						</div>
                        <div class="overview-info-item">
							<h5>Our Mission</h5>
							<p>The PDPGF aims to provide a platform for governors to interact and exchange knowledge, ideas and experiences about how to move the party forward as well as to better coordinate programmes and policies in their various states. </p>

						</div>

					</div>
				</div>
				<div class="col-12 col-md-6 overview-img-cover">
					<div class="overview-img-cover">
						<div class="overview-img">
							<img src="assets/img/ik.jpg" alt="img">
							<img src="assets/img/dg1.jpg" alt="img">
						</div>
						<div class="overview-img">
							<img src="assets/img/tam.jpg" alt="img">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================== OVERVIEW END ==================-->
	<!--================= OUR-HISTORY END =================-->
	<section class="our-history s-title-bg">
		<span class="title-bg">Our History</span>
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-6">
					<div class="our-history-left">
						<h2 class="title-line-left">Our History</h2>
						<div class="overview-info-item">
							<p>The Forum was formed on 24 February 2013 when it split away from the Nigeria Governors Forum (NGF).</p>

						</div>
						<div class="overview-info-item">
							<h5>Our Leadership</h5>
							<p>The Forum is led by a Chairperson, currently Aminu Waziri Tambuwal. He took over in January 2020 from Seriake Dickson the previous chairman of the Forum. </p>
                        </div>
                        <div class="overview-info-item">
							<h5>Director General</h5>
							<p>The PDP Governors Forum (PDP-GF) has appointed Hon CID Maduabum as the Director-General of the Forum.

This is sequel to a resolution of the Forum in June 2019 which was reconfirmed on 26th January 2020. </p>
                        </div>
                        <BR>
                        <div >
					<a class="team-img">
                        <figure>
						<img src="assets/img/WA0008.jpg" alt="From left: Hon. CID Maduabum, newly-appointed Director-General of PDP Governors Forum; Mary Beth Leonard, United States ambassador to Nigeria; Gov. Aminu Waziri Tambuwal, Chairman of the PDP-GF; Kathleen FitzGibbon, Deputy Chief of Mission, US embassy Nigeria; Mr Fabian Okoye, Special Adviser International Cooperation to Gov. Tambuwal, and Stephen Haykin, USAID Mission Director, when Gov. Tambuwal visited the US ambassador in Abuja">
                        <figcaption>From left: Hon. CID Maduabum, newly-appointed Director-General of PDP Governors Forum; Mary Beth Leonard, United States ambassador to Nigeria; Gov. Aminu Waziri Tambuwal, Chairman of the PDP-GF; Kathleen FitzGibbon, Deputy Chief of Mission, US embassy Nigeria; Mr Fabian Okoye, Special Adviser International Cooperation to Gov. Tambuwal, and Stephen Haykin, USAID Mission Director, when Gov. Tambuwal visited the US ambassador in Abuja</figcaption>
                    </figure>
                    </a>

				</div>

					</div>
				</div>
				<div class="col-12 col-sm-6">
					<div class="history-info-cover">
            <?php echo $history_table; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================= OUR-HISTORY END =================-->

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

	<!--==================== S-COUNTER ====================-->
	<section class="s-counter counter-animate counter-active s-bg">
		<div class="mask" style="background-image: url(assets/img/bg-effect-counter.svg);"></div>
		<div class="container">
			<div class="row counter-cover">
				<div class="col-6 col-sm-3 counter-item">
					<div class="counter-number"><span data-number="<?php echo $num_governors; ?>">0</span></div>
					<h5>Governors</h5>
				</div>
				<div class="col-6 col-sm-3 counter-item">
					<div class="counter-number"><span data-number="<?php echo $result_arr[0]; ?>">0</span></div>
					<h5>Director General</h5>
				</div>
				<div class="col-6 col-sm-3 counter-item">
					<div class="counter-number"><span data-number="<?php echo $result_arr[1]; ?>">0</span></div>
					<h5>Deliberations</h5>
				</div>
				<div class="col-6 col-sm-3 counter-item">
					<div class="counter-number"><span data-number="<?php echo $result_arr[2]; ?>">0</span></div>
					<h5>Resolved Issues</h5>
				</div>
			</div>
		</div>
	</section>
	<!--================== S-COUNTER END ==================-->

	<!--===================== FOOTER =====================-->
    <?php
        include('php/footer.php');
    ?>
