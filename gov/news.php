
<?php
    $pagetitle = 'News  | PDP Governors Forum';
    $currentPage = 'news';

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

  if (isset($_GET["news"])) {
    $id = $_GET['news'];
    $stmt = $conn->prepare("SELECT * FROM news WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt -> get_result();
    if ($result -> num_rows > 0)
    {
      while($row = $result -> fetch_assoc()) {
        $date = date("Y-m-d", $row["date"]);
        $news_table = '<div class="post-item-cover">
          <div class="post-header">
            <h3 class="title title-line-left"><a href="news.php?news=' . $row["id"] . '">' . $row["title"] . '</a></h3>
            <div class="post-thumbnail">
              <a href="news.php?news=' . $row["id"] . '">
                <img src="' . $row["image"] . '" alt="img">
              </a>
            </div>
            <div class="meta">
                <span class="post-by"><i class="fa fa-user" aria-hidden="true"></i>By <a href="#">' . $row["poster"] . '</a></span>
                <span class="post-date"><i class="fas fa-calendar-alt" aria-hidden="true"></i><a href="#">' . $date . '</a></span>
                <span class="post-category"><i class="fas fa-tag" aria-hidden="true"></i><a href="#">' . $row["tag"] . '</a></span>
              </div>
          </div>
          <div class="post-content">
            <div class="text">
              <p>' . $row["intro"] . '</p>
            </div>
          </div>
          <div class="post-content">
            <div class="text">
              <p>' . $row["full_text"] . '</p>
            </div>
          </div>
        </div>';
      }
    }
    else {
      header("Location: news.php");
    }
  }
  else {
    $result = $conn -> query("SELECT * FROM news ORDER BY date DESC");
    $news_table = "";
    $news_side = "";
    while($row = $result -> fetch_assoc()) {
      $date = date("Y-m-d", $row["date"]);
      $date2 = date("h:i a", $row["date"]);
      $news_table .= '<div class="post-item-cover">
        <div class="post-header">
          <h3 class="title title-line-left"><a href="news.php?news=' . $row["id"] . '">' . $row["title"] . '</a></h3>
          <div class="post-thumbnail">
            <a href="news.php?news=' . $row["id"] . '">
              <img src="' . $row["image"] . '" alt="img">
            </a>
          </div>
          <div class="meta">
              <span class="post-by"><i class="fa fa-user" aria-hidden="true"></i>By <a href="#">' . $row["poster"] . '</a></span>
              <span class="post-date"><i class="fas fa-calendar-alt" aria-hidden="true"></i><a href="#">' . $date . '</a></span>
              <span class="post-category"><i class="fas fa-tag" aria-hidden="true"></i><a href="#">' . $row["tag"] . '</a></span>
            </div>
        </div>
        <div class="post-content">
          <div class="text">
            <p>' . $row["intro"] . '</p>
          </div>
        </div>
      </div>';

      $news_side .= '<li>
        <a href="news.php?news=' . $row["id"] . '">' . $row["title"] . '</a>
        <div class="date"><i class="fas fa-calendar-alt" aria-hidden="true"></i>' . $date . ' at ' . $date2 . '</div>
      </li>';
    }
  }

  $result = $conn -> query("SELECT * FROM news WHERE featured=1 ORDER BY date DESC LIMIT 5");
  $news_featured = "";
  while($row = $result -> fetch_assoc()) {
    $date = date("Y-m-d", $row["date"]);
    $date2 = date("h:i a", $row["date"]);
    $news_featured .= '<li>
      <a href="news.php?news=' . $row["id"] . '">' . $row["title"] . '</a>
      <div class="date"><i class="fas fa-calendar-alt" aria-hidden="true"></i>' . $date . ' at ' . $date2 . '</div>
    </li>';
  }

  $result = $conn -> query("SELECT * FROM gallery ORDER BY date DESC LIMIT 6");
	$gallery_table = "";
	while($row = $result -> fetch_assoc()) {
		$gallery_table .= '<li><img class="lazy" src="' . $row["src"] . '" alt="social"></li>';
	}

?>
		<!--=================== HEADER END ===================-->

	<!--=================== PAGE-TITLE ===================-->
	<div class="page-title" style="background-image: url(assets/img/Blur.jpg);">
		<div class="container">
			<h1 class="title-line-left">News</h1>
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>News</li>
				</ul>
			</div>
		</div>
	</div>
	<!--================= PAGE-TITLE END =================-->

	<!--===================== S-NEWS =====================-->
	<section class="s-news">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 blog-cover">
	        <?php
            echo $news_table;
          ?>

          <div class="pagination-cover">
            <ul class="pagination">
              <li class="pagination-item item-prev"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
              <li class="pagination-item active"><a href="#">1</a></li>
              <li class="pagination-item"><a href="#">2</a></li>
              <li class="pagination-item"><a href="#">3</a></li>
              <li class="pagination-item"><a href="#">4</a></li>
              <li class="pagination-item"><a href="#">5</a></li>
              <li class="pagination-item item-next"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            </ul>
          </div>
				</div>
				<!--================= SIDEBAR =================-->
				<div class="col-12 col-lg-4 sidebar">
					<ul class="widgets">
						<!--=========== WIDGET-SEARCH ===========-->
						<li class="widget widget-search">
							<h6 class="title">search</h6>
							<form action="/" class="search-form">
								<input type="text" name="search" placeholder="Search">
								<button class="search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
							</form>
						</li>
						<!--========= WIDGET-SEARCH END =========-->

						<!--=========== WIDGET-RECENT-POSTS ===========-->
						<li class="widget widget-recent-posts">
							<h6 class="title">Recent blog posts</h6>
							<ul>

						     <?php
                  echo $news_side;
                  ?>
							</ul>
						</li>

            <li class="widget widget-recent-posts">
							<h6 class="title">Featured blog posts</h6>
							<ul>

						     <?php
                  echo $news_featured;
                  ?>
							</ul>
						</li>
						<!--========== WIDGET-RECENT-POSTS END ==========-->
						<!--=========== WIDGET-INSTAGRAM ===========-->
						<li class="widget widget-instagram">
							<h6 class="title">Gallery</h6>
							<ul>
								<?php echo $gallery_table; ?>
							</ul>
						</li>
						<!--=========== WIDGET-INSTAGRAM END ===========-->
						<!--=========== WIDGET-NEWSLETTER ===========-->
						<li class="widget widget-newsletter">
							<h6 class="title">newsletter</h6>
							<form method="POST" class="subscribe-form">
								<input type="email" name="email" placeholder="E-mail">
								<button class="search-button" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
							</form>
						</li>
						<!--=========== WIDGET-NEWSLETTER END ===========-->
					</ul>
				</div>
				<!--=============== SIDEBAR END ===============-->
			</div>
		</div>
	</section>
	<!--=================== S-NEWS END ===================-->

	<?php

    include('php/footer.php');
?>
