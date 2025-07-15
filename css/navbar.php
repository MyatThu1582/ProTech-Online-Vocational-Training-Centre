<?php
if (isset($_POST['eng'])) {
  $_SESSION['language'] = 'eng';
}elseif (isset($_POST['myan'])) {
  $_SESSION['language'] = 'myan';
}

if ($_SESSION['language'] == 'Eng' || $_SESSION['language'] == 'eng') {
  include '../english.php';
}else{
  include '../myanmar.php';
}
 ?>
<nav class="navbar navbar-expand-lg tohide" id="navbar" style="box-shadow:0px 10px 40px 0px rgba(0, 0, 255,0.4);">
  <div class="container">
    <div class="col-5 d-flex">
      <div class="" style="width:17%; overflow:hidden; margin-top:-5px;">
        <!-- <a href="Index.php" style="text-decoration: none;" class="text-dark h2"><b>ProTech</b></a> -->
        <?php
        $link = $_SERVER['PHP_SELF'];
        $link_array = explode('/',$link);
        $page = end($link_array);
        ?>
        <a href="index.php">
          <img src="../images/original_logo.png" alt="" style="width:100%;">
        </a>
      </div>
      <div class="ms-4">
        <span class="text-success" style="font-size:30px;"><span class="text-danger">P</span>ro<span class="text-danger">T</span>ech</span><br>
        <?php
          if($page == 'clients.php'){
             echo $home['solution'][0]; 
          }else{
            echo $home['training'][0];
          }
        ?>
      </div>
    </div>
    <div class="col-7">
        <div class="collapse navbar-collapse p-2" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link menu" href="<?php if($page != "index.php"){ echo "../index.php"; } ?>"><?php echo $home['menu'][0]; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="<?php if($page != "index.php"){ echo "course.php"; } ?>" style="<?php if($page == 'course.php' || $page == 'courseDetails.php' || $page == 'moreCourses.php' || $page == 'chapters&videos.php' || $page == 'video_lists.php'){ echo "color:#05a0ed !important; text-shadow: -2px 3px 5px lightblue;"; } ?>">
                  <?php echo $home['menu'][1]; ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="<?php if($page != "index.php"){ echo "announcement.php"; } ?>" style="<?php if($page == 'announcement.php'){ echo "color:#05a0ed !important; text-shadow: -2px 3px 5px lightblue;"; } ?>">
                  <?php echo $home['menu'][2]; ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="<?php if($page != "index.php"){ echo "clients.php"; } ?>" style="<?php if($page == 'clients.php'){ echo "color:#05a0ed !important; text-shadow: -2px 3px 5px lightblue;"; } ?>">
                  <?php echo $home['menu'][6]; ?>
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <?php
              if(!empty($_SESSION['user_id']) && !empty($_SESSION['name'])){
                ?>
                  <li class="nav-item dropdown">

                    <div id="container" class="nav-link dropbtn">
                      <span id="firstName" style="display:none;"><?php echo $_SESSION['name']; ?></span>
                      <div id="name"></div>
                    </div>

                    <div class="dropdown-content">
                      <a href="profile.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="me-2 bi bi-person-rolodex" viewBox="0 0 16 16">
                          <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                          <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z"/>
                        </svg>
                        My Profile
                      </a>
                      <a href="profile_setting.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="me-2 bi bi-sliders2" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M10.5 1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4H1.5a.5.5 0 0 1 0-1H10V1.5a.5.5 0 0 1 .5-.5M12 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-6.5 2A.5.5 0 0 1 6 6v1.5h8.5a.5.5 0 0 1 0 1H6V10a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5M1 8a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 1 8m9.5 2a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V13H1.5a.5.5 0 0 1 0-1H10v-1.5a.5.5 0 0 1 .5-.5m1.5 2.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                        </svg>
                        Setting
                      </a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <span class="nav-link">|</span>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-danger" href="../logout.php" style="border-radius:3px;">
                      <!-- <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="mr-1 bi bi-door-open-fill" viewBox="0 0 16 16">
                        <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                      </svg> -->
                      <span style="font-weight:bold;"><?php echo $home['menu'][5]; ?></span>
                    </a>
                  </li>
                <?php
              }else{
                ?>
                    <li class="nav-item">
                      <a class="nav-link" href="../login.php"><?php echo $home['menu'][3]; ?></a>
                    </li>
                    <li class="nav-item">
                      <span class="nav-link">|</span>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../register.php" style="border-radius:3px;"><?php echo $home['menu'][4]; ?></a>
                    </li>
                <?php
              }
            ?>
        </ul>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    </div>
    <div class="col-1 ms-3 tohide">
        <div class="nav-item landropdown">
          <button type="button" name="button" class="btn btn-default text-light landropbtn">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-globe-asia-australia" viewBox="0 0 16 16">
              <path d="m10.495 6.92 1.278-.619a.483.483 0 0 0 .126-.782c-.252-.244-.682-.139-.932.107-.23.226-.513.373-.816.53l-.102.054c-.338.178-.264.626.1.736a.48.48 0 0 0 .346-.027ZM7.741 9.808V9.78a.413.413 0 1 1 .783.183l-.22.443a.6.6 0 0 1-.12.167l-.193.185a.36.36 0 1 1-.5-.516l.112-.108a.45.45 0 0 0 .138-.326M5.672 12.5l.482.233A.386.386 0 1 0 6.32 12h-.416a.7.7 0 0 1-.419-.139l-.277-.206a.302.302 0 1 0-.298.52z"/>
              <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1.612 10.867l.756-1.288a1 1 0 0 1 1.545-.225l1.074 1.005a.986.986 0 0 0 1.36-.011l.038-.037a.88.88 0 0 0 .26-.755c-.075-.548.37-1.033.92-1.099.728-.086 1.587-.324 1.728-.957.086-.386-.114-.83-.361-1.2-.207-.312 0-.8.374-.8.123 0 .24-.055.318-.15l.393-.474c.196-.237.491-.368.797-.403.554-.064 1.407-.277 1.583-.973.098-.391-.192-.634-.484-.88-.254-.212-.51-.426-.515-.741a7 7 0 0 1 3.425 7.692 1 1 0 0 0-.087-.063l-.316-.204a1 1 0 0 0-.977-.06l-.169.082a1 1 0 0 1-.741.051l-1.021-.329A1 1 0 0 0 11.205 9h-.165a1 1 0 0 0-.945.674l-.172.499a1 1 0 0 1-.404.514l-.802.518a1 1 0 0 0-.458.84v.455a1 1 0 0 0 1 1h.257a1 1 0 0 1 .542.16l.762.49a1 1 0 0 0 .283.126 7 7 0 0 1-9.49-3.409Z"/>
            </svg> -->
            <?php
              if ($_SESSION['language'] == 'eng') {
                ?>
                <img src="../images/us.jpg" alt="" width="50%">
                <?php
              }else{
                ?>
                <span style="font-size:14px;">
                  <img src="../images/myanmar.jpg" alt="" width="50%">
                </span>
                <?php
              }
             ?>
          </button>

          <div class="landropdown-content">
            <form class="" action="" method="post">
              <div class="conlan">
                <button type="submit" name="eng" class="btn lan" style="border:none !important;">
                  <span style="font-size:14px;">English</span>
                </button>
              </div>
              <div class="conlan">
                <button type="submit" name="myan" class="btn lan" style="border:none !important;">
                  <span style="font-size:14px;">မြန်မာ</span>
                </button>
              </div>
            </form>
          </div>
        </div>

    </div>
  </div>
