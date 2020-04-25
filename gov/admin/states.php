<?php
    $pagetitle = 'View States';

    include('header.php');
?>
<?php
  include '../php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);

  $result = $conn -> query("SELECT * from states");
  $total_states = $result -> num_rows;
  $events_table = "";
  while($row = $result -> fetch_assoc()) {
    $date = date("Y-m-d", $row["date"]);
    $events_table .= '<tr>
    <td>' . $row["name"] . ' State</td>
    <td><a href="edit-state.php?id=' . $row["id"] . '"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Edit</button></a></td>
    </tr>';
  }
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title">States</h4>
        <p class="card-subtitle mb-4 font-size-13">List of all States. Total Number = <?php echo $total_states; ?></p>
        <p><a href="edit-state.php"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Add State</button></a></p>

        <div class="table-responsive">
          <table class="table table-centered table-striped table-nowrap">
            <thead>
              <tr>
                <th>Name</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php
                echo $events_table;
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
