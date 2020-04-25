<?php
    $pagetitle = 'Home | PDP Governors Forum';
    $currentPage = 'index';

    include('php/header.php');
?>

<?php
  include 'php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);

  if (isset($_POST["email"])) {
    $date = time();
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO subscribers (email, date) VALUES (?, ?)");
    $stmt->bind_param("si", $email, $date);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('You have subscribed to PDP Governors Forum');</script>";
  }

  $result = $conn -> query("SELECT * FROM governors");
  $governors_table = "";
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
    $governors_table .= '<div class="speaker-item"><div class="speaker-item-img"><a target="_blank" href="governors.php?id=' . $row["id"] . '"><img class="lazy" src="' . $row["picture"] . '" alt="img" style="display: block;"></a></div><div class="speaker-item-content"><h3>' . $row["name"] . '</h3><div class="prof"><h5>' . $row["post"] . '</h5></div><div class="prof">' . $row["title"] . '</div><p>' . $row["bio"] . '</p><ul class="soc-link">' . $social_links . '</ul></div></div>';
  }

  $result = $conn -> query("SELECT * FROM news ORDER BY date DESC LIMIT 10");
  $news_table = "";
  while($row = $result -> fetch_assoc()) {
    $date = date("Y-m-d", $row["date"]);
    $news_table .= '<div class="speaker-item">
      <div class="speaker-item-img">
        <a href="news.php?id=' . $row["id"] . '"><img class="lazy" src="' . $row["image"] . '" alt="img" style="display: block;"></a>
      </div>
      <div class="speaker-item-content post-item-cover">
        <a href="news.php?id=' . $row["id"] . '"><h3 class="text-green">' . $row["title"] . '</h3></a>
        <p>' . $row["intro"] . '</p>
        <div class="meta">
            <span class="post-by"><i class="fa fa-user" aria-hidden="true"></i>By <a href="#">' . $row["poster"] . '</a></span>
            <span class="post-date"><i class="fas fa-calendar-alt" aria-hidden="true"></i><a href="#">' . $date . '</a></span>
            <span class="post-category"><i class="fas fa-tag" aria-hidden="true"></i><a href="#">' . $row["tag"] . '</a></span>
          </div>
      </div>
	</div>';
	

	
  }
 

	

  $conn->close();
?>

	<!--==================== MAIN-TWO ====================-->
	<section class="main-two">
	<div class="row">
				<div class="col-12 col-md-8">
		<div class="main-slider-two">
			<div class="main-slide-two">
				<div class="main-slide-date">January 17</div>
				<div class="main-slider-bg" style="background-image: url(assets/img/bg-slider-home2.svg);"></div>
				<img class="img-slide" src="assets/img/home-2-slide-1.png" alt="img">
				<div class="container">
					<div class="main-slide-item">
						<div class="date-slide">January 17, 2019 / Washington DC</div>
						<h2><span>Conference on Software</span>Engineering Practices</h2>
						<div class="slide-tag">#Web_Conference</div>
						<div class="slide-btn-cover">
							<a href="single-events.html" class="btn btn-yellow">register now</a>
							<a href="single-events.html" class="btn btn-border">more details</a>
						</div>
					</div>
				</div>
			</div>
			<div class="main-slide-two">
				<div class="main-slide-date">January 17</div>
				<div class="main-slider-bg" style="background-image: url(assets/img/bg-slider-home2.svg);"></div>
				<img class="img-slide" src="assets/img/home-2-slide-2.png" alt="img">
				<div class="container">
					<div class="main-slide-item">
						<div class="date-slide">January 17, 2019 / Washington DC</div>
						<h2><span>Technology in</span>The Banking Sector</h2>
						<div class="slide-tag">#Web_Conference</div>
						<div class="slide-btn-cover">
							<a href="single-events.html" class="btn btn-yellow">register now</a>
							<a href="single-events.html" class="btn btn-border">more details</a>
						</div>
					</div>
				</div>
			</div>
			<div class="main-slide-two">
				<div class="main-slide-date">January 17</div>
				<div class="main-slider-bg" style="background-image: url(assets/img/bg-slider-home2.svg);"></div>
				<img class="img-slide" src="assets/img/home-2-slide-3.png" alt="img">
				<div class="container">
					<div class="main-slide-item">
						<div class="date-slide">January 17, 2019 / Washington DC</div>
						<h2><span>Ultimate Skills For an</span>Start in IT Recruiting</h2>
						<div class="slide-tag">#Web_Conference</div>
						<div class="slide-btn-cover">
							<a href="single-events.html" class="btn btn-yellow">register now</a>
							<a href="single-events.html" class="btn btn-border">more details</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-arrow-cover">
			<div class="container">
				<div class="main-slide-arrow"></div>
			</div>
		</div>
