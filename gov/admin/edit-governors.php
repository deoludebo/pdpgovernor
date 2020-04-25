<?php
    $pagetitle = 'Manage Governors';

    include('header.php');
?>
<?php
  include '../php/config.php';
  $conn = new mysqli($servername, $username, $password, $db_name);

  if (isset($_GET["delete"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM governors WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    echo "<script>window.location='index.php';</script>";
    exit;
  }

  if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $post = $_POST["post"];
    $title = $_POST["title"];
    $bio = $_POST["bio"];
    $full_bio = $_POST["full_bio"];
    $facebook = $_POST["facebook"];
    $twitter = $_POST["twitter"];
    $linkedin = $_POST["linkedin"];
    $site = $_POST["site"];

    if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $stmt = $conn->prepare("UPDATE governors SET name=?, post=?, title=?, bio=?, full_bio=?, facebook=?, twitter=?, linkedin=?, site=? WHERE id=?");
      $stmt->bind_param("ssssssssss", $name, $post, $title, $bio, $full_bio, $facebook, $twitter, $linkedin, $site, $id);
      $stmt->execute();
      echo "<script>alert('Successfully saved details');</script>";
    }
    else {
      $empty = "";
      $stmt = $conn->prepare("INSERT INTO governors (name, post, title, bio, full_bio, facebook, twitter, linkedin, site, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssssss", $name, $post, $title, $bio, $full_bio, $facebook, $twitter, $linkedin, $site, $empty);
      $stmt->execute();
      $id = "" . $conn->insert_id;

      echo "<script>window.location='edit-governors.php?id=" . $id . "';</script>";
      exit;
    }

    $target_dir = "../assets/img/uploads/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if($check !== false) {
      move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
      $stmt = $conn->prepare("UPDATE governors SET picture=? WHERE id=?");
      $picture_location = "assets/img/uploads/" . basename($_FILES["picture"]["name"]);
      $stmt->bind_param("ss", $picture_location, $id);
      $stmt->execute();
    }
  }

  $name = "";
  $post = "";
  $title = "";
  $bio = "";
  $facebook = "";
  $twitter = "";
  $linkedin = "";
  $site = "";
  $full_bio = "";

  if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM governors WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt -> get_result();
    if ($result -> num_rows > 0)
    {
      while($row = $result -> fetch_assoc()) {
        $name = $row["name"];
        $post = $row["post"];
        $title = $row["title"];
        $bio = $row["bio"];
        $full_bio = $row["full_bio"];
        $facebook = $row["facebook"];
        $twitter = $row["twitter"];
        $linkedin = $row["linkedin"];
        $site = $row["site"];
      }
    }
    else {
      echo "<script>window.location='index.php';</script>";
      exit;
    }
  }
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Governors</h4>
        <p class="card-subtitle mb-4">Add a new Governor or Edit the Current Ones
        </p>

        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Governor Name" value="<?php echo $name; ?>" name="name">
          </div>
          <div class="form-group">
            <label>Post</label>
            <input type="text" class="form-control" placeholder="Governor Post" name="post" value="<?php echo $post; ?>">
          </div>
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="Governor Title" value="<?php echo $title; ?>">
          </div>
          <div class="form-group">
            <label>Bio</label>
            <textarea class="form-control" name="bio" rows="5" placeholder="Governor Bio"><?php echo $bio; ?></textarea>
          </div>
          <div class="form-group">
            <label>Full Bio</label>
            <textarea class="form-control" name="full_bio" rows="5" placeholder="Governor Full Bio"><?php echo $full_bio; ?></textarea>
          </div>
          <div class="form-group">
            <label>Facebook</label>
            <input type="text" class="form-control" placeholder="Governor Facebook" name="facebook" value="<?php echo $facebook; ?>">
          </div>
          <div class="form-group">
            <label>Twitter</label>
            <input type="text" class="form-control" placeholder="Governor Twitter" name="twitter" value="<?php echo $twitter; ?>">
          </div>
          <div class="form-group">
            <label>Linkedin</label>
            <input type="text" class="form-control" placeholder="Governor Linkedin" name="linkedin" value="<?php echo $linkedin; ?>">
          </div>
          <div class="form-group">
            <label>Personal Site</label>
            <input type="text" class="form-control" placeholder="Governor Personal Site" name="site" value="<?php echo $site; ?>">
          </div>
          <div class="form-group">
            <label>Governor Picture</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="picture" accept="image/*">
              <label class="custom-file-label">Choose file</label>
            </div>
          </div>
          <button type="submit" style="padding: 15px;" class="btn btn-success btn-sm btn-block waves-effect waves-light">Save Details</button>
          <a href="edit-governors.php?delete=1&id=<?php echo $id; ?>"><button type="button" style="padding: 15px;" class="btn btn-danger btn-sm btn-block waves-effect waves-light">Delete Governor</button></a>
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
