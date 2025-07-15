<?php include 'header.php' ?>
    <!-- Main content -->
    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <?php
            $video_datas = $query->selectAll('videos');
            ?>
            <table id="d-tabe" class="table">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Course</th>
                      <th>Chapter</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Video</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($video_datas as $video_data) {
                  $chapter_id = $video_data['chapter_id'];
                  $chapterdatas = $query->selectOneWithWhere('chapters','id',$chapter_id);

                  $chapter = $chapterdatas['title'];

                  $course_id = $video_data['course_id'];
                  $coursedatas = $query->selectOneWithWhere('course','id',$course_id);

                  $course = $coursedatas['name'];

                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $course; ?></td>
                    <td><?php echo $chapter; ?></td>
                    <td><?php echo $video_data['title']; ?></td>
                    <td><?php echo substr($video_data['description'], 0,50); ?></td>
                    <td style="width:230px;">
                      <video width="100%" controls>
                        <source src="<?php echo $video_data['video_url']; ?>" type="video/mp4">
                      </video>
                    </td>
                    <td style="width:100px;">
                      <a href="editVideo.php?id=<?php echo $video_data['id']; ?>&course_id=<?php echo $course_id; ?>&chapter_id=<?php echo $chapter_id; ?>" type="button" class="btn btn-warning text-light btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                      </a>
                      <a href="delete.php?table_name=videos&id=<?php echo $video_data['id']; ?>" type="button" class="btn btn-danger btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                      </a>
                    </td>
                  </tr>
                  <?php
                  $i++;
                }
                 ?>
              </tbody>
          </table>
          </div>
      </div>
          </div>
        </div>
        </div>

<?php include 'footer.html'; ?>
<script type="text/javascript">
$(document).ready(function() {
  $('#d-table').DataTable();
})
</script>
