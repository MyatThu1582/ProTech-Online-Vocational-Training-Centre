<?php
include '../Controllers/query.ctr.php';
$query = new Query();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProTech - Courses</title>
    <?php include '../css/link.php'; ?>
</head>
<style media="screen">
:root { --nav-h: 72px; }

.bannar {
  /* size & spacing */
  min-height: calc(60vh - var(--nav-h));
  margin: 0;
  display: flex;
  align-items: flex-end;
  padding: 0 10% 8%;

  /* parallax‑style background */
  background: url("../images/accounting2new.jpg") center/cover no-repeat fixed;
  background-position: 50% 63%;           /* keep your Y‑offset */

  /* readability */
  position: relative;
  color: #fff;
  overflow: hidden;
}

.bannar::before {                         /* soft dark overlay */
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(
              0deg,
              rgba(0,0,0,.55) 0%,
              rgba(0,0,0,.15) 60%,
              rgba(0,0,0,.05) 100%);
  /* backdrop-filter: blur(2px);             tiny blur = premium */
  z-index: 0;
}

.bannar h2 {
  opacity: 0;
  transform-origin: left bottom;
  transform: translateY(20px) rotate(0deg);
  animation: slightTilt 0.5s ease-out 0.1s forwards;
}

@keyframes slightTilt {
  0% {
    opacity: 0;
    transform: translateY(-5px) rotate(-5deg);
  }
  100% {
    opacity: 1;
    transform: translateY(0) rotate(0deg);
  }
}
/* mobile fall‑back: fixed often disabled on iOS, so make banner taller */
@media (max-width: 576px) {
  .bannar { min-height: 70vh; background-attachment: scroll; }
}

</style>
<body>
  <div class="fixed-top">
    <?php
    include '../css/navbar.php';
    ?>
  </div>
  <div class="bannar">
    <h2 class="text-light testhover" style="font-size:27px; padding-top:21.5%; padding-left:10%; font-weight:bold;">
      <a href="course.php" class="text-light"><?php echo $course['course']; ?><a>
    </h2>
  </div>
  <div class="container course_intro">
    <div class="row m-5 p-3 course_introleft float-up">
      <div class="col-7 mt-3 mb-5 full">
        <h4><b><?php echo $course['why']; ?></b></h4>
        <div class="d-flex mt-3" style="align-items:center;">
          <div class="col-1 mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-all text-success" viewBox="0 0 16 16">
              <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0"/>
              <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708"/>
            </svg>
          </div>
          <div class="col">
            <span><?php echo $course['tip2']; ?></span>
          </div>
        </div>
        <div class="d-flex" style="align-items:center;">
          <div class="col-1 mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-all text-success" viewBox="0 0 16 16">
              <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0"/>
              <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708"/>
            </svg>
          </div>
          <div class="col">
            <span><?php echo $course['tip1']; ?></span>
          </div>
        </div>
        <div class="d-flex mt-1" style="align-items:center;">
          <div class="col-1 mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-all text-success" viewBox="0 0 16 16">
              <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0"/>
              <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708"/>
            </svg>
          </div>
          <div class="col">
            <span><?php echo $course['tip3']; ?></span>
          </div>
        </div>
        <div class="d-flex mt-1" style="align-items:center;">
          <div class="col-1 mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-all text-success" viewBox="0 0 16 16">
              <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0"/>
              <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708"/>
            </svg>
          </div>
          <div class="col">
            <span><?php echo $course['tip5']; ?></span>
          </div>
        </div>
        <div class="d-flex mt-1" style="align-items:center;">
          <div class="col-1 mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2-all text-success" viewBox="0 0 16 16">
              <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0"/>
              <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708"/>
            </svg>
          </div>
          <div class="col">
            <span><?php echo $course['tip4']; ?></span>
          </div>
        </div>
      </div>
      <div class="col-5 mt-3 mb-5 full">
        <img src="../images/language3.jfif" alt="" style="width:100%; height:100%;" style="object-fit:cover;">
      </div>
    </div>

      <div class="m-5 ps-5 course_introleft">
        <div class="d-flex">
          <div class="col">
            <h3><?php echo $course['title']['title1']; ?><b class="text-danger"> <?php echo $course['title']['title2']; ?></b></h3>
          </div>
          <!-- extra btn, Not Use -->
          <div class="col">
            <div class="text-center mt-4">
              <a href="moreCourses.php?subject_id=<?php echo $subject_id; ?>" class=""></a>
            </div>
          </div>
        </div>
        <div class="row">
          <?php
          $coursedatas = $query->selectLimit('course', 4);
          foreach ($coursedatas as $coursedata) {
            ?>
            <div class="col-6 p-4 full">
              <div class="course">
                <div class="courseimg" style="width:100%; height:300px;">
                  <img src="../admin/images/<?php echo $coursedata['image']; ?>" alt="" style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div class="course_content">
                  <h4 class="mt-3 mb-2"><?php echo $coursedata['name']; ?></h4>
                  <span class="mb-4" style="color:grey;"># <?php echo $coursedata['description']; ?></span>
                  <p><?php echo substr($coursedata['content'], 0, 250); ?></p>
                </div>
                <hr>
                <div class="row mb-3">
                  <div class="col-7 ms-3 mt-2 price">
                    <?php echo $coursedata['fee']; ?> - Kyats
                  </div>
                  <div class="col">
                    <?php
                    $course_id = $coursedata['id'];
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
                          <a href="chapters&videos.php?course_id=<?php echo $course_id; ?>&chapter_id=<?php echo $chapterdatas['id']; ?>&temp_id=1" name="" class="btn btn-primary ms-4">Whatch Now</a>
                          <?php
                        }else{
                          ?>
                          <a href="chapters&videos.php?course_id=<?php echo $course_id; ?>" name="" class="btn btn-primary ms-4">Whatch Now</a>
                          <?php
                        }
                      }else{
                        ?>
                        <a href="courseDetails.php?course_id=<?php echo $coursedata['id']; ?>" name="" class="btn btn-success ms-4">Whatch Now</a>
                        <?php
                      }
                    }else{
                      ?>
                      <a href="courseDetails.php?course_id=<?php echo $coursedata['id']; ?>" name="" class="btn btn-success ms-4">Whatch Now</a>
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
      </div>
      <?php
        $mainSubjectData = $query->selectOne('main_subjects');
        $subject_id = $mainSubjectData['id'];
      ?>
      <div class="text-center">
        <a href="moreCourses.php?subject_id=<?php echo $subject_id; ?>" class="see-more-btn-rect">
          <span><?php echo $course['btn']; ?></span>
        </a>
      </div>
    </div>
  </div>
<?php include '../css/footer.php'; ?>