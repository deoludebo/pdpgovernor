<?php
    $pagetitle = 'Edit State';

    include('header.php');
?>
<?php
  include '../php/config.php';
  $conn = new mysqli($servername, $username, $password, $db_name);

  if (isset($_GET["delete"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM states WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    echo "<script>window.location='states.php';</script>";
    exit;
  }

  if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $info = $_POST["info"];

    if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $stmt = $conn->prepare("UPDATE states SET name=?, info=? WHERE id=?");
      $stmt->bind_param("sss", $name, $info, $id);
      $stmt->execute();
      echo "<script>alert('Successfully saved state');</script>";
    }
    else {
      $empty = "";
      $stmt = $conn->prepare("INSERT INTO states (name, info, image) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $name, $info, $empty);
      $stmt->execute();
      $id = "" . $conn->insert_id;

      echo "<script>window.location='edit-state.php?id=" . $id . "';</script>";
      exit;
    }

    $target_dir = "../assets/img/uploads/states/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if($check !== false) {
      move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
      $stmt = $conn->prepare("UPDATE states SET image=? WHERE id=?");
      $picture_location = "assets/img/uploads/states/" . basename($_FILES["picture"]["name"]);
      $stmt->bind_param("ss", $picture_location, $id);
      $stmt->execute();
    }
  }

  $name = "";
  $info = "";

  if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM states WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt -> get_result();
    if ($result -> num_rows > 0)
    {
      while($row = $result -> fetch_assoc()) {
        $name = $row["name"];
        $info = $row["info"];
      }
    }
    else {
      echo "<script>window.location='states.php';</script>";
      exit;
    }
  }
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit State</h4>
        <p class="card-subtitle mb-4">Add a new State or Edit the Current Ones
        </p>

        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="State Name" value="<?php echo $name; ?>" name="name">
          </div>
          <div class="form-group">
            <label>Info</label>
            <textarea class="form-control" name="info" rows="10" placeholder="State Info"><?php echo $info; ?></textarea>
          </div>
          <div class="form-group">
            <label>State Picture</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="picture" accept="image/*">
              <label class="custom-file-label">Choose file</label>
            </div>
          </div>
          <button type="submit" style="padding: 15px;" class="btn btn-success btn-sm btn-block waves-effect waves-light">Save Details</button>
          <a href="edit-state.php?delete=1&id=<?php echo $id; ?>"><button type="button" style="padding: 15px;" class="btn btn-danger btn-sm btn-block waves-effect waves-light">Delete State</button></a>
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
