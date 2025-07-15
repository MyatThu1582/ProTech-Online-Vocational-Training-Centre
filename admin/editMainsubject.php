<?php
include 'header.php';

$subject_nameError = "";

$id = $_GET['id'];
if ($_POST) {
  if(empty($_POST['subject_name'])){
      $subject_nameError = "The Subject Name is required !";
  }else{
    $subject_name = $_POST['subject_name'];
    $status = $query->editMainSubject($subject_name, $id);
    }
      }

    $mainSubjectdata = $query->select('main_Subjects', $id);
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
                <label>Subject Name</label>
                <input type="text" name="subject_name" value="<?php if ($_POST) {
                   echo $subject_name = $_POST['subject_name'];
                }else{ echo $mainSubjectdata['subject_name']; }?>" class="form-control <?php if (!empty($subject_nameError)) {?> is-invalid <?php } ?>">
                <span class="text-danger"><?php echo $subject_nameError; ?></span>
              </div>
              <div class="form-group">
                <input type="submit" name="" value="Edit Main Subject" class="btn btn-primary form-control">
              </div>
            </form>
          </div>
        </div>
        </div>
    </div>
  </div>

    <?php include 'footer.html'; ?>