</nav>

<!-- other navbar -->
<nav class="navbar navbar-expand-lg navbar2 hide tohide" id="navbar2">
  <div class="container">
    <div class="col-5 d-flex">
      <div class="" style="width:17%; overflow:hidden; margin-top:-5px;">
        <!-- <a href="Index.php" style="text-decoration: none;" class="text-dark h2"><b>ProTech</b></a> -->
        <?php
        $link = $_SERVER['PHP_SELF'];
        $link_array = explode('/',$link);
        $page = end($link_array);
        ?>
        <a href="index.php">
          <img src="../images/original_logo.png" alt="" style="width:100%;">
        </a>
      </div>
      <div class="ms-4">
        <span class="text-success" style="font-size:30px;"><span class="text-danger">P</span>ro<span class="text-danger">T</span>ech</span><br>
        <?php
          if($page == 'clients.php'){
             echo $home['solution'][0]; 
          }else{
            echo $home['training'][0]; 
          }
        ?>
      </div>
    </div>
    <div class="col-7">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="p-2 tohide" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link menu2" href="<?php if($page != "index.php"){ echo "../index.php"; } ?>">
                  <?php echo $home['menu'][0]; ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu2" href="course.php" style="<?php if($page == 'course.php' || $page == 'courseDetails.php' || $page == 'moreCourses.php' || $page == 'chapters&videos.php' || $page == 'video_lists.php'){ echo "color:#05a0ed !important; text-shadow: -2px 3px 5px lightblue;"; } ?>">
                  <?php echo $home['menu'][1]; ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu2" href="announcement.php" style="<?php if($page == 'announcement.php'){ echo "color:#05a0ed !important; text-shadow: -2px 3px 5px lightblue;"; } ?>">
                  <?php echo $home['menu'][2]; ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu" href="<?php if($page != "index.php"){ echo "clients.php"; } ?>" style="<?php if($page == 'clients.php'){ echo "color:#05a0ed !important; text-shadow: -2px 3px 5px lightblue;"; } ?>">
                  <?php echo $home['menu'][6]; ?>
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <?php
              if(!empty($_SESSION['user_id']) && !empty($_SESSION['name'])){
                ?>
                <li class="nav-item dropdown">

                  <div id="container" class="nav-link dropbtn">
                    <span id="firstName" style="display:none;"><?php echo $_SESSION['name']; ?></span>
                    <div id="name2"></div>
                  </div>

                  <div class="dropdown-content">
                    <a href="profile.php">
                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="me-2 bi bi-person-rolodex" viewBox="0 0 16 16">
                        <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                        <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z"/>
                      </svg>
                      My Profile
                    </a>
                    <a href="view/profile_setting.php">
                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="me-2 bi bi-sliders2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4H1.5a.5.5 0 0 1 0-1H10V1.5a.5.5 0 0 1 .5-.5M12 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-6.5 2A.5.5 0 0 1 6 6v1.5h8.5a.5.5 0 0 1 0 1H6V10a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5M1 8a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 1 8m9.5 2a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V13H1.5a.5.5 0 0 1 0-1H10v-1.5a.5.5 0 0 1 .5-.5m1.5 2.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                      </svg>
                      Setting
                    </a>
                  </div>
                </li>
                <li class="nav-item noneed">
                    <span class="nav-link">|</span>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-danger" href="../logout.php" style="border-radius:3px;">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="mr-1 bi bi-door-open-fill" viewBox="0 0 16 16">
                      <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                    </svg> -->
                    <span style="font-weight:bold;"><?php echo $home['menu'][5]; ?></span>
                  </a>
                </li>
                <?php
              }else{
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="../login.php"><?php echo $home['menu'][3]; ?></a>
                </li>
                <li class="nav-item noneed text-light">
                    <span class="nav-link">|</span>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../register.php" style="border-radius:3px;"><?php echo $home['menu'][4]; ?></a>
                </li>
                <?php
              }
            ?>
        </ul>
      </div>
    </div>
    <div class="col-1 ms-3 tohide">
        <div class="nav-item landropdown">
          <button type="button" name="button" class="btn btn-default text-light landropbtn">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-globe-asia-australia" viewBox="0 0 16 16">
              <path d="m10.495 6.92 1.278-.619a.483.483 0 0 0 .126-.782c-.252-.244-.682-.139-.932.107-.23.226-.513.373-.816.53l-.102.054c-.338.178-.264.626.1.736a.48.48 0 0 0 .346-.027ZM7.741 9.808V9.78a.413.413 0 1 1 .783.183l-.22.443a.6.6 0 0 1-.12.167l-.193.185a.36.36 0 1 1-.5-.516l.112-.108a.45.45 0 0 0 .138-.326M5.672 12.5l.482.233A.386.386 0 1 0 6.32 12h-.416a.7.7 0 0 1-.419-.139l-.277-.206a.302.302 0 1 0-.298.52z"/>
              <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1.612 10.867l.756-1.288a1 1 0 0 1 1.545-.225l1.074 1.005a.986.986 0 0 0 1.36-.011l.038-.037a.88.88 0 0 0 .26-.755c-.075-.548.37-1.033.92-1.099.728-.086 1.587-.324 1.728-.957.086-.386-.114-.83-.361-1.2-.207-.312 0-.8.374-.8.123 0 .24-.055.318-.15l.393-.474c.196-.237.491-.368.797-.403.554-.064 1.407-.277 1.583-.973.098-.391-.192-.634-.484-.88-.254-.212-.51-.426-.515-.741a7 7 0 0 1 3.425 7.692 1 1 0 0 0-.087-.063l-.316-.204a1 1 0 0 0-.977-.06l-.169.082a1 1 0 0 1-.741.051l-1.021-.329A1 1 0 0 0 11.205 9h-.165a1 1 0 0 0-.945.674l-.172.499a1 1 0 0 1-.404.514l-.802.518a1 1 0 0 0-.458.84v.455a1 1 0 0 0 1 1h.257a1 1 0 0 1 .542.16l.762.49a1 1 0 0 0 .283.126 7 7 0 0 1-9.49-3.409Z"/>
            </svg> -->
            <?php
              if ($_SESSION['language'] == 'eng') {
                ?>
                <img src="../images/us.jpg" alt="" width="50%">
                <?php
              }else{
                ?>
                <span style="font-size:14px;">
                  <img src="../images/myanmar.jpg" alt="" width="50%">
                </span>
                <?php
              }
             ?>
          </button>

          <div class="landropdown-content">
            <form class="" action="" method="post">
              <div class="conlan">
                <button type="submit" name="eng" class="btn lan" style="border:none !important;"">
                  <span style="font-size:14px;">English</span>
                </button>
              </div>
              <div class="conlan">
                <button type="submit" name="myan" class="btn lan" style="border:none !important;"">
                  <span style="font-size:14px;">မြန်မာ</span>
                </button>
              </div>
            </form>
          </div>
        </div>

    </div>
  </div>
