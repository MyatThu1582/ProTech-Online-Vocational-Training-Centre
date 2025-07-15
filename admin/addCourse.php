<?php
 include 'header.php';

$nameError = "";
$subject_idError = "";
$descError = "";
$contentError = "";
$durationError = "";
$typeError = "";
$feeError = "";
$imageError = "";

if (!empty($_GET['subject_id'])) {
  $subject_id = $_GET['subject_id'];
}else{
  $subject_id = $_SESSION['subject_id'];
}
if ($_POST) {
  // echo $image = $_FILES['image']['name'];

  if(empty($_POST['name']) || empty($_POST['subject_id']) || empty($_POST['desc']) || empty($_POST['content']) || empty($_POST['duration_year']) && empty($_POST['duration_month']) || empty($_POST['type']) || empty($_POST['fee']) || empty($_FILES['image']['name'])){

    if (empty($_POST['name'])) {
      $nameError = "The name is required !";
    }
    if (empty($_POST['subject_id'])) {
      $subject_idError = "The Subject Name is required !";
    }
    if (empty($_POST['desc'])) {
      $descError = "The description is required !";
    }
    if (empty($_POST['content'])) {
      $contentError = "The content is required !";
    }
    if (empty($_POST['duration_year']) && empty($_POST['duration_month'])) {
      $durationError = "The duration is required !";
    }
    if (empty($_POST['type'])) {
      $typeError = "The type is required !";
    }
    if (empty($_POST['fee'])) {
      $feeError = "The fee is required !";
    }
    if (empty($_FILES['image']['name'])) {
      $imageError = "The image is required !";
    }
  }else{
    $file = 'images/'.($_FILES['image']['name']);
    $imageType = pathinfo($file,PATHINFO_EXTENSION);
    if ($imageType == 'jpg' || $imageType == 'jpeg' || $imageType == 'png') {
      $name = $_POST['name'];
      $desc = $_POST['desc'];
      $content = $_POST['content'];
      $duration_year = $_POST['duration_year'];
      $duration_month = $_POST['duration_month'];
      $type = $_POST['type'];
      $fee = $_POST['fee'];
      $image = $_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'], $file);
      $status = $query->addCourse($name, $desc, $content, $duration_year, $duration_month, $type, $fee, $image, $subject_id);
    }else{
      echo "<script>alert('Image must be PNG, JPG, JPEEG')</script>";
    }
      }
    }
 ?>

    <!-- Main content -->
    <div class="container">
    <div class="row" style="height:850px;">
      <div class="col-3">

      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <form class="" action="addCourse.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php if ($_POST) {
                   echo $name = $_POST['name'];
                }?>" class="form-control <?php if (!empty($nameError)) {?> is-invalid <?php } ?>">
                <span class="text-danger"><?php echo $nameError; ?></span>
              </div>
              <div class="form-group">
                <label>Main Subject</label>
                <select class="form-control <?php if (!empty($subject_idError)) {?> is-invalid <?php } ?>" name="subject_id">
                  <option value="">Select Main Subject</option>
                  <?php
                  $main_subjectstmt = $pdo->prepare("SELECT * FROM main_subjects ORDER BY id DESC");
                  $main_subjectstmt->execute();
                  $main_subjectdatas = $main_subjectstmt->fetchAll();
                  foreach ($main_subjectdatas as $main_subjectdata) {
                    ?>
                    <option value="<?php echo $main_subjectdata['id']; ?>" <?php if($main_subjectdata['id'] == $subject_id){ echo "selected"; } ?>><?php echo $main_subjectdata['subject_name']; ?></option>
                    <?php
                  }
                   ?>
                </select>
                <span class="text-danger"><?php echo $subject_idError; ?></span>
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" name="desc" value="<?php if ($_POST) {
                   echo $desc = $_POST['desc'];
                }?>" class="form-control <?php if (!empty($descError)) {?> is-invalid <?php } ?>">
                <span class="text-danger"><?php echo $descError; ?></span>
              </div>
              <div class="form-group">
                <label>Content</label>
                <textarea name="content" rows="3" cols="40" class="form-control<?php if (!empty($contentError)) {?> is-invalid <?php } ?>"><?php if ($_POST) {
                   echo $content = $_POST['content'];
                }?></textarea>
                <span class="text-danger"><?php echo $contentError; ?></span>
              </div>
              <div class="form-group">
                <label>Duration</label>
                <div class="row">
                  <div class="col-6">
                    <input type="number" name="duration_year" value="<?php if ($_POST) {
                      echo $duration = $_POST['duration_year'];
                    }?>" class="form-control <?php if (!empty($durationError)) {?> is-invalid <?php } ?>" placeholder="year">
                  </div>
                  <div class="col-6">
                    <input type="number" name="duration_month" value="<?php if ($_POST) {
                      echo $duration = $_POST['duration_month'];
                    }?>" class="form-control <?php if (!empty($durationError)) {?> is-invalid <?php } ?>" placeholder="month">
                  </div>
                </div>
                <span class="text-danger"><?php echo $durationError; ?></span>
              </div>
              <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" value="<?php if ($_POST) {
                   echo $type = $_POST['type'];
                }?>" class="form-control <?php if (!empty($typeError)) {?> is-invalid <?php } ?>">
                <span class="text-danger"><?php echo $typeError; ?></span>
              </div>
              <div class="form-group">
                <label>Fee</label>
                <input type="text" name="fee" value="<?php if ($_POST) {
                   echo $fee = $_POST['fee'];
                }?>" class="form-control <?php if (!empty($feeError)) {?> is-invalid <?php } ?>">
                <span class="text-danger"><?php echo $feeError; ?></span>
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" value="" class="form-control <?php if (!empty($imageError)) {?> is-invalid <?php } ?>">
                <span class="text-danger"><?php echo $imageError; ?></span>
              </div>
              <div class="form-group">
                <input type="submit" name="" value="Add New Course" class="btn btn-primary form-control">
              </div>
            </form>
          </div>
        </div>
        </div>
    </div>
  </div>

    <?php include 'footer.html'; ?>
