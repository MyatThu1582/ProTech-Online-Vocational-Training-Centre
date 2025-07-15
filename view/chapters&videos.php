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
    <?php

     ?>
</head>
<body>
  <div class="fixed-top">
    <?php
    include '../css/navbar.php';
    ?>
  </div>
    <div class="" style="margin-top:73px;">
      <div class="d-flex">
        <div class="col-3" style="border-right:1px solid lightgrey; height:567px;">
          <?php
            $id = $_GET['course_id'];
            $coursestmt = $pdo->prepare("SELECT * FROM course WHERE id='$id'");
            $coursestmt->execute();
            $course = $coursestmt->fetch(PDO::FETCH_ASSOC);
           ?>
          <div class="p-2 m-4">
          <a href="courseDetails.php?course_id=<?php echo $id; ?>">
            <h4 class="ms-4"><?php echo $course['name']; ?></h4>
          </a>
          <?php
            $countchapterstmt = $pdo->prepare("SELECT COUNT(*) AS total_chapters FROM chapters WHERE course_id='$id'");
            $countchapterstmt->execute();
            $countchapter = $countchapterstmt->fetch(PDO::FETCH_ASSOC);

            $countvideostmt = $pdo->prepare("SELECT COUNT(*) AS total_videos FROM videos WHERE course_id='$id'");
            $countvideostmt->execute();
            $countvideo = $countvideostmt->fetch(PDO::FETCH_ASSOC);
          ?>
            <span class="float-start ms-4"><?php if($countchapter['total_chapters'] > 1){ echo $countchapter['total_chapters'] . " Chapters"; }else{ echo $countchapter['total_chapters'] . " Chapter"; } ?></span>
            <span class="ms-2">. <?php echo $countvideo['total_videos']; ?> Videos</span>
          </div>
          <div class="m-4 pb-3">
          <?php
            $id = $_GET['course_id'];
            $chaptersstmt = $pdo->prepare("SELECT * FROM chapters WHERE course_id='$id'");
            $chaptersstmt->execute();
            $chaptersdatas = $chaptersstmt->fetchall();
            if (!empty($chaptersdatas)) {
              $i = 1;
              foreach ($chaptersdatas as $chaptersdata) {
                ?>
                <a href="?course_id=<?php echo $id; ?>&chapter_id=<?php echo $chaptersdata['id']; ?>&temp_id=<?php echo $i; ?>" style="text-decoration:none; color:black;">
                  <div class="chapterdiv pt-2 ps-2" style="border-bottom: 1px solid grey; <?php if(!empty($_GET['chapter_id'])){ if($_GET['chapter_id'] == $chaptersdata['id']) { echo 'background-color: rgba(0, 0, 255, 0.7); color:white;'; } } ?>">
                    <span style="font-size:12px;">Chapter <?php echo $i; ?></span>
                    <h5 class="chapter_id"><?php echo $chaptersdata['title']; ?></h5>
                  </div>
                </a>
                <?php
                $i++;
              }
            }
              ?>
         </div>
        </div>
        <div class="col">
          <div class="">
            <?php
            if (!empty($_GET['temp_id'])) {
              $temp_id = $_GET['temp_id'];
            }else{
              $temp_id = 1;
            }
             if (!empty($_GET['chapter_id'])) {
                $chapter_id = $_GET['chapter_id'];
                $chapterDetailsstmt = $pdo->prepare("SELECT * FROM chapters WHERE id='$chapter_id'");
                $chapterDetailsstmt->execute();
                $chapterDetailsdata = $chapterDetailsstmt->fetch(PDO::FETCH_ASSOC);
            }else{
              $chapterDetailsstmt = $pdo->prepare("SELECT * FROM chapters WHERE course_id='$id'");
              $chapterDetailsstmt->execute();
              $chapterDetailsdata = $chapterDetailsstmt->fetch(PDO::FETCH_ASSOC);
              $chapter_id = $temp_id;
            }
            if (!empty($chapterDetailsdata)) {
              ?>
              <div class="ms-5" style="margin-top:40px;">
                <div class="title mb-3">
                  <h6>Chapter <?php echo $temp_id; ?></h6>
                  <h4><?php if (!empty($chapterDetailsdata)){ echo $chapterDetailsdata['title']; }?></h4>
                </div>
                <div class="me-5 mb-4 mt-4" style="border:0px solid lightgrey; border-radius:4px;">
                  <h6>About This Chapter</h6>
                  <?php echo $chapterDetailsdata['description']; ?>
                </div>
                <?php
                $videosstmt = $pdo->prepare("SELECT * FROM videos WHERE chapter_id='$chapter_id'");
                $videosstmt->execute();
                $video_datas = $videosstmt->fetchall();
                foreach ($video_datas as $video_data) {
                  ?>
                  <a href="video_lists.php?course_id=<?php echo $id; ?>&chapter_id=<?php echo $chapter_id; ?>&videoid=<?php echo $video_data['id']; ?>&temp_id=<?php echo $temp_id; ?>">
                  <div class="video d-flex mb-3" style=";">
                    <div class="col-4">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-btn" viewBox="0 0 16 16">
                        <path d="M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/>
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                      </svg>
                      <h6 style="display:inline;" class="ms-2">
                        <?php echo $video_data['title']; ?>
                      </h6>
                    </div>
                    <div class="col" style="color:grey;">
                      <?php echo $video_data['description']; ?>
                    </div>
                  </div>
                </a>
                  <?php
                }
                 ?>
              </div>
              <?php
            }else{
              ?>
              <h6 class="m-5">No Chapter Yet...</h6>
              <?php
            }
              ?>
          </div>
        </div>
      </div>
    </div>

<?php include '../css/footer.php'; ?>
