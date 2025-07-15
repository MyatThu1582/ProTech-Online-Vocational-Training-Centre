<?php
 include 'header.php';
 ?>

    <!-- Main content -->
    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th style="">Id</th>
                  <th>Chapter Name</th>
                  <th>Course</th>
                  <th>Description</th>
                  <th>Total Videos</th>
                  <th style="width:240px;">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $chapterdatas = $query->selectAll('chapters');
                $i = 1;
                foreach ($chapterdatas as $chapterdata) {
                  $course_id = $chapterdata['course_id'];
                  $chapter_id = $chapterdata['id'];

                  $course_iddatas = $query->selectOneWithWhere('course','id',$course_id);

                  $total_videodatas = $query->selectCountWithWhere('total_video', 'videos', 'chapter_id',$chapter_id);
                  $total_videos = $total_videodatas['total_video'];
                  ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo escape($chapterdata['title']);?></td>
                    <td><?php echo escape($course_iddatas['name']); ?></td>
                    <td><?php echo escape(substr($chapterdata['description'], 0,30)); ?></td>
                    <td><?php if($total_videos != 0){ echo $total_videos; }else{ echo "-"; } ?></td>
                    <td style="width:230px;">
                      <a href="editChapter.php?id=<?php echo $chapterdata['id']; ?>" type="button" class="btn btn-warning text-light btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                      </a>
                      <a href="delete.php?table_name=chapters&id=<?php echo $chapterdata['id']; ?>" type="button" class="btn btn-danger btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                      </a>
                      <a href="addVideo.php?course_id=<?php echo $course_id; ?>&chapter_id=<?php echo $chapterdata['id']; ?>" type="button" class="btn btn-info text-light btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                          <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
                          <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
                        </svg>
                        Add New Video
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
