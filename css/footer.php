<div class="footer originalfooter" style="height:350px; background-color:#010f4e;">
  <div class="d-flex text-light">
    <div class="col-3 ps-5 ms-5 me-4">
      <div class="logo_div mt-4 ms-5" style="width:42%; height:45%;">
        <a href="index.php">
          <?php
            $link = $_SERVER['PHP_SELF'];
            $link_array = explode('/',$link);
            $page = end($link_array);

            if ($page == 'index.php' || $page == 'Index.php' || $page == 'login.php'|| $page == 'register.php') {
              ?>
              <!-- <img src="images/newlogo1-1-transparent.png" alt="" style="width:100%;"> -->
              <img src="images/original_logo.png" alt="" style="width:100%;">
              <?php
            }else{
              ?>
              <img src="../images/original_logo.png" alt="" style="width:100%;">
              <!-- <img src="../images/newlogo1-1-transparent.png" alt="" style="width:100%;"> -->
              <?php
            }
          ?>
        </a>
      </div>
      <div class="text-light">
        <?php echo $footer['text']; ?>
      </div>
      <div class="icons mt-3">
        <a href="#" class="text-light">
          <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
          </svg>
        </a>
        <a href="#" class="text-light">
          <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
          </svg>
        </a>
        <a href="#" class="text-light">
          <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
          </svg>
        </a>
        <a href="#" class="text-light">
          <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
          </svg>
        </a>
      </div>
    </div>
    <div class="col-3 pt-4 ps-4 mt-4 ms-3">
      <h4 class="ms-4"><?php echo $footer['title1']; ?></h4>
      <div class="links mt-4">
        <ul>
          <?php
          $coursestmt = $pdo->prepare("SELECT * FROM course ORDER BY id DESC LIMIT 4");
          $coursestmt->execute();
          $coursedatas = $coursestmt->fetchall();
          foreach ($coursedatas as $coursedata) {
            ?>
            <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
              <?php
                if ($page == 'index.php' || $page == 'Index.php') {
                ?>
                <a class="nav-link text-light" href="view/courseDetails.php?course_id=<?php echo $coursedata['id']; ?>"><?php echo $coursedata['name']; ?></a>
                <?php
              }else{
                ?>
                <a class="nav-link text-light" href="courseDetails.php?course_id=<?php echo $coursedata['id']; ?>"><?php echo $coursedata['name']; ?></a>
                <?php
              }
              ?>
            </li>
            <?php
          }
          ?>
          <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
            <?php
              if ($page == 'index.php' || $page == 'Index.php') {
                $mainSubjectData = $query->selectOne('main_subjects');
                $subject_id = $mainSubjectData['id'];
              ?>
              <a href="view/course.php?subject_id=<?php echo $subject_id; ?>" class="text-light">See More ...</a>
              <?php
            }else{
              ?>
              <a href="course.php?subject_id=<?php echo $subject_id; ?>" class="text-light">See More ...</a>
              <?php
            }
            ?>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-2 p-4 mt-4 me-5 text-center">
      <h4 class="ms-4"><?php echo $footer['title2']; ?></h4>
      <div class="links mt-4">
        <ul>
            <?php
            if ($page == 'index.php' || $page == 'Index.php') {
              ?>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="view/index.php"><?php echo $home['menu'][0]; ?></a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="view/course.php"><?php echo $home['menu'][1]; ?></a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="view/announcement.php"><?php echo $home['menu'][2]; ?></a>
              </li>
              <?php
            }else{
              ?>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="../index.php"><?php echo $home['menu'][0]; ?></a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="course.php"><?php echo $home['menu'][1]; ?></a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="announcement.php"><?php echo $home['menu'][2]; ?></a>
              </li>
              <?php
            }
             ?>
          <?php
            if(!empty($_SESSION['user_id']) && !empty($_SESSION['name'])){
              ?>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link" href="profile.php">Profile</a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link" href="logout.php"><?php echo $home['menu']['5']; ?></a>
              </li>
              <?php
            }else{
              ?>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link" href="login.php"><?php echo $home['menu'][3]; ?></a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link" href="register.php"><?php echo $home['menu'][4]; ?></a>
              </li>
              <?php
            }
          ?>
        </ul>
      </div>
    </div>
    <div class="col-2 pt-4 mt-4 text-center">
      <h4 class="ms-4"><?php echo $footer['title3']; ?></h4>
      <div class="m-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
        </svg>
      </div>
      <h5>
        <?php echo $footer['address']; ?>
      </h5>
    </div>
  </div>
  <div class="text-center text-light">
    <?php
    if ($page == 'index.php' || $page == 'Index.php') {
      ?>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
        <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512"/>
      </svg>
      Powered By <a href="index.php" class="text-primary">ProTech </a>2024 | All rights reserved
      <?php
    }else{
      ?>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
        <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512"/>
      </svg>
      Powered By <a href="../index.php" class="text-primary">ProTech </a>2024 | All rights reserved
      <?php
    }
    ?>
  </div>
