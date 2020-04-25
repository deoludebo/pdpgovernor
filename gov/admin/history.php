<?php
    $pagetitle = 'Manage History';

    include('header.php');
?>
<?php
  include '../php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);

  if (isset($_GET["delete"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM history WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    header("Location: history.php");
    exit;
  }

  if (isset($_POST["title"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $date = strtotime($_POST["date"]);

    $stmt = $conn->prepare("INSERT INTO history (title, description, date) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $description, $date);
    $stmt->execute();
  }

  $result = $conn -> query("SELECT * from history ORDER BY date DESC");
  $history_table = "";
  while($row = $result -> fetch_assoc()) {
    $date = date("Y-m-d", $row["date"]);
    $history_table .= '<tr>
    <td>' . $row["title"] . '</td>
    <td>' . $date . '</td>
    <td><a href="history-edit.php?id=' . $row["id"] . '"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Edit</button></a></td>
    <td><a href="history.php?delete=1&id=' . $row["id"] . '"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Delete</button></a></td>
    </tr>';
  }
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add History</h4>

        <form method="POST">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" rows="5" placeholder="History Description"></textarea>
          </div>
          <div class="form-group">
            <label>Date</label>
            <input type="text" class="form-control" name="date" value="<?php echo date("Y-m-d", time()); ?>">
          </div>
          <button type="submit" style="padding: 15px;" class="btn btn-success btn-sm btn-block waves-effect waves-light">Add History</button>
        </form>
      </div>
      <!-- end card-body-->
    </div>
  </div> <!-- end col -->
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title">All History</h4>
        <div class="table-responsive">
          <table class="table table-centered table-striped table-nowrap">
            <thead>
              <tr>

                <th>Title</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
                echo $history_table;
               ?>
            </tbody>
          </table>
        </div>

      </div> <!-- end card-body-->
    </div> <!-- end card-->
  </div> <!-- end col -->

</div>
<!-- end row-->

</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<?php
    include('footer.php');
?>
