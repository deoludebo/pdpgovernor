<?php
    $pagetitle = 'Edit History';

    include('header.php');
?>
<?php
  include '../php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);

  if (isset($_GET["id"])) {
    $id = $_GET['id'];

    if (isset($_POST["title"])) {
      $title = $_POST["title"];
      $description = $_POST["description"];
      $date = strtotime($_POST["date"]);
      $stmt = $conn->prepare("UPDATE history SET title=?, description=?, date=? WHERE id=?");
      $stmt->bind_param("ssis", $title, $description, $date, $id);
      $stmt->execute();
      echo "<script>alert('Successfully saved history');</script>";
    }
    $stmt = $conn->prepare("SELECT * FROM history WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt -> get_result();
    if ($result -> num_rows > 0)
    {
      while($row = $result -> fetch_assoc()) {
        $title = $row["title"];
        $description = $row["description"];
        $date = date("Y-m-d", $row["date"]);
      }
    }
    else {
      header("Location: history.php");
      exit;
    }
  }
  else {
    header("Location: history.php");
    exit;
  }
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit History</h4>
        <form method="POST" >
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" rows="5"><?php echo $description; ?></textarea>
          </div>
          <div class="form-group">
            <label>Date</label>
            <input type="text" class="form-control" name="date" value="<?php echo $date; ?>">
          </div>
          <button type="submit" style="padding: 15px;" class="btn btn-success btn-sm btn-block waves-effect waves-light">Edit History</button>
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
