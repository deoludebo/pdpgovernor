
<?php
    $pagetitle = 'Upcoming Events | PDP Governors Forum';
    $currentPage = 'event';

    include('php/header.php');
?>
<?php
	include 'php/config.php';

	$conn = new mysqli($servername, $username, $password, $db_name);
	$result = $conn -> query("SELECT * FROM events WHERE status = 'upcoming' ORDER BY date ASC");

  if (isset($_GET["event"])) {
    $id = $_GET['event'];
    $stmt = $conn->prepare("SELECT * FROM events WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt -> get_result();
    if ($result -> num_rows > 0)
    {
      while($row = $result -> fetch_assoc()) {
        $day = date("d", $row["date"]);
        $day2 = date("M, Y", $row["date"]);
        $events_table = '<div class="upcoming-course-cover">
          <div class="course-item-left">
            <div class="upcoming-course-item">
              <div class="date-cover">
                <div class="day">' . $day . ' </div>
                <div class="date-info">
                  <div class="month">' . $day2 . '</div>
                  <div class="name">' . $row["type"] . '</div>
                </div>
              </div>
              <h3 class="title"><a href="events.php?event=' . $row["id"] . '">' . $row["title"] . '</a></h3>
              <div class="upcoming-course-adr">
                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                <p>' . $row["venue"] . '<span>|</span>  ' . $row["state"] . '</p>
              </div>

            </div>
          </div>
          <div class="upcoming-course-img">
            <img src="' . $row["image"] . '" alt="img">
          </div>
        </div>';
      }
    }
    else {
      header("Location: events.php");
    }
  }
	else {
    $events_table = "";
  	while($row = $result -> fetch_assoc()) {
      $day = date("d", $row["date"]);
      $day2 = date("M, Y", $row["date"]);
      $events_table .= '<div class="upcoming-course-cover">
        <div class="course-item-left">
          <div class="upcoming-course-item">
            <div class="date-cover">
              <div class="day">' . $day . ' </div>
              <div class="date-info">
                <div class="month">' . $day2 . '</div>
                <div class="name">' . $row["type"] . '</div>
              </div>
            </div>
            <h3 class="title"><a href="events.php?event=' . $row["id"] . '">' . $row["title"] . '</a></h3>
            <div class="upcoming-course-adr">
              <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
              <p>' . $row["venue"] . '<span>|</span>  ' . $row["state"] . '</p>
            </div>

          </div>
        </div>
        <div class="upcoming-course-img">
          <img src="' . $row["image"] . '" alt="img">
        </div>
      </div>';
  	}
  }

  $conn->close();
?>

	<!--=================== PAGE-TITLE ===================-->
	<div class="page-title" style="background-image: url(assets/img/Blur.jpg);">
		<div class="container">
			<h1 class="title-line-left">Upcoming Events</h1>
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>Events</li>
				</ul>
			</div>
		</div>
	</div>
	<!--================= PAGE-TITLE END =================-->

	<!--============= S-PROFESSIONAL-TRAINING =============-->
	<section class="s-professional-training">
		<div class="container">
			<h2 class="title-line">Events</h2>
			<p class="slogan">Closest Events Slated For The Month</p>
			<div class="upcoming-course-wrap">
        <?php
          echo $events_table;
        ?>
			</div>
		</div>
	</section>
	<!--=========== S-PROFESSIONAL-TRAINING END ===========-->


    <?php


  include('php/footer.php');
?>
