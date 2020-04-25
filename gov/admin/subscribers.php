<?php
    $pagetitle = 'View Subscribers';

    include('header.php');
?>
<?php
  include '../php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);

  $result = $conn -> query("SELECT * from subscribers ORDER BY date ASC");
  $subscribers_table = "";
  while($row = $result -> fetch_assoc()) {
    $date = date("Y-m-d", $row["date"]);
    $subscribers_table .= '<tr>
    <td>' . $row["email"] . '</td>
    <td>' . $date . '</td>
    </tr>';
  }
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title">All Users</h4>
        <div class="table-responsive">
          <table class="table table-centered table-striped table-nowrap">
            <thead>
              <tr>

                <th>Email</th>
                <th>Date Joined</th>
              </tr>
            </thead>
            <tbody>
              <?php
                echo $subscribers_table;
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