</div>

<!-- Footer For Responsive -->
<div class="footer resfooter" style="display:none; background-color:#010f4e;">
    <div class="col-3 ms-5 me-4 text-center footerdiv">
      <div class="logo_div" style="width:30%; height:18%;">
        <a href="index.php">
          <?php
            $link = $_SERVER['PHP_SELF'];
            $link_array = explode('/',$link);
            $page = end($link_array);

            if ($page == 'index.php' || $page == 'Index.php' || $page == 'login.php'|| $page == 'register.php') {
              ?>
              <img src="images/original_logo.png" alt="" style="width:100%;">
              <?php
            }else{
              ?>
              <img src="../images/original_logo.png" alt="" style="width:100%;">
              <?php
            }
          ?>
        </a>
      </div>
      <div class="text-light">
        Lorem ipsum dolor sit amet, consectetecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
      <div class="icons mt-3">
        <a href="#" class="text-light">
          <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
          </svg>
        </a>
        <a href="#" class="text-light">
          <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
          </svg>
        </a>
        <a href="#" class="text-light">
          <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
          </svg>
        </a>
        <a href="#" class="text-light">
          <svg xmlns="http://www.w3.org/2000/svg" width="46" height="26" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
          </svg>
        </a>
      </div>
    </div>
    <div class="d-flex">
      <div class="col-6 pt-4 mt-4 footerotherdiv">
        <h4 class="ms-4 text-light"><?php echo $footer['title1']; ?></h4>
        <div class="links mt-4">
          <ul>
            <?php
            $coursestmt = $pdo->prepare("SELECT * FROM course ORDER BY id DESC LIMIT 4");
            $coursestmt->execute();
            $coursedatas = $coursestmt->fetchall();
            foreach ($coursedatas as $coursedata) {
              ?>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <?php
                if ($page == 'index.php' || $page == 'Index.php') {
                  ?>
                  <a class="nav-link text-light" href="view/courseDetails.php?course_id=<?php echo $coursedata['id']; ?>"><?php echo $coursedata['name']; ?></a>
                  <?php
                }else{
                  ?>
                  <a class="nav-link text-light" href="courseDetails.php?course_id=<?php echo $coursedata['id']; ?>"><?php echo $coursedata['name']; ?></a>
                  <?php
                }
                ?>
              </li>
              <?php
            }
            ?>
            <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
              <?php
              if ($page == 'index.php' || $page == 'Index.php') {
                $mainSubjectData = $query->selectOne('main_subjects');
                $subject_id = $mainSubjectData['id'];
                ?>
                <a href="view/course.php?subject_id=<?php echo $subject_id; ?>" class="text-light">See More ...</a>
                <?php
              }else{
                ?>
                <a href="course.php?subject_id=<?php echo $subject_id; ?>" class="text-light">See More ...</a>
                <?php
              }
              ?>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-6 footerotherdiv">
        <h4 class="ms-3 text-light"><?php echo $footer['title2']; ?></h4>
        <div class="links mt-4">
          <ul>
            <?php
            if ($page == 'index.php' || $page == 'Index.php') {
              ?>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="view/index.php"><?php echo $home['menu'][0]; ?></a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="view/course.php"><?php echo $home['menu'][1]; ?></a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="view/announcement.php"><?php echo $home['menu'][2]; ?></a>
              </li>
              <?php
            }else{
              ?>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="../index.php"><?php echo $home['menu'][0]; ?></a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="course.php"><?php echo $home['menu'][1]; ?></a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="announcement.php"><?php echo $home['menu'][2]; ?></a>
              </li>
              <?php
            }
            ?>
            <?php
            if(!empty($_SESSION['user_id']) && !empty($_SESSION['name'])){
              ?>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="profile.php">Profile</a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="logout.php"><?php echo $home['menu']['5']; ?></a>
              </li>
              <?php
            }else{
              ?>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="login.php"><?php echo $home['menu'][3]; ?></a>
              </li>
              <li class="nav-item mt-2 mb-2 footer-link" style="list-style:none;">
                <a class="nav-link text-light" href="register.php"><?php echo $home['menu'][4]; ?></a>
              </li>
              <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-12 pt-4 mt-4 footerotherdiv">
      <h4 class="text-light"><?php echo $footer['title3']; ?></h4>
      <div class="m-4 text-light">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
        </svg>
      </div>
      <h5 class="text-light">
        <?php echo $footer['address']; ?>
      </h5>
    </div>

    <div class="text-center text-light footerotherdiv">
      <?php
      if ($page == 'index.php' || $page == 'Index.php') {
        ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
          <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512"/>
        </svg>
        Powered By <a href="index.php" class="text-primary">ProTech </a>2024 | All rights reserved
        <?php
      }else{
        ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
          <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512"/>
        </svg>
        Powered By <a href="../index.php" class="text-primary">ProTech </a>2024 | All rights reserved
        <?php
      }
      ?>
    </div>
</div>
<!-- Footer For Responsive -->
<script>
function scrollCategory(distance) {
  const scrollContainer = document.getElementById('categoryScroll');
  scrollContainer.scrollBy({ left: distance, behavior: 'smooth' });
}

// Save scroll before clicking category
document.addEventListener('DOMContentLoaded', function () {
  const scrollContainer = document.getElementById('categoryScroll');
  const categoryLinks = document.querySelectorAll('#categoryScroll a');

  // Save scroll position when a category is clicked
  categoryLinks.forEach(link => {
    link.addEventListener('click', () => {
      sessionStorage.setItem('categoryScrollLeft', scrollContainer.scrollLeft);
    });
  });

  // Restore scroll position
  const savedScrollLeft = sessionStorage.getItem('categoryScrollLeft');
  if (savedScrollLeft !== null) {
    scrollContainer.scrollLeft = parseInt(savedScrollLeft);
  }
});

// Animate any float-up elements when visible
document.querySelectorAll('.float-up').forEach(el => {
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  observer.observe(el);
});

window.addEventListener('scroll', function () {
  const section = document.getElementById('introSection');
  const rect = section.getBoundingClientRect();

  if (rect.top < window.innerHeight - 100) {
    section.classList.add('intro-show');
  }
});


document.addEventListener('DOMContentLoaded', () => {
  const section = document.getElementById('totalSection');
  const counters = section.querySelectorAll('.count');
  const imgs = section.querySelectorAll('.indexgroup img');
  let triggered = false;

  // easing function (same as yours)
  function easeOutCubic(t) {
    return 1 - Math.pow(1 - t, 3);
  }

  function animateCount(el, target) {
    const flickerDuration = 800;
    const countDuration = 700;
    let startTime = null;

    function flickerPhase(now) {
      if (!startTime) startTime = now;
      const elapsed = now - startTime;
      if (elapsed < flickerDuration) {
        const maxJump = Math.max(5, Math.round(target * 0.12));
        const randNum = target - Math.floor(Math.random() * maxJump);
        el.textContent = randNum.toLocaleString();
        requestAnimationFrame(flickerPhase);
      } else {
        startTime = null;
        requestAnimationFrame(countPhase);
      }
    }

    function countPhase(now) {
      if (!startTime) startTime = now;
      const elapsed = now - startTime;
      const progress = Math.min(elapsed / countDuration, 1);
      const easedProgress = easeOutCubic(progress);
      const currentVal = Math.floor(easedProgress * target);
      el.textContent = currentVal.toLocaleString();
      if (progress < 1) {
        requestAnimationFrame(countPhase);
      } else {
        el.textContent = target.toLocaleString();
      }
    }

    requestAnimationFrame(flickerPhase);
  }

  const io = new IntersectionObserver((entries) => {
    if (entries[0].isIntersecting && !triggered) {
      counters.forEach(el => animateCount(el, +el.dataset.target));

      // Add animation class to images here
      imgs.forEach(img => img.classList.add('animate-img'));

      triggered = true;
      io.disconnect();
    }
  }, { threshold: 0.2 });

  io.observe(section);
});

var navbar = document.querySelector('#navbar');
var navbar2 = document.querySelector('#navbar2');

function scrollDetect(){
  var mar = 145;
  window.onscroll = function() {
      let currentScroll = document.documentElement.scrollTop || document.body.scrollTop; // Get Current Scroll Value
      console.log(currentScroll);
      if (currentScroll > mar) {
        navbar.classList.add('hide');
        navbar2.classList.remove('hide');
        navbar2.classList.add('uptodown');
      }else{
        navbar2.classList.add('hide');
        navbar2.classList.remove('uptodown');
        navbar.classList.remove('hide');
      }
  };
}

scrollDetect();

let name = document.querySelector('#firstName').innerText;
let initials = name.charAt(0);
document.getElementById("name").innerHTML = initials;
document.getElementById("name2").innerHTML = initials;

let editProfilebtn = document.querySelector('#editProfilebtn');
let editPasswordbtn = document.querySelector('#editPasswordbtn');
let editProfile = document.querySelector('#editProfile');
let editPassword = document.querySelector('#editPassword');

editProfile.classList.remove('profile_setting_hide');
editProfilebtn.addEventListener('click',function(){
    editProfile.classList.remove('profile_setting_hide');
    editPassword.classList.add('profile_setting_hide');
})
editPasswordbtn.addEventListener('click',function(){
    editPassword.classList.remove('profile_setting_hide');
    editProfile.classList.add('profile_setting_hide');
})

</script>

</body>
</html>
