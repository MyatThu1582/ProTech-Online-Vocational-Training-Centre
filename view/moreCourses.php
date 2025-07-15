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
<?php
  if (isset($_POST['searchbtn'])) {
    $subject_id = $_GET['subject_id'];
    $search = $_POST['search'];
    $serchDatas = $query->search('course','name',$search);
  }
 ?>
<body>
  <div class="fixed-top">
    <?php
    include '../css/navbar.php';
    ?>
  </div>
  <div class="container" style="margin-top:120px;">
    <h4 class="mb-4"><?php echo $moreCourses['toptext']; ?></h4>
    <div class="row searchandcategories">
      <div class="col-9 full">
        <div class="btns text-center">
          <?php
          $mainSubjectDatas = $query->selectAllNoDesc('main_subjects');
          foreach ($mainSubjectDatas as $mainSubjectData) {
            ?>
              <a href="?subject_id=<?php echo $mainSubjectData['id']; ?>">
                <button type="button" name="button" class="subject_btn" id="subject_<?php echo $mainSubjectData['id']; ?>btn" style="<?php if($_GET['subject_id'] == $mainSubjectData['id'] && empty($_SESSION['search_course'])){echo "background-color: rgba(0,0,255,0.8); color:white;"; } ?>"><?php echo $mainSubjectData['subject_name']; ?></button>
              </a>
            <?php
              }
            ?>
          </div>
      </div>
      <div class="col-3 full searchdiv" style="">
        <form class="" action="" method="post">
          <div class="search">
            <input class="search_course" type="search" value="<?php if(!empty($_SESSION['search_course'])){ echo $_SESSION['search_course'];} ?>" name="search" placeholder="<?php echo $moreCourses['search_placeholder']; ?>" aria-label="Search">
            <button type="submit" name="searchbtn" class="btn float-end searchbtn" style="margin-top: -35px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="row ms-5 me-5 mb-5 mt-4 nomargin">
      <?php
      if (isset($_POST['searchbtn']) && !empty($_POST['search'])) {
        $search = $_POST['search'];
        $_SESSION['search_course'] = $search;
        $coursedatas = $query->search('course','name',$search);
      }else{
        $_SESSION['search_course'] = "";
        $subject_id = $_GET['subject_id'];
        $coursedatas = $query->selectWithCol('course','subject_id',$subject_id);
      }

      if (!empty($coursedatas)) {
      foreach ($coursedatas as $coursedata) {
        ?>
        <div class="col-6 p-4 full coursediv">
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
    }else{
      ?>
      <div class="p-4">
        <span>No Result ...</span>
      </div>
      <?php
    }
      ?>
    </div>
  </div>
<?php include '../css/footer.php'; ?>
