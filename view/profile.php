<?php
include '../Controllers/query.ctr.php';
$query = new Query();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../css/link.php'; ?>
</head>
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
    <!-- <h2 class="text-dark testhover" style="font-size:30px; padding-top:21.5%; padding-left:10%; font-weight:bold;">
      Profile / <?php echo $_SESSION['name']; ?>
    </h2> -->
    <div class="col d-flex" style="padding-top:17.3%;">
      <?php
      $user_id = $_SESSION['user_id'];
      $datas = $query->select('users',$user_id);
      if (!empty($datas['image'])) {
        ?>
        <div id="container_profile_with_img" style="background-image: url('../admin/images/<?php echo $datas['image']; ?>'); background-size: cover; background-repeat: no-repeat;"></div>
        <?php
      }else{
        ?>
        <div id="container_profile">
          <span id="firstName_profile" style="display:none;"><?php echo $_SESSION['name']; ?></span>
          <div id="name_profile"></div>
        </div>
        <?php
      }
       ?>
      <div class="ms-5 mt-4 pt-2">
        <h1><?php echo $_SESSION['name']; ?></h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="36" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
          <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
        </svg>
        <span style="font-size:20px;"><?php echo $_SESSION['email']; ?></span>
      </div>
    </div>
  </div>

  <div class="container p-5 mt-5 mb-5">

  <!-- Requested Course -->

  <div class="row">
      <?php
        $user_id = $_SESSION['user_id'];
        $request_coursestmt = $pdo->prepare("SELECT * FROM request_users WHERE user_id='$user_id'");
        $request_coursestmt->execute();
        $request_courses = $request_coursestmt->fetchall();
        if (!empty($request_courses)) {
      ?>
      <h4 class="mt-1 ms-5 ps-3"><b>Your Requested Course</b></h4>
      <div class="d-flex ms-5 me-5 mb-5 mt-3">
        <?php
        foreach ($request_courses as $request_course) {
          $course_id = $request_course['course_id'];
          $datas = $query->selectOneWithWhere('course', 'id', $course_id);
          ?>
            <div class="col-5 p-4">
            <div class="course">
              <div class="" style="width:100%; height:250px;">
                <img src="../admin/images/<?php echo $datas['image']; ?>" alt="" style="width:100%; height:100%; object-fit:cover;">
              </div>
              <div class="course_content">
                <h4 class="mt-1 mb-2"><?php echo $datas['name']; ?></h4>
                <span class="mb-5" style="color:grey;"># <?php echo $datas['description']; ?></span>
                <p><?php echo substr($datas['content'], 0, 150); ?></p>
              </div>
              <hr>
              <div class="row mb-3">
                <div class="col-7 ms-3 mt-2">
                  Request Date - <span class="text-primary"><?php echo date('d/m/Y', strtotime($request_course['date'])); ?></span>
                </div>
                <div class="col">
                  <?php
                  $course_id = $datas['id'];
                  if (!empty($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $checkCoursestmt = $pdo->prepare("SELECT * FROM permission WHERE course_id = '$course_id' AND user_id = '$user_id'");
                    $checkCoursestmt->execute();
                    $checkCoursedatas = $checkCoursestmt->fetch(PDO::FETCH_ASSOC);
                    if (!empty($checkCoursedatas)) {
                      $course_id = $checkCoursedatas['course_id'];
                      $chapterstmt = $pdo->prepare("SELECT * FROM chapters WHERE course_id = '$course_id' ORDER BY id");
                      $chapterstmt->execute();
                      $chapterdatas = $chapterstmt->fetch(PDO::FETCH_ASSOC);
                      if (!empty($chapterdatas)) {
                        ?>
                        <a href="chapters&videos.php?course_id=<?php echo $course_id; ?>&chapter_id=<?php echo $chapterdatas['id']; ?>&temp_id=1" name="button" class="btn btn-primary ms-4 mt-2 btn-sm">Whatch Now</a>
                        <?php
                      }else{
                        ?>
                        <a href="chapters&videos.php?course_id=<?php echo $course_id; ?>" name="button" class="btn btn-primary ms-4 mt-2 btn-sm">Whatch Now</a>
                        <?php
                      }
                    }else{
                      ?>
                      <a href="courseDetails.php?course_id=<?php echo $datas['id']; ?>" name="button" class="btn btn-success ms-4 mt-2 btn-sm">Whatch Now</a>
                      <?php
                    }
                  }else{
                    ?>
                    <a href="courseDetails.php?course_id=<?php echo $datas['id']; ?>" name="button" class="btn btn-success ms-4 mt-2 btn-sm">Whatch Now</a>
                    <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      <?php
        $status = "";
      }else{
        $status = "nothing";
      }
      ?>
    </div>
    <!-- Requested Course -->

    <!-- Owned Course -->

    <div class="row">
      <?php
      $owned_coursestmt = $pdo->prepare("SELECT * FROM permission WHERE user_id='$user_id'");
      $owned_coursestmt->execute();
      $owned_courses = $owned_coursestmt->fetchall();
      if (!empty($owned_courses)) {
        ?>
        <h4 class="mt-1 ms-5 ps-3"><b>Your Course Details</b></h4>
        <div class="d-flex ms-5 me-5 mt-3">
        <?php
          foreach($owned_courses as $owned_course) {
            $owned_course_id = $owned_course['course_id'];
            $datas = $query->selectOneWithWhere('course','id',$owned_course_id);
            ?>
          <div class="col-5 p-3 ms-2">
          <div class="course">
            <div class="" style="width:100%; height:250px;">
              <img src="../admin/images/<?php echo $datas['image']; ?>" alt="" style="width:100%; height:100%; object-fit:cover;">
            </div>
            <div class="course_content">
              <h4 class="mt-1 mb-2"><?php echo $datas['name']; ?></h4>
              <span class="mb-5" style="color:grey;"># <?php echo $datas['description']; ?></span>
              <p><?php echo substr($datas['content'], 0, 150); ?></p>
            </div>
            <hr>
            <div class="row mb-3">
              <div class="col-7 ms-3 mt-2">
                Expire Date - <span class="text-success"><?php echo date('d/m/Y', strtotime($owned_course['expire_date'])); ?></span>
              </div>
              <div class="col">
                <?php
                $course_id = $datas['id'];
                if (!empty($_SESSION['user_id'])) {
                  $user_id = $_SESSION['user_id'];
                  $checkCoursestmt = $pdo->prepare("SELECT * FROM permission WHERE course_id = '$course_id' AND user_id = '$user_id'");
                  $checkCoursestmt->execute();
                  $checkCoursedatas = $checkCoursestmt->fetch(PDO::FETCH_ASSOC);
                  if (!empty($checkCoursedatas)) {
                    $course_id = $checkCoursedatas['course_id'];
                    $chapterstmt = $pdo->prepare("SELECT * FROM chapters WHERE course_id = '$course_id' ORDER BY id");
                    $chapterstmt->execute();
                    $chapterdatas = $chapterstmt->fetch(PDO::FETCH_ASSOC);
                    if (!empty($chapterdatas)) {
                      ?>
                      <a href="chapters&videos.php?course_id=<?php echo $course_id; ?>&chapter_id=<?php echo $chapterdatas['id']; ?>&temp_id=1" name="button" class="btn btn-primary ms-4 btn-sm">Whatch Now</a>
                      <?php
                    }else{
                      ?>
                      <a href="chapters&videos.php?course_id=<?php echo $course_id; ?>" name="button" class="btn btn-primary ms-4 btn-sm">Whatch Now</a>
                      <?php
                    }
                  }else{
                    ?>
                    <a href="courseDetails.php?course_id=<?php echo $coursedata['id']; ?>" name="button" class="btn btn-success ms-4 btn-sm">Whatch Now</a>
                    <?php
                  }
                }else{
                  ?>
                  <a href="courseDetails.php?course_id=<?php echo $coursedata['id']; ?>" name="button" class="btn btn-success ms-4 btn-sm">Whatch Now</a>
                  <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>

        <?php
            }
        ?>

        </div>
        <?php
        $status2 = "";
      }else{
        $status2 = "nothing";
      }
      ?>
    </div>

    <!-- Owned Course -->

     <?php
     if ($status == "nothing" && $status2 == "nothing") {
       ?>
       <h6>No Result..</h6>
       <?php
     }
      ?>
  </div>
</div>
<script type="text/javascript">
  let name_profile = document.querySelector('#firstName_profile').innerText;
  let initials_profile = name_profile.charAt(0);
  document.getElementById("name_profile").innerHTML = initials_profile;
</script>

<?php include '../css/footer.php'; ?>