</nav>
<!-- Other Navbar -->

<!-- for Responsive -->

<nav class="navbar navbar-expand-lg none toshow" id="navbar2" style="box-shadow:0px 10px 40px 0px rgba(0, 0, 255,0.2);">
  <div class="container">
    <div class="d-flex">
      <div class="col-7 d-flex">
        <div class="col-4 mb-1" style="">
          <!-- <a href="Index.php" style="text-decoration: none;" class="text-dark h2"><b>ProTech</b></a> -->
          <?php
          $link = $_SERVER['PHP_SELF'];
          $link_array = explode('/',$link);
          $page = end($link_array);
          ?>
          <a href="index.php">
            <img src="../images/original_logo.png" alt="" style="width:80%;">
          </a>
        </div>
        <div class="col-8">
          <span class="text-success" style="font-size:25px;"><span class="text-danger">P</span>ro<span class="text-danger">T</span>ech</span><br>
          <?php
          if($page == 'clients.php'){
             echo $home['solution'][0]; 
          }else{
            echo $home['training'][0]; 
          }
        ?>
        </div>
      </div>
      <div class="col-5 d-flex" style="justify-content: flex-end !important;">
        <div class="col-3 toshow" style="margin-top: 20px !important;">
            <div class="nav-item landropdown">
              <button type="button" name="button" class="btn btn-default text-dark landropbtn">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-globe-asia-australia" viewBox="0 0 16 16">
                  <path d="m10.495 6.92 1.278-.619a.483.483 0 0 0 .126-.782c-.252-.244-.682-.139-.932.107-.23.226-.513.373-.816.53l-.102.054c-.338.178-.264.626.1.736a.48.48 0 0 0 .346-.027ZM7.741 9.808V9.78a.413.413 0 1 1 .783.183l-.22.443a.6.6 0 0 1-.12.167l-.193.185a.36.36 0 1 1-.5-.516l.112-.108a.45.45 0 0 0 .138-.326M5.672 12.5l.482.233A.386.386 0 1 0 6.32 12h-.416a.7.7 0 0 1-.419-.139l-.277-.206a.302.302 0 1 0-.298.52z"/>
                  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1.612 10.867l.756-1.288a1 1 0 0 1 1.545-.225l1.074 1.005a.986.986 0 0 0 1.36-.011l.038-.037a.88.88 0 0 0 .26-.755c-.075-.548.37-1.033.92-1.099.728-.086 1.587-.324 1.728-.957.086-.386-.114-.83-.361-1.2-.207-.312 0-.8.374-.8.123 0 .24-.055.318-.15l.393-.474c.196-.237.491-.368.797-.403.554-.064 1.407-.277 1.583-.973.098-.391-.192-.634-.484-.88-.254-.212-.51-.426-.515-.741a7 7 0 0 1 3.425 7.692 1 1 0 0 0-.087-.063l-.316-.204a1 1 0 0 0-.977-.06l-.169.082a1 1 0 0 1-.741.051l-1.021-.329A1 1 0 0 0 11.205 9h-.165a1 1 0 0 0-.945.674l-.172.499a1 1 0 0 1-.404.514l-.802.518a1 1 0 0 0-.458.84v.455a1 1 0 0 0 1 1h.257a1 1 0 0 1 .542.16l.762.49a1 1 0 0 0 .283.126 7 7 0 0 1-9.49-3.409Z"/>
                </svg> -->
                <?php
                  if ($_SESSION['language'] == 'eng') {
                    ?>
                    <img src="../images/us.jpg" alt="" width="150%">
                    <?php
                  }else{
                    ?>
                    <span style="font-size:14px;">
                      <img src="../images/myanmar.jpg" alt="" width="150%">
                    </span>
                    <?php
                  }
                 ?>
              </button>

              <div class="landropdown-content">
                <form class="" action="" method="post">
                  <div class="conlan">
                    <button type="submit" name="eng" class="btn lan">
                      <span style="font-size:15px;"><b>English</b></span>
                    </button>
                  </div>
                  <div class="conlan">
                    <button type="submit" name="myan" class="btn lan">
                      <span style="font-size:15px;"><b>မြန်မာ</b></span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
        </div>

          <?php
          if(!empty($_SESSION['user_id']) && !empty($_SESSION['name'])){
            ?>
            <div class="col-1 mt-3 me-3 ms-2 text-center">
            <li class="nav-item dropdown">

              <div id="container" class="nav-link dropbtn pt-2">
                <span id="firstName" style="display:none;"><?php echo $_SESSION['name']; ?></span>
                <div id="name2"></div>
              </div>

              <div class="dropdown-content">
                <a href="view/profile.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="me-2 bi bi-person-rolodex" viewBox="0 0 16 16">
                    <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                    <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z"/>
                  </svg>
                  My Profile
                </a>
                <a href="view/profile_setting.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="me-2 bi bi-sliders2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4H1.5a.5.5 0 0 1 0-1H10V1.5a.5.5 0 0 1 .5-.5M12 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-6.5 2A.5.5 0 0 1 6 6v1.5h8.5a.5.5 0 0 1 0 1H6V10a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5M1 8a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 1 8m9.5 2a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V13H1.5a.5.5 0 0 1 0-1H10v-1.5a.5.5 0 0 1 .5-.5m1.5 2.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                  </svg>
                  Setting
                </a>
              </div>
            </li>
          </div>
          <?php
        }
        ?>

        <div class="mt-3 text-center">
            <button class="btn btn-sm text-secondary" style="border:none !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
              </svg>
            </button>
        </div>
      </div>
    </div>
  </div>
