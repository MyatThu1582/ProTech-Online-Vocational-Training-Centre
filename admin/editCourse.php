<?php
include 'header.php';

  $nameError = "";
  $subject_idError = "";
  $descError = "";
  $contentError = "";
  $durationError = "";
  $typeError = "";
  $imageError = "";

$id = $_GET['id'];
if ($_POST) {
  $name = $_POST['name'];
  $subject_id = $_POST['subject_id'];
  $desc = $_POST['desc'];
  $content = $_POST['content'];
  $duration_year = $_POST['duration_year'];
  $duration_month = $_POST['duration_month'];
  $type = $_POST['type'];
  $fee = $_POST['fee'];

  if(empty($_POST['name']) || empty($_POST['subject_id']) || empty($_POST['desc'])|| empty($_POST['content']) || empty($_POST['type'])){

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
    if (empty($_POST['type'])) {
      $typeError = "The type is required !";
    }
    if (empty($_POST['duration_year']) && empty($_POST['duration_month'])) {
        $durationError = "The duration is required !";
    }
  }else{
    if ($_FILES['image']['name'] != null) {
      $file = 'images/'.($_FILES['image']['name']);
      $imageType = pathinfo($file,PATHINFO_EXTENSION);
      if ($imageType == 'jpg' || $imageType == 'JPG' || $imageType == 'jpeg' || $imageType == 'png') {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $file);
        $status = $query->editCoursewithimage($name, $subject_id, $desc, $content, $duration_year, $duration_month, $type, $fee, $image, $id);
      }else{
        echo "<script>alert('Image must be PNG, JPG, JPEEG')</script>";
      }
    }else{
      $status = $query->editCoursewithoutimage($name, $subject_id, $desc, $content, $duration_year, $duration_month, $type, $fee, $id);
    }
  }
}

$datas = $query->selectOneWithWhere('course','id',$id);

 ?>



    <!-- Main content -->
    <div class="container">
      <div class="row" style="height:1200px;">
        <div class="col-3">

        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <form class="" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" value="<?php if ($_POST) {
                     echo $name = $_POST['name'];
                  }else{ echo $datas['name']; }?>" class="form-control <?php if (!empty($nameError)) {?> is-invalid <?php } ?>">
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
                      <option value="<?php echo $main_subjectdata['id']; ?>" <?php if($datas['subject_id'] == $main_subjectdata['id']){ echo "selected";} ?>><?php echo $main_subjectdata['subject_name']; ?></option>
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
                  }else{ echo $datas['description']; }?>" class="form-control <?php if (!empty($descError)) {?> is-invalid <?php } ?>">
                  <span class="text-danger"><?php echo $descError; ?></span>
                </div>
                <div class="form-group">
                  <label>Content</label>
                  <textarea name="content" rows="6" cols="80" class="form-control<?php if (!empty($contentError)) {?> is-invalid <?php } ?>"><?php if ($_POST) {
                     echo $content = $_POST['content'];
                  }else{ echo $datas['content']; }?></textarea>
                  <span class="text-danger"><?php echo $contentError; ?></span>
                </div>
                <div class="form-group">
                  <label>Duration</label>
                  <div class="row">
                    <div class="col-6">
                      <input type="number" name="duration_year" value="<?php if ($_POST) {
                        echo $duration = $_POST['duration_year'];
                      }else{ echo $datas['duration_year']; }?>" class="form-control <?php if (!empty($durationError)) {?> is-invalid <?php } ?>" placeholder="year">
                    </div>
                    <div class="col-6">
                      <input type="number" name="duration_month" value="<?php if ($_POST) {
                        echo $duration = $_POST['duration_month'];
                      }else{ echo $datas['duration_month'];}?>" class="form-control <?php if (!empty($durationError)) {?> is-invalid <?php } ?>" placeholder="month">
                    </div>
                  </div>
                  <span class="text-danger"><?php echo $durationError; ?></span>
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <input type="text" name="type" value="<?php if ($_POST) {
                     echo $type = $_POST['type'];
                  }else{ echo $datas['type']; }?>" class="form-control <?php if (!empty($typeError)) {?> is-invalid <?php } ?>">
                  <span class="text-danger"><?php echo $typeError; ?></span>
                </div>
                <div class="form-group">
                  <label>Fee</label>
                  <input type="text" name="fee" value="<?php if ($_POST) {
                     echo $fee = $_POST['fee'];
                  }else{ echo $datas['fee']; } ?>" class="form-control <?php if (!empty($feeError)) {?> is-invalid <?php } ?>">
                  <span class="text-danger"><?php //echo $feeError; ?></span>
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="image" value="" class="form-control <?php if (!empty($imageError)) {?> is-invalid <?php } ?>">
                  <span class="text-danger"><?php echo $imageError; ?></span>
                  <img src="images/<?php echo escape($datas['image']); ?>" alt="" style="width:100%;" class="mt-3">
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="Update Course" class="btn btn-primary form-control">
                </div>
              </form>
            </div>
          </div>
          </div>
      </div>
  </div>

    <?php include 'footer.html'; ?>
