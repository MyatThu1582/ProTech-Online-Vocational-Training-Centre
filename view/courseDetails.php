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
  background-image: url('../images/homeimgnew.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  height:60%;
  margin-top: 0px;
  background-position: 100% 70%;
}
</style>
<body>
  <div class="fixed-top">
    <?php
    include '../css/navbar.php';
    ?>
  </div>
  <?php

  if (isset($_POST['send'])) {
    $user_id = $_SESSION['user_id'];
    $course_id = $_GET['course_id'];
    $comments = $_POST['comments'];

    $addFeedback = $query->addFeedback($comments, $course_id, $user_id);
  }

  if (isset($_POST['editFeedback'])) {
    $user_id = $_SESSION['user_id'];
    $new_omments = $_POST['newFeedback'];

    $editFeedback = $query->editFeedback($new_omments, $user_id);
  }

  $id = $_GET['course_id'];
  $coursestmt = $pdo->prepare("SELECT * FROM course WHERE id='$id'");
  $coursestmt->execute();
  $course = $coursestmt->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="bannar">
    <h2 class="text-light testhover" style="font-size:27px; padding-top:21.5%; padding-left:10%; font-weight:bold;">
      <a href="course.php" class="text-light"><?php echo $courseDetail['course']; ?></a> / <?php echo $course['name']; ?>
    </h2>
  </div>
    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="col-8 full courseDetail">
            <img src="../admin/images/<?php echo $course['image']; ?>" class="courseDetailimg" alt="" style="width:90%; height:50%; object-fit:cover;">
            <div class="mt-5 me-5">
              <h4>About Course</h4>
              <p><?php echo $course['content']; ?></p>
              <?php if (!empty($_SESSION['user_id']) &&!empty($_SESSION['name'])) {
                $user_id = $_SESSION['user_id'];
                $course_id = $_GET['course_id'];
                $permissioncheckstmt = $pdo->prepare("SELECT * FROM permission WHERE user_id='$user_id' AND course_id='$course_id'");
                $permissioncheckstmt->execute();
                $permissioncheck = $permissioncheckstmt->fetch(PDO::FETCH_ASSOC);
                if (!empty($permissioncheck) || $course['fee'] == 0) {
                  ?>
                  <a href="chapters&videos.php?course_id=<?php echo $course['id']; ?>" name="button" class="btn btn-primary float-end me-3" style="">
                    <?php echo $courseDetail['learning']; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                      <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                  </a>
                  <?php
                }else{
                  ?>
                  <a href="request.php?course_id=<?php echo $_GET['course_id']; ?>&course_name=<?php echo $course['name']; ?>" name="button" class="btn btn-primary float-end me-3" style="">
                    <?php echo $courseDetail['learning']; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                      <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                    </svg>
                  </a>
                  <?php
                }
                ?>
                <?php
              }else{
                ?>
                <a href="../login.php" name="button" class="btn btn-primary float-end me-3" style="">
                  <?php echo $courseDetail['learning']; ?>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                  <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                  </svg>
                </a>
                <?php
              }
              ?>
            </div>
        </div>
        <div class="col-4 p-0 full" style="margin:0px;">
          <div class="card ps-4 pt-3 pb-4 features">
            <h4 class="mt-2 mb-4"><b><?php echo $courseDetail['title']; ?></b></h4>
            <div class="d-flex mb-2 text-secondary">
              <div class="col-9 me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-watch" viewBox="0 0 16 16">
                  <path d="M8.5 5a.5.5 0 0 0-1 0v2.5H6a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5z"/>
                  <path d="M5.667 16C4.747 16 4 15.254 4 14.333v-1.86A6 6 0 0 1 2 8c0-1.777.772-3.374 2-4.472V1.667C4 .747 4.746 0 5.667 0h4.666C11.253 0 12 .746 12 1.667v1.86a6 6 0 0 1 1.918 3.48.502.502 0 0 1 .582.493v1a.5.5 0 0 1-.582.493A6 6 0 0 1 12 12.473v1.86c0 .92-.746 1.667-1.667 1.667zM13 8A5 5 0 1 0 3 8a5 5 0 0 0 10 0"/>
                </svg>
                <?php echo $courseDetail['sub_title1']; ?>
              </div>
              <div class="col">
                <?php
                  if(!empty($course['duration_year']) && !empty($course['duration_month'])){
                      echo $course['duration_year'] . " Year" . " & " . $course['duration_month'] . " Month";
                     }elseif(!empty($course['duration_year'])){
                       echo $course['duration_year'] . " Year";
                     }else{
                       echo $course['duration_month'] . " Month";
                     }
                ?>
              </div>
            </div>
            <div class="d-flex mb-2 text-secondary">
              <div class="col-9 me-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-btn" viewBox="0 0 16 16">
                  <path d="M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/>
                  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                </svg>
                <?php echo $courseDetail['sub_title2']; ?>
              </div>
              <div class="col">
                <?php echo $course['type']; ?>
              </div>
            </div>
            <div class="d-flex mb-2 text-secondary">
              <div class="col-8 me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
                </svg>
                <?php echo $courseDetail['sub_title3']; ?>
              </div>
              <div class="col" style="text-align:center;">
                <?php
                if ($course['fee'] == 0) {
                  ?>
                  Free
                  <?php
                }else{
                  echo $course['fee'] ." MMK";
                }
                 ?>
              </div>
            </div>
            <div class="d-flex mb-2 text-secondary">
              <div class="col-10 me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-text" viewBox="0 0 16 16">
                  <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                  <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                </svg>
                <?php echo $courseDetail['sub_title4']; ?>
              </div>
              <div class="col">
                Yes
              </div>
            </div>
          </div>

          <div class="text-center text-light p-2 bg-success mt-5 tohide" style="height:80px;">
          <h4><?php echo $course['name']; ?></h4>
          <?php
            $countchapterstmt = $pdo->prepare("SELECT COUNT(*) AS total_chapters FROM chapters WHERE course_id='$id'");
            $countchapterstmt->execute();
            $countchapter = $countchapterstmt->fetch(PDO::FETCH_ASSOC);

            $countvideostmt = $pdo->prepare("SELECT COUNT(*) AS total_videos FROM videos WHERE course_id='$id'");
            $countvideostmt->execute();
            $countvideo = $countvideostmt->fetch(PDO::FETCH_ASSOC);
          ?>
            <span class="float-start ms-3"><?php if($countchapter['total_chapters'] > 1){ echo $countchapter['total_chapters'] . " Chapters"; }else{ echo $countchapter['total_chapters'] . " Chapter"; } ?></span>
            <span class="float-end me-3"><?php echo $countvideo['total_videos']; ?> Videos</span>
          </div>
          <div class="m-4 pb-3 tohide">
          <?php
            $id = $_GET['course_id'];
            $chaptersstmt = $pdo->prepare("SELECT * FROM chapters WHERE course_id='$id'");
            $chaptersstmt->execute();
            $chaptersdatas = $chaptersstmt->fetchall();
            $i = 1;
            foreach ($chaptersdatas as $chaptersdata) {
              if (!empty($_SESSION['user_id']) && !empty($_SESSION['name'])) {
                $user_id = $_SESSION['user_id'];
                $permissioncheckstmt = $pdo->prepare("SELECT * FROM permission WHERE user_id='$user_id' AND course_id='$course_id'");
                $permissioncheckstmt->execute();
                $permissioncheck = $permissioncheckstmt->fetch(PDO::FETCH_ASSOC);
                if (!empty($permissioncheck) && $permissioncheck['course_id'] == $_GET['course_id'] || $course['fee'] == 0) {
                ?>
                <a href="chapters&videos.php?course_id=<?php echo $id; ?>&chapter_id=<?php echo $chaptersdata['id']; ?>&temp_id=<?php echo $i; ?>">
                  <div class="chapterdiv pt-2 ps-2" style="border-bottom:1px solid grey;">
                    <span style="font-size:12px;">Chapter <?php echo $i; ?></span>
                    <h5 data-bs-toggle="collapse" data-bs-target="#demo"><?php echo $chaptersdata['title']; ?></h5>
                  </div>
                </a>
                <?php
              }else{
                ?>
                <a href="request.php?course_id=<?php echo $_GET['course_id']; ?>&course_name=<?php echo $course['name']; ?>">
                  <div class="chapterdiv pt-2 ps-2" style="border-bottom:1px solid grey;">
                    <span style="font-size:12px;">Chapter <?php echo $i; ?></span>
                    <h5 data-bs-toggle="collapse" data-bs-target="#demo"><?php echo $chaptersdata['title']; ?></h5>
                  </div>
                </a>
                <?php
              }
              }else{
                ?>
                <a href="../login.php">
                  <div class="chapterdiv pt-2 ps-2" style="border-bottom:1px solid grey;">
                    <span style="font-size:12px;">Chapter <?php echo $i; ?></span>
                    <h5 data-bs-toggle="collapse" data-bs-target="#demo"><?php echo $chaptersdata['title']; ?></h5>
                  </div>
                </a>
                <?php
              }
            ?>
            <?php
            $i++;
          }
           ?>
         </div>
        </div>
      </div>
    </div>

    <!-- feedback -->
    <div class="row m-5 nomargin">
      <div class="col-6 ms-5 ps-4 full nomargin">
        <h3 class="ms-4"><?php echo $courseDetail['title1']; ?></h3>
        <?php
          $course_id = $course['id'];
          $feedbacks = $query->selectWithCol('feedback','course_id',$course_id);
          foreach ($feedbacks as $feedback) {
            $user_id = $feedback['user_id'];
            $userdatas = $query->select('users',$user_id);
            ?>
            <div class="row mt-5 mb-5 ms-3">
              <div class="col-1 text-center me-3 mt-1 feedbackprofile">
                <img src="../admin/images/<?php echo $userdatas['image']; ?>" alt="" class="feedbackprofile" style="width:50px; height:50px; border-radius:50px; object-fit:cover;">
              </div>
              <div class="col-10">
                <div class="d-flex">
                  <div class="col">
                    <h4><?php echo $userdatas['name']; ?></h4>
                  </div>
                  <div class="col text-end me-3">
                    <?php if (!empty($_SESSION['user_id']) && $_SESSION['user_id'] == $userdatas['id']) {
                      ?>
                      <form class="" action="" method="post">
                      <button type="submit" name="edit" class="btn btn-default btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                      </button>
                      <a href="../admin/delete.php?table_name=feedback&user_id=<?php echo $userdatas['id']; ?>&course_id=<?php echo $_GET['course_id']; ?>" type="button" class="btn text-danger btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                      </a>
                    </form>
                      <?php

                    } ?>
                  </div>
                </div>
                <?php
                if (isset($_POST['edit']) && $_SESSION['user_id'] == $userdatas['id']) {
                  ?>
                  <form class="" action="" method="post">
                    <input type="text" name="newFeedback" value="<?php echo $feedback['feedback']; ?>" style="width:430px;">
                    <button type="submit" name="editFeedback" class="btn btn-default" style="border:1px solid lightgrey;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                      </svg>
                    </button>
                  </form>
                  <?php
                }else{
                  ?>
                  <span><?php echo $feedback['feedback']; ?></span>
                  <?php
                }
                 ?>
              </div>
            </div>
            <?php
          }
         ?>
      </div>
      <div class="col-5 full feedbackdiv">
        <h3><?php echo $courseDetail['title2']; ?></h3>
        <form action="" method="post">
            <div class="form-group mt-4">
                <textarea id="comments" name="comments" class="form-control feedback" rows="10" placeholder="Your feedback here..." required></textarea>
            </div>
            <div class="form-group">
              <?php
              if (!empty($_SESSION['user_id']) && !empty($_SESSION['name'])) {
                ?>
                <button type="submit" name="send" class="btn btn-success mt-3 float-end">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                  </svg>
                  <?php echo $courseDetail['btn']; ?>
                </button>
                <?php
              }else{
                ?>
                <a href="../login.php" class="btn btn-success mt-4 float-end">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                  </svg>
                  <?php echo $courseDetail['btn']; ?>
                </a>
                <?php
              }
               ?>
            </div>
        </form>
      </div>
    </div>
<?php include '../css/footer.php'; ?>
