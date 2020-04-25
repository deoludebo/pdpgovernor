<?php
    $pagetitle = 'Manage Users';

    include('header.php');
?>
<?php
  include '../php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);

  if (isset($_GET["delete"])) {
    $id = $_GET["id"];
    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    header("Location: users.php");
    exit;
  }

  if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $date = time();

    $stmt = $conn->prepare("INSERT INTO users (username, password, date) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $username, $password, $date);
    $stmt->execute();
  }

  $result = $conn -> query("SELECT * from users ORDER BY date ASC");
  $users_table = "";
  while($row = $result -> fetch_assoc()) {
    $date = date("Y-m-d", $row["date"]);
    $users_table .= '<tr>
    <td>' . $row["username"] . '</td>
    <td>' . $row["password"] . '</td>
    <td>' . $date . '</td>
    <td><a href="users.php?delete=1&id=' . $row["id"] . '"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Delete</button></a></td>
    </tr>';
  }
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add User</h4>

        <form method="POST">
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password">
          </div>
          <button type="submit" style="padding: 15px;" class="btn btn-success btn-sm btn-block waves-effect waves-light">Add User</button>
        </form>
      </div>
      <!-- end card-body-->
    </div>
  </div> <!-- end col -->
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title">All Users</h4>
        <div class="table-responsive">
          <table class="table table-centered table-striped table-nowrap">
            <thead>
              <tr>

                <th>Name</th>
                <th>Password</th>
                <th>Date Joined</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
                echo $users_table;
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
