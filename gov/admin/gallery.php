<?php
    $pagetitle = 'Manage Gallery';

    include('header.php');
?>
<?php
  include '../php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);

  if (isset($_FILES["picture"])) {
    $target_dir = "../assets/img/uploads/gallery/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if($check !== false) {
      move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
      $src = "assets/img/uploads/gallery/" . basename($_FILES["picture"]["name"]);
      $date = time();
      $type = $_POST["type"];
      $caption = $_POST["caption"];
      $stmt = $conn->prepare("INSERT INTO gallery (src, type, caption, date) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("sssi", $src, $type, $caption, $date);
      $stmt->execute();
      echo "<script>alert('Successfully added image to gallery');</script>";
    }
  }

  $num_images = $conn -> query("SELECT * FROM gallery") -> num_rows;
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add to Gallery</h4>
        <p>There are currently <?php echo $num_images; ?> media in the gallery</p>

        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Media Type</label>
            <select class="form-control" id="exampleFormControlSelect1" name="type">
                <option value="1">Photo</option>
                <option value="2">Video</option>
            </select>
          </div>
          <div class="form-group">
            <label>Caption</label>
            <input type="text" class="form-control" name="caption">
          </div>
          <div class="form-group">
            <label>Image/Video</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="picture">
              <label class="custom-file-label">Choose file</label>
            </div>
          </div>
          <button type="submit" style="padding: 15px;" class="btn btn-success btn-sm btn-block waves-effect waves-light">Add Picture</button>
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
