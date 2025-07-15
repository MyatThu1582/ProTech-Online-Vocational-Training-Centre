<?php
include 'header.php';

$titleError = "";
$descriptionError = "";
$videoError = "";

if ($_POST) {
  echo "POST";
  if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['video'])){

    if (empty($_POST['title'])) {
      $titleError = "The title is required !";
    }
    if (empty($_POST['description'])) {
      $descriptionError = "The description is required !";
    }
    if (empty($_POST['video'])) {
      $videoError = "The video is required !";
    }
  }else{
    echo "Yes";
    $title = $_POST['title'];
    $course_id = $_GET['course_id'];
    $chapter_id = $_GET['chapter_id'];
    $description = $_POST['description'];
    $video = $_POST['video'];

    // $file = 'videos/'.($_FILES['video']['name']);
    // $videoType = pathinfo($file,PATHINFO_EXTENSION);
    // if ($videoType == 'MP4' || $videoType == 'mp4') {
    //   $video = $_FILES['video']['name'];
    //   move_uploaded_file($_FILES['video']['tmp_name'], $file);
    //   $status = $query->addVideo($title, $chapter_id, $description, $video);
    // }else{
    //   echo "<script>alert('Image must be PNG, JPG, JPEEG')</script>";
    // }

      $status = $query->addVideo($title, $course_id, $chapter_id, $description, $video);
      }
    }
 ?>



    <!-- Main content -->
    <div class="container">
    <div class="row">
      <div class="col-3">

      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <form class="" action="" method="post">
              <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
              <div class="form-group">
                <label>Video Title</label>
                <input type="text" name="title" value="<?php if ($_POST) {
                   echo $title = $_POST['title'];
                }?>" class="form-control <?php if (!empty($titleError)) {?> is-invalid <?php } ?>">
                <span class="text-danger"><?php echo $titleError; ?></span>
              </div>
              <!-- <div class="form-group">
                <label>Chapter</label>
                <select class="form-control <?php if (!empty($chapter_idError)) {?> is-invalid <?php } ?>" name="chapter_id">
                  <option>SELECT CHAPTER</option>
                  <?php
                    $chapterdatas = $query->selectAll('chapters');
                    foreach ($chapterdatas as $chapterdata) {
                      ?>
                      <option value="<?php echo $chapterdata['id']; ?>"><?php echo $chapterdata['title']; ?></option>
                      <?php
                    }
                   ?>
                </select>
                <span class="text-danger"><?php echo $chapter_idError; ?></span>
              </div> -->
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="3" cols="40" class="form-control<?php if (!empty($descriptionError)) {?> is-invalid <?php } ?>"><?php if ($_POST) {
                   echo $description = $_POST['description'];
                }?></textarea>
                <span class="text-danger"><?php echo $descriptionError; ?></span>
              </div>
              <div class="form-group">
                <label>Video url</label>
                <input type="text" name="video" value="" class="form-control <?php if (!empty($videoError)) {?> is-invalid <?php } ?>">
                <!-- <input type="file" name="video" value="" class="form-control <?php if (!empty($videoError)) {?> is-invalid <?php } ?>"> -->
                <span class="text-danger"><?php echo $videoError; ?></span>
              </div>
              <div class="form-group">
                <input type="submit" name="" value="Add New Video" class="btn btn-primary form-control">
              </div>
            </form>
          </div>
        </div>
        </div>
    </div>
  </div>

    <?php include 'footer.html'; ?>
