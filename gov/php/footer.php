<?php
	include 'php/config.php';

	$conn = new mysqli($servername, $username, $password, $db_name);
	$result = $conn -> query("SELECT * FROM gallery WHERE type=1 ORDER BY date DESC LIMIT 6");
	$gallery_table = "";
	while($row = $result -> fetch_assoc()) {
		$gallery_table .= '<li><img class="lazy" src="' . $row["src"] . '" alt="social"></li>';
	}

	$conn->close();
?>

<!--===================== FOOTER =====================-->
<footer>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<a href="index.php" class="logo-footer">
						<img src="assets/img/pdp.png" alt="logo" style="width: 100% !important">
					</a>
					<div class="footer-text">The PDP Governors Forum or PDPGF is a political and policy think tank consisting of the state governors affiliated with the People's Democratic Party in Nigeria</div>
					<ul class="soc-link">
						<li><a target="_blank" href="https://www.facebook.com/pdpgovernorsforum"><i class="fab fa-facebook-f"></i></a></li>
						<li><a target="_blank" href="https://twitter.com/pdpgovernorsforum"><i class="fab fa-twitter"></i></a></li>
						<li><a target="_blank" href="https://www.instagram.com/pdpgovernorsforum"><i class="fab fa-instagram"></i></a></li>
						<li><a target="_blank" href="https://www.youtube.com"><i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>
				<div class="col-12 col-sm-6 col-md-4">
					<h6>Contacts</h6>
					<ul class="footer-contacts">
						<li>
							<i class="fas fa-map-marker-alt"></i>
							<a href="contacts.html">Legacy House, Plot 2774, Shehu Shagari Way, Maitama, Abuja
						</li>
						<li>
							<i class="fa fa-phone" aria-hidden="true"></i>
							<a href="tel:08001234567">+234-800-1234-567</a>
						</li>
						<li>
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<a href="mailto:info@pdpgovernorsforum.com">info@pdpgovernorsforum.com</a>
						</li>
					</ul>
				</div>
				<div class="col-12 col-sm-6 col-md-4 insta-list-cover">
					<h6>Gallery</h6>
					<ul class="insta-list">
						<?php echo $gallery_table; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-5"><div class="copyright">&copy; <?php echo date('Y');?> PDP Governors Forum, Powered by Detailwoks.</div></div>
					<div class="col-7">
						<ul class="footer-menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About us</a></li>
							<li><a href="events.php">Events</a></li>
							<li><a href="help.php">Help Desk</a></li>
							<li><a href="contacts.php">Contacts</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--=================== FOOTER END ===================-->

	<!--===================== TO TOP =====================-->
	<a class="to-top" href="#home">
		<i class="fa fa-chevron-up" aria-hidden="true"></i>
	</a>
	<!--=================== TO TOP END ===================-->

	<!--===================== SCRIPT	=====================-->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
	<script src="assets/js/slick.min.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/mapdata.js"></script>
  <script src="assets/js/countrymap.js"></script>
</body>
</html>
