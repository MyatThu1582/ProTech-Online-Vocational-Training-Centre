<?php

include 'header.php';

  $id = $_GET['id'];
  $titleError = "";
  $course_idError = "";
  $descriptionError = "";

  if ($_POST) {
    $title = $_POST['title'];
    $course_id = $_POST['course_id'];
    $description = $_POST['description'];

    if(empty($_POST['title']) || empty($_POST['course_id']) || empty($_POST['description'])){

      if (empty($_POST['title'])) {
        $titleError = "The title is required !";
      }
      if (empty($_POST['course_id'])) {
        $course_idError = "The course_id is required !";
      }
      if (empty($_POST['description'])) {
        $descriptionError = "The description is required !";
      }
    }else{
        $status = $query->editChapter($title, $course_id, $description, $id);
        }
      }

$datas = $query->selectOneWithWhere('chapters', 'id', $id);
// print"<pre>";
// print_r($datas);
// exit();
 ?>

    <!-- Main content -->
    <div class="container">
    <div class="row">
      <div class="col-3">

      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <form class="" action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
              <div class="form-group">
                <label>Chapter Title</label>
                <input type="text" name="title" value="<?php if ($_POST) {
                   echo $title = $_POST['title'];
                }else{ echo $datas['title'];}?>" class="form-control <?php if (!empty($titleError)) {?> is-invalid <?php } ?>">
                <span class="text-danger"><?php echo $titleError; ?></span>
              </div>
              <div class="form-group">
                <label>Course_id</label>
                <select class="form-control <?php if (!empty($course_idError)) {?> is-invalid <?php } ?>" name="course_id">
                  <?php
                  $coursedatas = $query->selectAll('course');
                  foreach ($coursedatas as $coursedata) {
                    ?>
                    <option value="<?php echo $coursedata['id']; ?>" <?php if($datas['course_id'] == $coursedata['id']){ echo "selected"; } ?>><?php echo $coursedata['name']; ?></option>
                    <?php
                  }
                   ?>
                </select>
                <span class="text-danger"><?php echo $course_idError; ?></span>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="3" cols="40" class="form-control<?php if (!empty($descriptionError)) {?> is-invalid <?php } ?>"><?php if ($_POST) {
                   echo $description = $_POST['description'];
                }?><?php echo $datas['description']; ?></textarea>
                <span class="text-danger"><?php echo $descriptionError; ?></span>
              </div>
              <div class="form-group">
                <input type="submit" name="" value="Edit Chapter" class="btn btn-primary form-control">
              </div>
            </form>
          </div>
        </div>
        </div>
    </div>
  </div>

    <?php include 'footer.html'; ?>
