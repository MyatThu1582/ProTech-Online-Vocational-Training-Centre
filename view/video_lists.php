<?php
include '../Controllers/query.ctr.php';
$query = new Query();
if (empty($_SESSION['user_id']) && empty($_SESSION['name']) && empty($_SESSION['logged_in'])) {
  header('location: ../login.php');
}else{
  $user_id = $_SESSION['user_id'];
  $course_id = $_GET['course_id'];

  $coursestmt = $pdo->prepare("SELECT * FROM course WHERE id='$course_id'");
  $coursestmt->execute();
  $course = $coursestmt->fetch(PDO::FETCH_ASSOC);

  if ($course['fee'] != 0) {
    $courseCheckstmt = $pdo->prepare("SELECT * FROM permission WHERE user_id='$user_id' AND course_id='$course_id'");
    $courseCheckstmt->execute();
    $courseCheck = $courseCheckstmt->fetch(PDO::FETCH_ASSOC);
    if (empty($courseCheck)) {
      header('location: course.php');
    }
  }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../css/link.php'; ?>
</head>
<body>
  <div class="fixed-top">
    <?php
    include '../css/navbar.php';
    ?>
  </div>
  <div class="" style="margin-top:73px;">
    <div class="d-flex">
      <div class="col p-5 text-center">
        <?php
        $videoid = $_GET['videoid'];
        $videostmt = $pdo->prepare("SELECT * FROM videos WHERE id='$videoid'");
        $videostmt->execute();
        $video = $videostmt->fetch(PDO::FETCH_ASSOC);
         ?>
        <video width="90%" controls>
          <source src="<?php echo $video['video_url']; ?>" type="video/mp4">
        </video>
        <h3 class="ms-5 mt-3 text-start"><?php echo $video['title']; ?></h3>
        <p class="text-start ms-5 mt-3"><?php echo $video['description']; ?></p>
      </div>

      <div class="col-3" style="border-left:1px solid lightgrey; height:567px;">
        <?php
          $temp_id = $_GET['temp_id'];
          $id = $_GET['course_id'];
          $coursestmt = $pdo->prepare("SELECT * FROM course WHERE id='$id'");
          $coursestmt->execute();
          $course = $coursestmt->fetch(PDO::FETCH_ASSOC);

          $chapter_id = $_GET['chapter_id'];
          $chapterstmt = $pdo->prepare("SELECT * FROM chapters WHERE id='$chapter_id'");
          $chapterstmt->execute();
          $chapter = $chapterstmt->fetch(PDO::FETCH_ASSOC);
         ?>
        <div class="p-2 m-4">
        <h6 class="">
          <a href="courseDetails.php?course_id=<?php echo $id; ?>">
            <?php echo $course['name']; ?>
          </a>
          /
          <a href="chapters&videos.php?course_id=<?php echo $id; ?>&chapter_id=<?php echo $chapter_id; ?>&temp_id=<?php echo $temp_id; ?>">
            <?php echo $chapter['title']; ?>
          </a>
        </h6>
        <?php
          $countvideostmt = $pdo->prepare("SELECT COUNT(*) AS total_videos FROM videos WHERE course_id='$id' AND chapter_id='$chapter_id'");
          $countvideostmt->execute();
          $countvideo = $countvideostmt->fetch(PDO::FETCH_ASSOC);
        ?>
          <h6 class="" style="font-size:15px;">Total Videos : <?php echo $countvideo['total_videos']; ?></h6>
        </div>

        <div class="m-4">
        <?php
          $chapter_id = $_GET['chapter_id'];
          $videostmt = $pdo->prepare("SELECT * FROM videos WHERE chapter_id='$chapter_id'");
          $videostmt->execute();
          $videodatas = $videostmt->fetchall();
          $i = 1;
          foreach ($videodatas as $videodata) {
          ?>
          <a href="?course_id=<?php echo $id; ?>&chapter_id=<?php echo $chapter_id; ?>&videoid=<?php echo $videodata['id']; ?>&temp_id=<?php echo $temp_id; ?>" style="text-decoration:none; color:black;">
            <div class="chapterdiv p-3" style="border-bottom:1px solid grey; <?php if($_GET['videoid'] == $videodata['id']) { echo 'background-color: rgba(0, 0, 255, 0.7); color:white;'; } ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-btn" viewBox="0 0 16 16">
                <path d="M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/>
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
              </svg>
              <h6 class="d-inline ms-2"><?php echo $videodata['title']; ?></h6>
            </div>
          </a>
          <?php
          $i++;
        }
         ?>
       </div>
      </div>
    </div>
  </div>
<?php include '../css/footer.php'; ?>
<script>
let name = document.querySelector('#firstName').innerText;
let initials = name.charAt(0);
document.getElementById("name").innerHTML = initials;
</script>
