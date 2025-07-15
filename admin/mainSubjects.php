<?php include 'header.php' ?>
    <!-- Main content -->
    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <?php
            $main_subject_datasstmt = $pdo->prepare("SELECT * FROM main_subjects ORDER BY id DESC");
            $main_subject_datasstmt->execute();
            $main_subject_datas = $main_subject_datasstmt->fetchAll();
            ?>
            <table id="d-table" class="table">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Subject Name</th>
                      <th>Created At</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($main_subject_datas as $main_subject_data) {
                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $main_subject_data['subject_name'];   ?></td>
                    <td><?php echo $main_subject_data['created_at'];   ?></td>
                    <td>
                      <a href="editMainSubject.php?id=<?php echo $main_subject_data['id']; ?>" type="button" class="btn btn-warning text-light btn-sm mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                      </a>
                      <a href="courses.php?subject_id=<?php echo $main_subject_data['id']; ?>" type="button" class="btn btn-primary text-light btn-sm mr-1">
                        View Courses
                      </a>
                      <!-- <a href="addCourse.php?subject_id=<?php echo $main_subject_data['id']; ?>" type="button" class="btn btn-info text-light btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                          <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
                          <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                        Add New Course
                      </a> -->
                    </td>
                  </tr>
                  <?php
                  $no++;
                }
                 ?>
              </tbody>
          </table>
          </div>
        </div>
          </div>
        </div>
        </div>
<script type="text/javascript">
$(document).ready(function() {
  $('#d-table').DataTable();
})
</script>