</div>
<div class="col-12 col-sm-3">
<div class="widget-content popular-posts">
  <ul>
    <li>
      <div class="item-thumbnail">
        <a title="" href="http://www.fostrap.com/2016/04/free-material-design-template-blogger-md-fostrap.html" target="_blank"> <img alt="(New Update) Free Material Design Template Blogger - MDFostrap" class="circle" src="https://2.bp.blogspot.com/-FF3UZkrY-ME/VwLGWIjIUzI/AAAAAAAAB3E/81FW7OvXAOcPUJl0ZDfDMV2VyIVGTSoAw/s72-c/cover.jpg" title="(New Update) Free Material Design Template Blogger - MDFostrap" border="0" height="72" width="72"> </a> <span class="title"><a title=" " href="http://www.fostrap.com/2016/04/free-material-design-template-blogger-md-fostrap.html">(New Update) Free Material Design Template Blogger - MDFostrap</a></span> </div>
      <div style="clear: both;"></div>
    </li>
    <li>
      <div class="item-thumbnail">
        <a title=" " href="http://www.fostrap.com/2016/02/awesome-material-design-responsive-menu.html" target="_blank"> <img alt="Simple Material Design Responsive Menu with HTML+CSS no Javascript" class="circle" src="https://3.bp.blogspot.com/-bAsTyYC8U80/VtLZRKN6OlI/AAAAAAAABjY/kAoljiMALkQ/s72-c/material%2Bnavbar.jpg" title="Simple Material Design Responsive Menu with HTML+CSS no Javascript" border="0" height="72" width="72"> </a> <span class="title"><a title=" " href="http://www.fostrap.com/2016/02/awesome-material-design-responsive-menu.html">Simple Material Design Responsive Menu with HTML+CSS no Javascript</a></span> </div>
      <div style="clear: both;"></div>
    </li>
    <li>
      <div class="item-thumbnail">
        <a title=" " href="http://www.fostrap.com/2016/04/documentation-mdfostrap-material-design-template-blogger.html" target="_blank"> <img alt="(Documentation) MDFostrap Material Design Template Blogger" class="circle" src="https://1.bp.blogspot.com/-AF7WpBRlk8s/VwumhEkvTnI/AAAAAAAAB6g/q9sb42e9Sq03sBL04gfraLdg0arBfUZXQ/s72-c/mdfostrap-made-by-materializecss.jpg" title="(Documentation) MDFostrap Material Design Template Blogger" border="0" height="72" width="72"> </a> <span class="title"><a title=" " href="http://www.fostrap.com/2016/04/documentation-mdfostrap-material-design-template-blogger.html">(Documentation) MDFostrap Material Design Template Blogger</a></span> </div>
      <div style="clear: both;"></div>
    </li>
    <li>
      <div class="item-thumbnail">
        <a title=" " href="http://www.fostrap.com/2016/05/material-design-button-ripple-effect.html" target="_blank"> <img alt="Material Design Button Ripple Effect Code Snippet" class="circle" src="https://2.bp.blogspot.com/-GvwkkFdRYP4/VymettBey1I/AAAAAAAAB-k/HKslJgqVK_oQwt1ef9jmr1P0AKAkeEgHQCLcB/s72-c/cover.jpg" title="Material Design Button Ripple Effect Code Snippet" border="0" height="72" width="72"> </a> <span class="title"><a title=" " href="http://www.fostrap.com/2016/05/material-design-button-ripple-effect.html">Material Design Button Ripple Effect Code Snippet</a></span> </div>
      <div style="clear: both;"></div>
    </li>
    <li>
      <div class="item-thumbnail">
        <a title=" " href="http://www.fostrap.com/2016/03/bootstrap-responsive-material-design.html" target="_blank"> <img alt="Bootstrap Responsive Material Design Card" class="circle" src="https://4.bp.blogspot.com/-gCE-gBljBOk/Vt0Wc-l-F8I/AAAAAAAABsA/vTJh_lfSx3U/s72-c/cover.jpg" title="Bootstrap Responsive Material Design Card" border="0" height="72" width="72"> </a> <span class="title"><a title=" " href="http://www.fostrap.com/2016/03/bootstrap-responsive-material-design.html">Bootstrap Responsive Material Design Card</a></span> </div>
      <div style="clear: both;"></div>
    </li>
    <li>
      <div class="item-thumbnail">
        <a title="" href="http://www.fostrap.com/2016/04/free-material-design-template-blogger-md-fostrap.html" target="_blank"> <img alt="(New Update) Free Material Design Template Blogger - MDFostrap" class="circle" src="https://2.bp.blogspot.com/-FF3UZkrY-ME/VwLGWIjIUzI/AAAAAAAAB3E/81FW7OvXAOcPUJl0ZDfDMV2VyIVGTSoAw/s72-c/cover.jpg" title="(New Update) Free Material Design Template Blogger - MDFostrap" border="0" height="72" width="72"> </a> <span class="title"><a title=" " href="http://www.fostrap.com/2016/04/free-material-design-template-blogger-md-fostrap.html">(New Update) Free Material Design Template Blogger - MDFostrap</a></span> </div>
      <div style="clear: both;"></div>
    </li>
    <li>
      <div class="item-thumbnail">
        <a title=" " href="http://www.fostrap.com/2016/02/awesome-material-design-responsive-menu.html" target="_blank"> <img alt="Simple Material Design Responsive Menu with HTML+CSS no Javascript" class="circle" src="https://3.bp.blogspot.com/-bAsTyYC8U80/VtLZRKN6OlI/AAAAAAAABjY/kAoljiMALkQ/s72-c/material%2Bnavbar.jpg" title="Simple Material Design Responsive Menu with HTML+CSS no Javascript" border="0" height="72" width="72"> </a> <span class="title"><a title=" " href="http://www.fostrap.com/2016/02/awesome-material-design-responsive-menu.html">Simple Material Design Responsive Menu with HTML+CSS no Javascript</a></span> </div>
      <div style="clear: both;"></div>
    </li>
    <li>
      <div class="item-thumbnail">
        <a title=" " href="http://www.fostrap.com/2016/04/documentation-mdfostrap-material-design-template-blogger.html" target="_blank"> <img alt="(Documentation) MDFostrap Material Design Template Blogger" class="circle" src="https://1.bp.blogspot.com/-AF7WpBRlk8s/VwumhEkvTnI/AAAAAAAAB6g/q9sb42e9Sq03sBL04gfraLdg0arBfUZXQ/s72-c/mdfostrap-made-by-materializecss.jpg" title="(Documentation) MDFostrap Material Design Template Blogger" border="0" height="72" width="72"> </a> <span class="title"><a title=" " href="http://www.fostrap.com/2016/04/documentation-mdfostrap-material-design-template-blogger.html">(Documentation) MDFostrap Material Design Template Blogger</a></span> </div>
      <div style="clear: both;"></div>
    </li>
    <li>
      <div class="item-thumbnail">
        <a title=" " href="http://www.fostrap.com/2016/05/material-design-button-ripple-effect.html" target="_blank"> <img alt="Material Design Button Ripple Effect Code Snippet" class="circle" src="https://2.bp.blogspot.com/-GvwkkFdRYP4/VymettBey1I/AAAAAAAAB-k/HKslJgqVK_oQwt1ef9jmr1P0AKAkeEgHQCLcB/s72-c/cover.jpg" title="Material Design Button Ripple Effect Code Snippet" border="0" height="72" width="72"> </a> <span class="title"><a title=" " href="http://www.fostrap.com/2016/05/material-design-button-ripple-effect.html">Material Design Button Ripple Effect Code Snippet</a></span> </div>
      <div style="clear: both;"></div>
    </li>
    <li>
      <div class="item-thumbnail">
        <a title=" " href="http://www.fostrap.com/2016/03/bootstrap-responsive-material-design.html" target="_blank"> <img alt="Bootstrap Responsive Material Design Card" class="circle" src="https://4.bp.blogspot.com/-gCE-gBljBOk/Vt0Wc-l-F8I/AAAAAAAABsA/vTJh_lfSx3U/s72-c/cover.jpg" title="Bootstrap Responsive Material Design Card" border="0" height="72" width="72"> </a> <span class="title"><a title=" " href="http://www.fostrap.com/2016/03/bootstrap-responsive-material-design.html">Bootstrap Responsive Material Design Card</a></span> </div>
      <div style="clear: both;"></div>
    </li>
  </ul>