</nav>

<div class="collapse bg-light pt-3 pb-3 ps-5 text-center" id="collapseExample" style="box-shadow: 0px 8px 16px 0px rgba(0, 0, 255, 0.2);">
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php if($page != "index.php"){ echo "../index.php"; } ?>"><?php echo $home['menu']['0']; ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="course.php"><?php echo $home['menu']['1']; ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="announcement.php"><?php echo $home['menu']['2']; ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="clients.php"><?php echo $home['menu']['6']; ?></a>
    </li>
    <?php
      if(!empty($_SESSION['user_id']) && !empty($_SESSION['name'])){
        ?>
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php" style="border-radius:3px;">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="mr-1 bi bi-door-open-fill" viewBox="0 0 16 16">
              <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
            </svg> -->
            <span style="font-weight:bold;"><?php echo $home['menu']['5']; ?></span>
          </a>
        </li>
        <?php
      }else{
        ?>
        <li class="nav-item">
          <a class="nav-link" href="../login.php"><?php echo $home['menu'][3]; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../register.php" style="border-radius:3px;"><?php echo $home['menu'][4]; ?></a>
        </li>

        <?php
      }
    ?>
</ul>
</div>

<!-- for responsive -->

<!-- <button type="button" name="button" class="hide float-end" id="btn" style="margin-top:500px; margin-right:75px;">Up</button> -->
