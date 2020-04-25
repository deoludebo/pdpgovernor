
<?php
    $pagetitle = 'Overview | PDP Governors Forum';
    $currentPage = 'index';

    include('php/header.php');
?>

<?php
	include 'php/config.php';

	$conn = new mysqli($servername, $username, $password, $db_name);
	$result = $conn -> query("SELECT * FROM history ORDER BY date DESC");
	$history_table = "";
	while($row = $result -> fetch_assoc()) {
		$date = date("Y-m-d", $row["date"]);
		$history_table .= '<div class="history-info">
      <h4 class="title"><span>' . $date . '. </span>' . $row["title"] . '</h4>
      <p>' . $row["description"] . '</p></div>';
	}

  $conn->close();
?>

	<!--=================== PAGE-TITLE ===================-->
	<div class="page-title" style="background-image: url(assets/img/Blur.jpg);">
		<div class="container">
			<h1 class="title-line-left">Our History</h1>
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>Our History</li>
				</ul>
			</div>
		</div>
	</div>
	<!--================= PAGE-TITLE END =================-->


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

							<p>The PDP Governors Forum abbreviated PDPGF is a political and policy think-tank consisting of the state governors affiliated with the Peoples Democratic Party (PDP) in Nigeria. <br><br>

The Forum was formed on 24 February 2013 at the instance of Dr. Goodluck Jonathan, who was the President of the Federal Republic of Nigeria as at that time.<br><br>

The PDPGF aims to provide a platform for its member-governors to interact and exchange knowledge, ideas and experiences about how to move the party forward as well as to better coordinate programmes and policies in their various states.<br><br>

At the maiden meeting of members of the Forum held at the Aso Rock Villa, Abuja, former Governor of Akwa Ibom State, Senator Godswill Akpabio was nominated as the Pioneer Chairman.<br><br>

Speaking after his inauguration as the Forum’s Chairman, Akbabio had said: "The Forum was formed to x-ray the state of affairs of our party. We are of the opinion that we should take steps to set up structures to meet the emerging challenge of APC.”<br><br>

He emphasized that part of the resolution of the group is that they should have continued interaction within the party, the National Working Congress, the Board of Trustees, towards building synergy with the Nigeria Governors’ Forum.</p>

						</div>
        <div class="overview-info-item">
<h5>LIST OF PDPGF CHAIRMEN</h5>
<p>Since the organization's inception in 2013, the positions of chair and deputy chair have been chosen by the Forum members from among their number.
The following is a list of the forum leadership over the years.</p>

    <ol>
      <li>Governor Godswill Akpabio - Akwa Ibom State</li><li>
    Governor Olusegun Mimiko - Ondo State
With Governor Ibrahim Hassan Dankwambo – Gombe State as Vice Chairman

    </li><li>Governor Ayodele Fayose – Ekiti State
With Governor Ibrahim Hassan Dankwambo – Gombe State as Vice Chairman

    </li><li>Governor Ibrahim Hassan Dankwambo – Gombe State

    </li><li>Governor Seriake Henry Dickson – Bayelsa State

    </li><li>Governor Aminu Waziri Tambuwal – Sokoto State
With Governor Okezie Victor Ikpeazu – Abia State as Vice Chairman</li></ol>
<p>The incumbent Chairperson of the Forum, Governor Aminu Waziri Tambuwal took over in January 2020 from Seriake Henry Dickson, the immediate–past chairman of the Forum.</p>

<h5>MEMBERSHIP</h5>

<p>Presently the Forum has fifteen (15) Governors as members.
<br><br>
In alphabetical order of the states, they are:</p>
<ol>
    <li>His Excellency, Dr. Okezie Ikpeazu - Executive Governor, Abia State (Vice Chairman PDP Governors Forum)</li>
    <li>His Excellency, Rt. Hon Ahmadu Umaru Fintiri - Executive Governor, Adamawa State</li>
    <li>His Excellency, Deacon Udom Emmanuel - Executive Governor, Akwa Ibom State</li>
    <li>His Excellency, Sen. Bala Mohammed - Executive Governor, Bauchi State</li>
    <li>His Excellency, Sen. Diri Duoye - Executive Governor, Bayelsa State</li>
    <li>His Excellency, Dr. Samuel Ortom - Executive Governor, Benue State</li>
    <li>His Excellency, Prof. Benedict Ayade - Executive Governor, Cross River State</li>
    <li>His Excellency, Sen. Dr. Ifeanyi Okowa - Executive Governor, Delta State</li>
    <li>His Excellency, Engr. David Umahi - Executive Governor, Ebonyi State</li>
    <li>His Excellency, Rt. Hon. Ifeanyi Ugwuanyi - Executive Governor, Enugu State</li>
    <li>His Excellency, Engr. Seyi Makinde - Executive Governor, Oyo State</li>
    <li>His Excellency, Barr. Nyesom Ezenwo Wike - Executive Governor, Rivers State</li>
    <li>His Excellency, Rt. Hon. Aminu Waziri Tambuwal - Executive Governor, Sokoto State (Chairman PDP Governors Forum)
    <li>His Excellency, Arc. Dairus Ishaku - Executive Governor, Taraba State</li>
    <li>His Excellency, Dr. Bello Mohammed Matawalle - Executive Governor, Zamfara State</li></ol>
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





	<!--===================== FOOTER =====================-->
    <?php
        include('php/footer.php');
    ?>