</div>
<div>
<a href="news.php"><h2 class="title-line-left color:green;">FEATURED</h2></a>

					<div class="">
					
					<?php
          
        ?>
					</div>
				</div>
</div>
	</section>
	
	
	<!--==================== S-ABOUT ====================-->
	<section class="s-about-home-two">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 about-info">
					<h2 class="title-line-left">ONE VOICE | ONE FAMILY | ONE NATION</h2>
					<div class="about-slogan-home-two"> To
						ensure transparency, equity and fairness in the conduct of State and Party affairs </div>
					<div class="about-info-text">
						<p> Particularly to ensure that violence does not replace the Rule of Law</p>
					</div>
					<ul class="soc-link">
						<li><a target="_blank" href="https://www.facebook.com/pdpgovernorsforum"><i class="fab fa-facebook-f"></i></a></li>
						<li><a target="_blank" href="https://www.instagram.com/pdpgovernorsforum"><i class="fab fa-instagram"></i></a></li>

					</ul>
					<a href="about.php" class="btn btn-yellow">read more</a>
				</div>
				<div class="col-12 col-md-6 about-img">
					<a data-fancybox href="https://www.youtube.com/watch?v=VAd2RW65pyE&amp;autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0">
						<img class="lazy" src="assets/img/placeholder-all.png" data-src="assets/img/pdpgovernors.jpg" alt="img">
					</a>
				</div>
			</div>
		</div>
	</section>
	<!--================== S-ABOUTK END ==================-->

  <section class="s-about-home-two">
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

	<!--================== OUR-SPEAKERS ==================-->
	<section class="our-speakers speakers-home-two">
		<div class="bg-img" style="background-image: url(assets/img/bg-team-home-2.svg);"></div>
		<span class="title-position title-position-left">Speakers</span>
		<span class="title-position title-position-right">Experts</span>
		<div class="container">
			<h2 class="title-line">Who We Are</h2>
			<p class="slogan">A political and policy think tank consisting of the state governors affiliated with the People's Democratic Party in Nigeria.</p>
      <div class="our-speakers-cover">
          <?php echo $governors_table; ?>
			</div>
		</div>
	</section>
	<!--================ OUR-SPEAKERS END ================-->

  <!--================== OUR-SPEAKERS ==================-->
	<section class="our-speakers speakers-home-two">
		<div class="bg-img" style="background-image: url(assets/img/bg-team-home-2.svg);"></div>
		<div class="container">
			<h2 class="title-line">Latest News</h2>
      <div class="our-speakers-cover">
				<?php
          echo $news_table;
        ?>
				</div>

		</div>
	</section>
	<!--================ OUR-SPEAKERS END ================-->

	<!--================== S-LATEST-NEWS ==================-->
	<section class="s-latest-news">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<h2 class="title-line-left">Looking for data? Get Started</h2>
				</div>
				<div class="col-12 col-md-6">
					<form method="POST">
						<input type="email" name="email" placeholder="Your Email Address">
						<button class="btn btn-yellow" type="submit">Subscribe</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--================== S-LATEST-NEWS END ==================-->

    <?php
        include('php/footer.php');
    ?>
