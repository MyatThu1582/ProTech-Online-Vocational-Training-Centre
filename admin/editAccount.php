<?php
include 'header.php';

$nameError = "";
$emailError = "";
$passwordError = "";
$addressError = "";
$phoneError = "";
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_id = $_POST['role_id'];
    if(empty($name) || empty($email) || empty($role_id)){

      if (empty($name)) {
        $nameError = "The name is required !";
      }
      if (empty($email)) {
        $emailError = "The email is required !";
      }
      if (empty($role_id)) {
        $emailError = "The Role is required !";
      }
    }elseif (!empty($_POST['password']) && strlen($_POST['password']) < 4) {
      $passwordError = "The password should be 4 characters at least !!";
    }else{
      $id = $_GET['id'];
      if (!empty($_FILES['image']['name'])) {
        $file = 'images/'.($_FILES['image']['name']);
        $imageType = pathinfo($file,PATHINFO_EXTENSION);
        if ($imageType == 'jpg' || $imageType == 'jpeg' || $imageType == 'png') {
          $image = $_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'], $file);
          $status = $query->editUserwithimg($name, $email, $password, $role_id, $image, $id);
      }else{
        echo "No";
      }
    }
    $status = $query->editUser($name, $email, $password, $role_id, $id);
    }
}
$id = $_GET['id'];
$datas = $query->selectOneWithWhere('users','id',$id);
$user_id = $datas['id'];

$role_iddata = $query->selectOneWithWhere('role_user','user_id',$user_id);
$role_id = $role_iddata['role_id'];

$role_namedata = $query->selectOneWithWhere('roles','id',$role_id);
$role_name = $role_namedata['role_name'];
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
                <label>Name</label>
                <input type="text" name="name" value="<?php echo escape($datas['name']); ?>" class="form-control <?php if (!empty($nameError)) {?>is-invalid<?php  } ?>" >
                <span class="text-danger"><?php echo $nameError; ?></span>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo escape($datas['email']); ?>" class="form-control <?php if (!empty($emailError)) {?>is-invalid<?php  } ?>" >
                <span class="text-danger"><?php echo $emailError; ?></span>
              </div>
              <div class="form-group">
                <label>Passowrd</label><br>
                <span style="font-size:12px;">The user has already password</span>
                <input type="password" name="password" value="" class="form-control <?php if (!empty($passwordError)) {?>is-invalid<?php  } ?>">
                <span class="text-danger"><?php echo $passwordError; ?></span>
              </div>
              <div class="form-group">
                <label>Role</label>
                <select class="form-control <?php if (!empty($roleError)) {?>is-invalid<?php  } ?>" name="role_id">
                  <option>Select Role</option>
                  <?php
                  $roledatas = $query->selectAll('roles');
                  foreach ($roledatas as $roledata) {
                    ?>
                    <option value="<?php echo $roledata['id']; ?>" <?php if($roledata['role_name'] == $role_name){ echo "selected"; } ?>><?php echo $roledata['role_name']; ?></option>
                    <?php
                  }
                   ?>
                </select>
              </div>
              <div class="form-group text-center">
                <label class="float-left">Image</label>
                <input type="file" name="image" value="" class="form-control">
                <img src="images/<?php echo $datas['image']; ?>" alt="" width="60%" height="50%">
              </div>
              <div class="form-group">
                <input type="submit" name="" value="Update" class="btn btn-primary form-control">
                <!-- <a href="index.php" class="btn btn-danger ml-1">Back</a> -->
              </div>
            </form>
          </div>
        </div>
        </div>
    </div>
  </div>

    <?php include 'footer.html'; ?>
