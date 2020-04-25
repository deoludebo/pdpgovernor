<?php
    $pagetitle = 'News';

    include('header.php');
?>
<?php
  include '../php/config.php';

  $conn = new mysqli($servername, $username, $password, $db_name);

  $result = $conn -> query("SELECT * from news ORDER BY date DESC");
  $total_news = $result -> num_rows;
  $news_table = "";
  while($row = $result -> fetch_assoc()) {
    $date = date("Y-m-d", $row["date"]);
    $news_table .= '<tr>
    <td>' . $row["title"] . '</td>
    <td>' . $row["poster"] . '</td>
    <td>' . $row["type"] . '</td>
    <td>' . $date . '</td>
    <td><a href="edit-news.php?id=' . $row["id"] . '"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Edit</button></a></td>
    </tr>';
  }
 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title">News</h4>
        <p class="card-subtitle mb-4 font-size-13">List of all News. Total Number = <?php echo $total_news; ?></p>
        <p><a href="edit-news.php"><button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">Add News</button></a></p>

        <div class="table-responsive">
          <table class="table table-centered table-striped table-nowrap">
            <thead>
              <tr>

                <th>Title</th>
                <th>Poster</th>
                <th>Type</th>
                <th>Date</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
              <?php
                echo $news_table;
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
