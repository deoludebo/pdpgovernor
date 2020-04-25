<?php
    $pagetitle = 'Edit News';

    include('header.php');
?>
<?php
  include '../php/config.php';
  $conn = new mysqli($servername, $username, $password, $db_name);

  if (isset($_GET["delete"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM news WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    echo "<script>window.location='news.php';</script>";
    exit;
  }

  if (isset($_POST["title"])) {
    $title = $_POST["title"];
    $type = $_POST["type"];
    $tag = $_POST["tag"];
    $intro = $_POST["intro"];
    $full_info = $_POST["full_info"];
    $featured = $_POST["featured"];

    if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $stmt = $conn->prepare("UPDATE news SET title=?, type=?, tag=?, intro=?, full_text=?, featured=? WHERE id=?");
      $stmt->bind_param("sssssss", $title, $type, $tag, $intro, $full_info, $featured, $id);
      $stmt->execute();
      echo "<script>alert('Successfully saved news');</script>";
    }
    else {
      $idd = $_COOKIE["u_id"];
      $stmt = $conn->prepare("SELECT * FROM login_session WHERE login_id=?");
      $stmt->bind_param("s", $idd);
      $stmt->execute();
      $result = $stmt -> get_result();
      while($row = $result -> fetch_assoc()) {
        $poster = $row["username"];
      }
      $empty = "";
      $date = time();
      $stmt = $conn->prepare("INSERT INTO news (image, title, intro, full_text, poster, tag, featured, type, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssssssi", $empty, $title, $intro, $full_info, $poster, $tag, $featured, $type, $date);
      $stmt->execute();
      $id = "" . $conn->insert_id;

      echo "<script>window.location='edit-news.php?id=" . $id . "';</script>";
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
  $tag = "";
  $intro = "";
  $full_info = "";

  if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM news WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt -> get_result();
    if ($result -> num_rows > 0)
    {
      while($row = $result -> fetch_assoc()) {
        $title = $row["title"];
        $type = $row["type"];
        $tag = $row["tag"];
        $intro = $row["intro"];
        $full_info = $row["full_text"];
      }
    }
    else {
      echo "<script>window.location='news.php';</script>";
      exit;
    }
  }
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit News</h4>
        <p class="card-subtitle mb-4">Add a new News or Edit the Current Ones
        </p>

        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" placeholder="News Title" value="<?php echo $title; ?>" name="title">
          </div>
          <div class="form-group">
            <label>Type</label>
            <input type="text" class="form-control" name="type" placeholder="News Type" value="<?php echo $type; ?>">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Featured or Not Featured News</label>
            <select class="form-control" id="exampleFormControlSelect1" name="featured">
                <option value="0">Not Featured</option>
                <option value="1">Featured</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tag</label>
            <input type="text" class="form-control" name="tag" placeholder="News Tag" value="<?php echo $tag; ?>">
          </div>
          <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" name="intro" rows="5" placeholder="News Intro"><?php echo $intro; ?></textarea>
          </div>
          <div class="form-group">
            <label>Full News</label>
            <textarea class="form-control" name="full_info" rows="5" placeholder="Full News"><?php echo $full_info; ?></textarea>
          </div>
          <div class="form-group">
            <label>News Picture</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="picture" accept="image/*">
              <label class="custom-file-label">Choose file</label>
            </div>
          </div>
          <button type="submit" style="padding: 15px;" class="btn btn-success btn-sm btn-block waves-effect waves-light">Save Details</button>
          <a href="edit-news.php?delete=1&id=<?php echo $id; ?>"><button type="button" style="padding: 15px;" class="btn btn-danger btn-sm btn-block waves-effect waves-light">Delete News</button></a>
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
