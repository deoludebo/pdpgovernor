<?php
    $pagetitle = 'Add Document';

    include('header.php');
?>
<?php
  include '../php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);

  if (isset($_FILES["doc"])) {
    $target_dir = "../assets/img/uploads/documents/";
    $target_file = $target_dir . basename($_FILES["doc"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = filesize($_FILES["doc"]["tmp_name"]);
    if($check !== false) {
      move_uploaded_file($_FILES["doc"]["tmp_name"], $target_file);
      $src = "assets/img/uploads/documents/" . basename($_FILES["doc"]["name"]);
      $date = time();
      $name = $_POST["name"];
      $type = $_POST["doc_type"];
      $stmt = $conn->prepare("INSERT INTO documents (name, type, path, date) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("sssi", $name, $type, $src, $date);
      $stmt->execute();
      echo "<script>alert('Successfully added new document');</script>";
    }
  }

  $num_docs = $conn -> query("SELECT * FROM documents") -> num_rows;
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Document</h4>
        <p>There are currently <?php echo $num_docs; ?> documents on the platform.</p>

        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Document Name</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Document Type</label>
            <select class="form-control" id="exampleFormControlSelect1" name="doc_type">
                <option value="1">Data</option>
                <option value="2">Annual Report</option>
                <option value="3">Infographic</option>
                <option value="4">Federal Document</option>
                <option value="5">State Document</option>
                <option value="6">Publication Document</option>
            </select>
          </div>
          <div class="form-group">
            <label>Document</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="doc">
              <label class="custom-file-label">Choose file</label>
            </div>
          </div>
          <button type="submit" style="padding: 15px;" class="btn btn-success btn-sm btn-block waves-effect waves-light">Add Document</button>
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
