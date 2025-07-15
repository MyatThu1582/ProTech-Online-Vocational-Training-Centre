<?php
include 'header.php';

  $titleError = "";
  $descriptionError = "";
  $course_idError = "";
  $chapter_idError = "";
  $videoError = "";
  $id = $_GET['id'];
    if ($_POST) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $course_id = $_POST['course_id'];
      $chapter_id = $_POST['chapter_id'];
      $video = $_POST['video'];
      if(empty($_POST['title']) || empty($_POST['description'])|| empty($_POST['course_id']) || empty($_POST['chapter_id']) || empty($_POST['video'])){

        if (empty($_POST['title'])) {
          $nameError = "The title is required !";
        }
        if (empty($_POST['description'])) {
          $descError = "The description is required !";
        }
        if (empty($_POST['course_id'])) {
          $contentError = "The course_id is required !";
        }
        if (empty($_POST['chapter_id'])) {
          $durationError = "The chapter_id is required !";
        }
        if (empty($_POST['video'])) {
          $typeError = "The video is required !";
        }
      }else{
          $status = $query->editVideo($title, $description, $course_id, $chapter_id, $video, $id);
        }
    }

$datas = $query->selectOneWithWhere('videos','id',$id);
// print"<pre>";
// print_r($datas);
// exit();
 ?>



    <!-- Main content -->
    <div class="container" style="height:750px;">
      <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <form class="" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" value="<?php if ($_POST) {
                     echo $name = $_POST['title'];
                  }else{ echo $datas['title']; }?>" class="form-control <?php if (!empty($titleError)) {?> is-invalid <?php } ?>">
                  <span class="text-danger"><?php echo $titleError; ?></span>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" rows="6" cols="80" class="form-control<?php if (!empty($descriptionError)) {?> is-invalid <?php } ?>"><?php if ($_POST) {
                    echo $content = $_POST['description'];
                  }else{ echo $datas['description']; }?></textarea>
                  <span class="text-danger"><?php echo $descriptionError; ?></span>
                </div>
                <div class="form-group">
                  <label>Course</label>
                  <select class="form-control <?php if (!empty($course_idError)) {?> is-invalid <?php } ?>" name="course_id">
                    <?php
                    $coursedatas = $query->selectAll('course');
                    foreach ($coursedatas as $coursedata) {
                      ?>
                      <option value="<?php echo $coursedata['id']; ?>" <?php if($coursedata['id'] == $datas['course_id']){ echo "Selected"; } ?>><?php echo $coursedata['name']; ?></option>
                    <?php
                      }
                    ?>
                  </select>
                  <span class="text-danger"><?php echo $course_idError; ?></span>
                </div>
                <div class="form-group">
                  <label>Chapter</label>
                  <select class="form-control <?php if (!empty($chapter_idError)) {?> is-invalid <?php } ?>" name="chapter_id">
                    <?php
                    $chapterdatas = $query->selectAll('chapters');
                    foreach ($chapterdatas as $chapterdata) {
                      ?>
                      <option value="<?php echo $chapterdata['id']; ?>"<?php if($chapterdata['id'] == $datas['chapter_id']){ echo "Selected"; } ?>><?php echo $chapterdata['title']; ?></option>
                    <?php
                      }
                    ?>
                    </select>
                  <span class="text-danger"><?php echo $chapter_idError; ?></span>
                </div>
                <div class="form-group">
                  <label>Video</label>
                  <input type="text" name="video" value="<?php if ($_POST) {
                     echo $type = $_POST['video'];
                  }else{ echo $datas['video_url']; }?>" class="form-control <?php if (!empty($videoError)) {?> is-invalid <?php } ?>">
                  <span class="text-danger"><?php echo $videoError; ?></span>
                </div>

                <div class="form-group">
                  <input type="submit" name="" value="Update Video" class="btn btn-primary form-control">
                </div>
              </form>
            </div>
          </div>
          </div>
      </div>

    <?php include 'footer.html'; ?>
