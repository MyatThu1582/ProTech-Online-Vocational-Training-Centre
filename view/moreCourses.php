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
      <div class="col-8 mb-4 full">
        <div class="position-relative pe-5 ps-5">
          <!-- 🔁 Scroll Wrapper -->
          <div class="d-flex overflow-auto hide-scrollbar px-5" id="categoryScroll" style="scroll-behavior: smooth;">
            <?php
            $mainSubjectDatas = $query->selectAllNoDesc('main_subjects');
            foreach ($mainSubjectDatas as $mainSubjectData) {
              $isActive = ($_GET['subject_id'] == $mainSubjectData['id'] && empty($_SESSION['search_course'])) ? 'background-color: rgba(0,0,255,0.8); color:white;' : '';
            ?>
              <a href="?subject_id=<?php echo $mainSubjectData['id']; ?>" class="me-2 flex-shrink-0">
                <button type="button" class="subject_btn" id="subject_<?php echo $mainSubjectData['id']; ?>btn" style="<?php echo $isActive; ?>">
                  <?php echo $mainSubjectData['subject_name']; ?>
                </button>
              </a>
            <?php } ?>
          </div>

          <!-- ⬅️ Prev Arrow -->
          <button class="category-arrow left-arrow glass-arrow" onclick="scrollCategory(-200)">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#007bff" class="arrow-icon" viewBox="0 0 16 16">
              <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zm2.354 11.354a.5.5 0 0 1-.708 0L6.5 8.207l3.146-3.147a.5.5 0 0 1 .708.708L7.707 8l2.647 2.646a.5.5 0 0 1 0 .708z"/>
            </svg>
          </button>

          <!-- ➡️ Next Arrow -->
          <button class="category-arrow right-arrow glass-arrow" onclick="scrollCategory(200)">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#007bff" class="arrow-icon" viewBox="0 0 16 16">
              <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zM6.646 4.646a.5.5 0 0 1 .708 0L10.5 8l-3.146 3.146a.5.5 0 0 1-.708-.708L9.293 8 6.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
          </button>


        </div>
      </div>
      <div class="col"></div>
      <div class="col-3 full searchdiv mt-2">
        <form action="" method="post" class="position-relative">
          <input 
            type="search" 
            name="search" 
            class="form-control course-search-input" 
            placeholder="<?php echo $moreCourses['search_placeholder']; ?>" 
            value="<?php if(!empty($_SESSION['search_course'])){ echo $_SESSION['search_course']; } ?>"
            aria-label="Search"
          >
          <button type="submit" name="searchbtn" class="search-icon-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
          </button>
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