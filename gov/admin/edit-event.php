<?php
    $pagetitle = 'Edit Events';

    include('header.php');
?>
<?php
  include '../php/config.php';
  $conn = new mysqli($servername, $username, $password, $db_name);
  if (isset($_GET["delete"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM events WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    echo "<script>window.location='events.php';</script>";
    exit;
  }

  if (isset($_POST["title"])) {
    $title = $_POST["title"];
    $type = $_POST["type"];
    $venue = $_POST["venue"];
    $state = $_POST["state"];
    $date = strtotime($_POST["date"]);

    if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $stmt = $conn->prepare("UPDATE events SET title=?, type=?, venue=?, state=?, date=? WHERE id=?");
      $stmt->bind_param("ssssis", $title, $type, $venue, $state, $date, $id);
      $stmt->execute();
      echo "<script>alert('Successfully saved event');</script>";
    }
    else {
      $empty = "";
      $stmt = $conn->prepare("INSERT INTO events (title, type, venue, state, date, image) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssis", $title, $type, $venue, $state, $date, $empty);
      $stmt->execute();
      $id = "" . $conn->insert_id;

      echo "<script>window.location='edit-event.php?id=" . $id . "';</script>";
      exit;
    }

    $target_dir = "../assets/img/uploads/events/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if($check !== false) {
      move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
      $stmt = $conn->prepare("UPDATE events SET image=? WHERE id=?");
      $picture_location = "assets/img/uploads/events/" . basename($_FILES["picture"]["name"]);
      $stmt->bind_param("ss", $picture_location, $id);
      $stmt->execute();
    }
  }

  $title = "";
  $type = "";
  $venue = "";
  $state = "";
  $date = date("Y-m-d", time());

  if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM events WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt -> get_result();
    if ($result -> num_rows > 0)
    {
      while($row = $result -> fetch_assoc()) {
        $title = $row["title"];
        $type = $row["type"];
        $venue = $row["venue"];
        $state = $row["state"];
        $date = date("Y-m-d", $row["date"]);
      }
    }
    else {
      echo "<script>window.location='events.php';</script>";
      exit;
    }
  }
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Event</h4>
        <p class="card-subtitle mb-4">Add a new Event or Edit the Current Ones
        </p>

        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" placeholder="Event Title" value="<?php echo $title; ?>" name="title">
          </div>
          <div class="form-group">
            <label>Type</label>
            <input type="text" class="form-control" name="type" placeholder="Event Type" value="<?php echo $type; ?>">
          </div>
          <div class="form-group">
            <label>Venue</label>
            <input type="text" class="form-control" placeholder="Event Venue" name="venue" value="<?php echo $venue; ?>">
          </div>
          <div class="form-group">
            <label>State</label>
            <input type="text" class="form-control" placeholder="Event State" name="state" value="<?php echo $state; ?>">
          </div>
          <div class="form-group">
            <label>Event Date</label>
            <input type="text" class="form-control" placeholder="Event Date" name="date" value="<?php echo $date; ?>">
          </div>
          <div class="form-group">
            <label>Event Picture</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="picture" accept="image/*">
              <label class="custom-file-label">Choose file</label>
            </div>
          </div>
          <button type="submit" style="padding: 15px;" class="btn btn-success btn-sm btn-block waves-effect waves-light">Save Details</button>
          <a href="edit-event.php?delete=1&id=<?php echo $id; ?>"><button type="button" style="padding: 15px;" class="btn btn-danger btn-sm btn-block waves-effect waves-light">Delete Event</button></a>
        </form>
      </div>
      <!-- end card-body-->
    </div>
  </div> <!-- end col -->
</div>
<!-- end row-->

</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<?php
    include('footer.php');
?>
