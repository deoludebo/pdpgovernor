
<?php
    $pagetitle = 'Contact  | PDP Governors Forum';
    $currentPage = 'index';

    include('php/header.php');
?>

	<!--=================== PAGE-TITLE ===================-->
	<div class="page-title" style="background-image: url(assets/img/Blur.jpg);">
		<div class="container">
			<h1 class="title-line-left">Contacts</h1>
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>Contacts</li>
				</ul>
			</div>
		</div>
	</div>
	<!--================= PAGE-TITLE END =================-->

	<!--================= PAGE-CONTACTS =================-->
	<section class="page-contacts">
		<div class="container">
			<h2 class="title-line-left">Get in Touch</h2>
			<div class="row">
				<div class="col-12 col-sm-8">
					<form id='contactform' action="php/contact.php" name="contactform">
						<ul class="form-cover">
							<li class="inp-name"><input id="name" type="text" name="your-name" placeholder="Name"></li>
							<li class="inp-name"><input id="last-name" type="text" name="your-last-name" placeholder="Last Name"></li>
							<li class="inp-phone"><input id="phone" type="tel" name="your-phone" placeholder="Phone"></li>
							<li class="inp-email"><input id="email" type="email" name="your-email" placeholder="E-mail"></li>
							<li class="inp-text"><textarea id="comments" name="your-text" placeholder="Message"></textarea></li>
						</ul>
						<div class="checkbox-wrap">
							<div class="checkbox-cover">
								<input type="checkbox">
								<p>By using this form you agree with the storage and handling of your data by this website.</p>
							</div>
						</div>
						<div class="btn-form-cover">
							<button id="#submit" type="submit" class="btn">Send </button>
						</div>
					</form>
					<div id="message"></div>
				</div>
				<div class="col-12 col-sm-4 page-cont-info">
					<div class="cont-info-item">
						<i class="fas fa-map-marker-alt"></i>
						<h5>Address</h5>
						<p>PDP Secretariat Wadata Plaza  <br>Wuse Zone, 5, Abuja</p>
					</div>
					<div class="cont-info-item">
						<i class="fa fa-phone" aria-hidden="true"></i>
						<h5>Phones</h5>
						<ul class="cont-phone">
							<li><a href="tel:08008763765">+234-800-8763-765</a></li>
						</ul>
					</div>
					<div class="cont-info-item">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<h5>Email</h5>
						<ul class="cont-email">
							<li><a href="mailto:info@pdpgovernorsforum.com">info@pdpgovernorsforum.com</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================= PAGE-CONTACTS END =================-->

	<!--===================== S-MAP =====================-->
	<section class="s-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.993704093199!2d7.45497861478691!3d9.064336993496333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0b23cdcb5643%3A0x576d5283fd218447!2sPeoples%20Democratic%20Party!5e0!3m2!1sen!2sng!4v1584689493678!5m2!1sen!2sng"  width= "1920" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</section>
	<!--==================== S-MAP END ===================-->


<?php

    include('php/footer.php');
?>
