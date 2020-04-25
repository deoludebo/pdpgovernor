<?php
    $pagetitle = 'Dashboard - View Governors';

    include('header.php');
?>
<?php
  include '../php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);

  $result = $conn -> query("SELECT * from governors");
  $total_governors = $result -> num_rows;
  $governors_table = "";
  while($row = $result -> fetch_assoc()) {
    $governors_table .= '<tr>
    <td>' . $row["name"] . '</td>
    <td>' . $row["title"] . '</td>
    <td><a href="edit-governors.php?id=' . $row["id"] . '"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Edit</button></a></td>
    </tr>';
  }
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title">Governors</h4>
        <p class="card-subtitle mb-4 font-size-13">List of all Governors. Total Number = <?php echo $total_governors; ?></p>
        <p><a href="edit-governors.php"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Add Governor</button></a></p>

        <div class="table-responsive">
          <table class="table table-centered table-striped table-nowrap">
            <thead>
              <tr>

                <th>Name</th>
                <th>Title</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php
                echo $governors_table;
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
