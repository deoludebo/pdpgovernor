<?php
    $pagetitle = 'Edit Info';

    include('header.php');
?>
<?php
  include '../php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);

  if (isset($_POST["general"])) {
    $general = $_POST["general"];
    $deliberations = $_POST["deliberations"];
    $issues = $_POST["issues"];

    $stmt = $conn->prepare("UPDATE info SET value=? WHERE id=1");
    $stmt->bind_param("s", $general);
    $stmt->execute();

    $stmt = $conn->prepare("UPDATE info SET value=? WHERE id=2");
    $stmt->bind_param("s", $deliberations);
    $stmt->execute();

    $stmt = $conn->prepare("UPDATE info SET value=? WHERE id=3");
    $stmt->bind_param("s", $issues);
    $stmt->execute();

    echo "<script>alert('Successfully changed site information');</script>";
  }

  $result = $conn -> query("SELECT * FROM info ORDER BY id ASC");
	$result_arr = [];
	while($row = $result -> fetch_assoc()) {
		array_push($result_arr, $row["value"]);
	}
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Info</h4>
        <form method="POST">
          <div class="form-group">
            <label>Director Generals</label>
            <input type="text" class="form-control" name="general" value="<?php echo $result_arr[0]; ?>">
          </div>
          <div class="form-group">
            <label>Deliberations</label>
            <input type="text" class="form-control" name="deliberations" value="<?php echo $result_arr[1]; ?>">
          </div>
          <div class="form-group">
            <label>Resolved Issues</label>
            <input type="text" class="form-control" name="issues" value="<?php echo $result_arr[2]; ?>">
          </div>
          <button type="submit" style="padding: 15px;" class="btn btn-success btn-sm btn-block waves-effect waves-light">Edit Info</button>
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
