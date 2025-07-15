<?php
include '../Controllers/query.ctr.php';
$query = new Query();
if (empty($_SESSION['user_id']) && empty($_SESSION['name']) && empty($_SESSION['logged_in'])) {
  header('location: ../login.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../css/link.php'; ?>
    <script src="../js/sweetalert.js"></script>
</head>
<?php
$imageError = "";
$status = "";
if (isset($_POST['send'])) {
     $date = date('Y-m-d');
     $user_id = $_SESSION['user_id'];
     $course_id = $_GET['course_id'];
     if (empty($_FILES['image']['name'])) {
       $imageError = "Image is invalid";
     }else{
       $image = $_FILES['image']['name'];
       $file = '../request_images/'.($image);
       $imageType = pathinfo($file,PATHINFO_EXTENSION);
       if ($imageType == 'jpg' || $imageType == 'jpeg' || $imageType == 'png') {
         move_uploaded_file($_FILES['image']['tmp_name'], $file);

         $status = $query->addRequest($date, $user_id, $course_id, $image);
       }else{
         echo "<script>alert('Image must be PNG, JPG, JPEEG')</script>";
       }
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
</style>
<body>
  <div class="fixed-top">
    <?php
    include '../css/navbar.php';
    ?>
  </div>
  <div class="bannar">
    <h2 class="text-dark" style="font-size:27px; padding-top:21.5%; padding-left:10%; font-weight:bold;">
      <a href="course.php" class="text-dark"><?php echo $request['title']; ?></a> / <?php echo $request['title1']; ?>
    </h2>
  </div>
  <div class="container mt-5" style="margin-bottom:150px;">
    <?php
    $user_id = $_SESSION['user_id'];
    $course_id = $_GET['course_id'];
    $permissioncheckstmt = $pdo->prepare("SELECT * FROM request_users WHERE user_id='$user_id' AND course_id='$course_id'");
    $permissioncheckstmt->execute();
    $permissioncheck = $permissioncheckstmt->fetch(PDO::FETCH_ASSOC);
      if (!empty($permissioncheck)) {
        ?>
        <h5 style="margin-left:155px;"><span class="text-success"><?php echo $request['success']; ?></span><?php echo $request['message']; ?></h5>
        <?php
      }else{
        if ($_SESSION['language'] == 'Eng' || $_SESSION['language'] == 'eng') {
          ?>
          <h4 class="" style="margin-left:155px;">You Need To Request First To Learn <?php echo $_GET['course_name']; ?> !!</h4>
          <?php
        }else{
          ?>
          <h4 class="" style="margin-left:155px;"><?php echo $_GET['course_name']; ?> သင်ခန်းစာကိုသင်ယူရန် ဦးစွာအကြောင်းကြားရန် လိုအပ်ပါသည်</h4>
          <?php
        }
        ?>
        <?php
      }
     ?>
      <div class="p-5 m-auto mt-5" style="width:800px; border-right:2px solid lightblue; border-bottom:2px solid lightblue; box-shadow:0px 8px 16px 0px rgba(0,0,0,0.5);">
        <h5><?php echo $request['step1']; ?></h5>
          <div class="col-9 mt-4 mb-4 pt-5 pb-4" style="">
              <div class="d-flex">
                <div class="col-4 text-center me-5 ms-5">
                  <img src="../images/wave.jpg" alt="" width="80%" height="55%" class="mb-3 mt-4">
                  <h6 class="mt-3">09 - 799777997</h6>
                </div>
                <div class="col-4 text-center me-5" style="overflow:hidden;">
                  <img src="../images/kbz2.jpg" alt="" width="120%" height="80%" class="mb-2" style="margin-left:-20px;">
                  <h6>09 - 799555995</h6>
                </div>
                <div class="col-4 text-center">
                  <img src="../images/aya2.jpg" alt="" width="90%" height="80%" class="mb-2 mt-3" style="margin-bottom:-10px !important;">
                  <h6>09 - 298764598</h6>
                </div>
              </div>
          </div>
          <div class="mt-5 pt-3">
            <h5 class="mb-4"><?php echo $request['step2']; ?></h5>
            <div class="mt-5 mb-5">
              <form class="" action="" method="post" enctype="multipart/form-data">
                <span>Upload Photo</span>
                <input type="file" class="form-control <?php if(!empty($imageError)){ echo "is-invalid"; } ?>" name="image" value="" style="border:1px solid grey; margin-top:10px;">
                  <span class="text-danger"><?php echo $imageError; ?></span>
                  <button type="submit" name="send" class="mt-4 btn btn-primary form-control">Send</button>
                </form>
            </div>
          </div>
    </div>
  </div>
<?php include '../css/footer.php'; ?>
