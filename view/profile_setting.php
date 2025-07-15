<?php
include '../Controllers/query.ctr.php';
$query = new Query();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/sweetalert.js"></script>
    <?php include '../css/link.php'; ?>
</head>
<?php
$user_id = $_SESSION['user_id'];
if (isset($_POST['editProfilebtn'])) {
  $file = '../admin/images/'.($_FILES['image']['name']);
  $imageType = pathinfo($file,PATHINFO_EXTENSION);
  if ($imageType == 'jpg' || $imageType == 'JPG' || $imageType == 'jpeg' || $imageType == 'png') {
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], $file);

    $editProfileImg = $query->editProfile($image, $user_id);

  }else{
    echo "No";
  }
}

$oldPasswordError = "";
$newPasswordError = "";

if (isset($_POST['editPassBtn'])) {
  $oldPassword = $_POST['oldPassword'];
  $newPassword = $_POST['newPassword'];

  $datas = $query->select('users',$user_id);

  if (password_verify($oldPassword, $datas['password'])) {
    if (strlen($newPassword) >= 6) {
      $editpassword = $query->editPassword($newPassword, $user_id);
    }else{
      $newPasswordError = "The Password have to be atleast 6 Charactors";
    }
  }else{
    $oldPasswordError = "Incorrect Your Old Password";
  }
}
?>
<style media="screen">
.bannar{
  background-image: url('../images/banner-bg - 3.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  height:60%;
  margin-top: 0px;
  background-position: 100% 55%;
}
.profile_setting_hide{
  display: none;
}
.active{
  display: block;
}
</style>
<body>
  <div class="fixed-top">
    <?php
    include '../css/navbar.php';
    ?>
  </div>
  <div class="bannar">
    <h2 class="text-dark testhover" style="font-size:30px; padding-top:21.5%; padding-left:10%; font-weight:bold;">
      Profile <span class="text-danger">Setting</span>
    </h2>
  </div>

  <div class="container p-5 mt-5 mb-5">
    <div class="m-5">
      <div class="card-body d-flex">

        <div class="col-3" style="border-right:1px solid lightgrey;">
          <button class="editLinks" id="editProfilebtn">
            <h5>Edit Profile</h5>
          </button>
          <hr>
          <button class="editLinks" id="editPasswordbtn">
            <h5>Change Password</h5>
          </button>
        </div>

        <div class="col-8">
          <div class="profile_setting_hide" id="editProfile">
            <div class="col d-flex">
              <!-- <input type="file" name="" value="" class="bg-danger"> -->

              <?php
              $datas = $query->select('users',$user_id);
              // print_r($datas);
              if (!empty($datas['image'])) {
                ?>
                <div id="container_profile_with_img" class="editprofile" style="background-image: url('../admin/images/<?php echo $datas['image']; ?>'); background-size: cover; background-repeat: no-repeat;">
                  <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="camera_with_img">
                      <input type="file" name="image" value="" style="padding-left:150px;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-camera camera-icon" viewBox="0 0 16 16">
                        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z"/>
                        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                      </svg>
                    </div>
                    <button type="submit" name="editProfilebtn" style="margin:0; padding:0;" class="submitbtn"></button>
                  </form>
                </div>
                <?php
              }else{
                ?>
                <div id="container_profile" class="editprofile" style="margin-left:100px;">
                  <span id="firstName_profile" style="display:none;"><?php echo $_SESSION['name']; ?></span>
                  <div id="name_profile"></div>
                  <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="camera">
                      <input type="file" name="image" value="" style="padding-left:150px;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-camera camera-icon" viewBox="0 0 16 16">
                        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z"/>
                        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                      </svg>
                    </div>
                    <button type="submit" name="editProfilebtn" style="margin:0; padding:0;" class="submitbtn"></button>
                  </form>
                </div>
                <?php
              }
              ?>

            </div>
          </div>

          <div class="profile_setting_hide ms-5" id="editPassword">
            <div class="ms-5">
              <div class="card-body">
                <form class="" action="" method="post">
                  <h4>Change Password</h4>
                  <div class="form-group mt-5">
                    <span class="font-size:40px;">Old Password</span>
                    <input type="text" name="oldPassword" value="" class="form-control inpv2">
                    <span class="text-danger"><?php echo $oldPasswordError; ?></span>
                  </div>
                  <div class="form-group mt-4">
                    <span class="font-size:40px;">New Password</span>
                    <input type="password" name="newPassword" value="" class="form-control inpv2">
                    <span class="text-danger"><?php echo $newPasswordError; ?></span>
                  </div>
                  <div class="form-group mt-4">
                    <input type="submit" name="editPassBtn" value="Comfirm" class="btn btn-success float-end inpv2">
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    let name_profile = document.querySelector('#firstName_profile').innerText;
    let initials_profile = name_profile.charAt(0);
    document.getElementById("name_profile").innerHTML = initials_profile;
  </script>

  <?php include '../css/footer.php'; ?>
