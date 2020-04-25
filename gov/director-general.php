
<?php
    $pagetitle = 'Director General | PDP Governors Forum';
    $currentPage = 'director-general';

    include('php/header.php');
?>

	<!--=================== PAGE-TITLE ===================-->
	<div class="page-title" style="background-image: url(assets/img/Blur.jpg);">
		<div class="container">
			<h1 class="title-line-left">Director General</h1>
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>Director General</li>
				</ul>
			</div>
		</div>
	</div>
	<!--================= PAGE-TITLE END =================-->

	<!--=================== OUR-SPEAKERS ===================-->
	<section class="our-speakers">
		<div class="container">

			<div class="our-speakers-cover">
				<div class="speaker-item">
					<div class="speaker-item-img">
						<img src="assets/img/dg.jpg" alt="img">
					</div>
					<div class="speaker-item-content">
						<h3>HON. C.I.D. MADUABUM, LL.M, MNIM</h3>
						<div class="prof">Director General PDP Governors' Forum</div>
						<p>Hon Maduabum is a Masters Degree holder in law, a legal practitioner of 35 years, a former two-term member of the House of Representatives, a former Deputy Chief of Staff and Chief of Staff to former presiding officers in the National Assembly. He is an experienced administrator.</p>

					</div>
				</div>
				<div class="speaker-item">

					<div>
						<ul>
						<ol>Special Assistant to the Honourable Minister of Science and Technology : 1993 -1995</ol>
                        <p>Special Assistant to the Honourable Minister Special Duties 1 The Presidency : 1995</p>
                        <p>Chairman Nigerian Copyright Commission : 2001-2002</p>
                        <p>Hon. Commissioner for Commerce,Cooperatives and Tourism Anambra State: March 2002 - November 2002</p>
                        <p>Deputy Chairman, House Committee on Judiciary National Assembly, Abuja : 2005 - 2007</p>
                        <p>Member, House Committee on Population, Marine Transport,Health, Science & Technology,
                        Narcotic Drugs & Financial Crimes,Emergency & Disaster Management,and Commerce : 2005 - 2007</p>
                        <p>Chairman, House Committee on Public Petitions : 2007 - 2011</p>
                        <p>Chief of Staff to Deputy Speaker House of Representatives National Assembly, Abuja : 2011-2015</p>
                        <p>Deputy Chief of Staff to Speaker House of Representatives National Assembly, Abuja: 2015 - 2019</p>
</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================= OUR-SPEAKERS END =================-->
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
