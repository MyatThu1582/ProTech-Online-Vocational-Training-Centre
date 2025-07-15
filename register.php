<?php
include 'Controllers/query.ctr.php';
$query = new Query();

if (empty($_SESSION)) {
  $_SESSION['language'] = '';
}
if (isset($_POST['eng'])) {
  $_SESSION['language'] = 'eng';
}elseif (isset($_POST['myan'])) {
  $_SESSION['language'] = 'myan';
}
?>
<?php
if (!empty($_SESSION['language']) && $_SESSION['language'] == 'Eng' || $_SESSION['language'] == 'eng') {
  include 'english.php';
  ?>
  <link href="font.css" rel="stylesheet">
  <?php
}else{
  include 'myanmar.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <script src="boostrap/js/bootstrap.min.js"></script>
    <link href="font.css" rel="stylesheet">
    <style media="screen">
    body{
      font-family: "Titillium Web", sans-serif;
      font-weight: 600;
      font-style: normal;
    }

    .register-div{
      background-image: url("images/register (2).jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }
    .navbar{
      background: rgb(255,255,255);
      /* background: linear-gradient(82deg, rgba(0,0,0,0.1) 0%, rgba(255,255,255,1) 100%); */
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 255, 0.2);
    }
    .login-inputs{
      background-color: transparent;
      color: white;
    }
    ul li .menu{
      position: relative;
      /* border-radius: 10px;
      background-color: red;
      width:0%;
      height: 2px; */
    }
    ul li .menu:before{
      content: '';
      width: 0px;
      height: 2px;
      border-radius: 10px;
      background-color: blue;
      position: absolute;
      left: 5;
      top: 90%;
      margin-left: 40%;
      transition: 0.8s;
    }
    ul li:hover .menu:before{
      margin: 0;
      width: 90%;
      /* display: none; */
    }
    .conlan{
      padding: 3px 10px;
    }
    .landropdown {
      position: relative;
      display: inline-block;
      transition: 0.5s;
      cursor: pointer;
    }
    .landropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 60px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      color: black;
      height: 82px;
    }

    .conlan:hover{
      background: #044bb5;
    }
    .conlan:hover .lan{
      color: white;
    }

    .landropdown:hover .landropdown-content {display: block;}

    .none{
        display: none;
    }
/* ================================
    FLOAT-UP ANIMATION (clean + smooth)
  ================================= */
  .float-up {
    opacity: 0;
    transform: translateY(-20px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
  }

  /* When visible in viewport */
  .float-up.show {
    opacity: 1;
    transform: translateY(0);
  }
    @media(max-width:1000px){
      .tohide{
        display: none;
      }
      .toshow{
        display: block;
      }
      .full{
        width: 100%;
      }
      .nomargin{
        margin: 0px !important;
      }
      .register-div{
        background-position: 100% 100%;
      }
      .inputs{
        padding-left: 120px !important;
        padding-top: 100px !important;
        padding-right: 80px !important;
      }
      .originalfooter{
        display: none !important;
      }
      .resfooter{
        height: 800px !important;
        display: block !important;
      }
      .footerdiv{
        margin: 0px !important;
        padding: 20px !important;
        width: 100%;
      }
      .footerotherdiv{
        text-align: center;
        margin-top: 20px !important;
        margin-bottom: 20px !important;
        padding: 0px !important;
      }
      .logo_div{
        padding-bottom: 100px;
        padding-top: 10px;
        margin: 0px auto !important;
      }
    }
</style>
</head>
<?php

$nameerror = "";
$emailerror = "";
$passworderror = "";
$comfirmpassworderror = "";
  if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
      if (empty($name)) {
        $nameerror = "The name is required";
      }
      if (empty($email)) {
        $emailerror = "The email is required";
      }
      if (empty($password)) {
        $passworderror = "The password is required";
      }
      if (empty($confirm_password)) {
        $comfirmpassworderror = "The comfirmpassword is required";
      }
    }else{
      if(strlen($password) <= 6){
        $passworderror = "The Password have to be atleast 6 Charactors";
      }else{
        if($password != $confirm_password){
          $comfirmpassworderror = "The confirm password does not match";
        }else{
          $stmt = $pdo->prepare("SELECT * FROM users WHERE email = '$email'");
          $stmt->execute();
          $user_datas = $stmt->fetch(PDO::FETCH_ASSOC);

          if ($user_datas) {
            $emailerror = "The email is already exist";
          }else{
              $query->register($name, $email, $password);
          }
        }
      }
    }
  }
 ?>
<body>
  <div class="fixed-top">
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
              <img src="images/original_logo.png" alt="" style="width:100%;">
            </a>
          </div>
          <div class="ms-4">
            <span class="text-success" style="font-size:30px;"><span class="text-danger">P</span>ro<span class="text-danger">T</span>ech</span><br>
            <span>Vocational Training Centre</span>
          </div>
        </div>
        <div class="col-7">
            <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="p-2 tohide" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu" href="index.php" style="<?php if($page == 'index.php'){ echo "color:#05a0ed !important; text-shadow: -2px 3px 5px lightblue;"; } ?>">
                      <?php echo $home['menu'][0]; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu" href="view/course.php"><?php echo $home['menu'][1]; ?></a>
                </li>
                <li class="nav-item">
                   <a class="nav-link menu" href="view/announcement.php"><?php echo $home['menu'][2]; ?></a>
               </li>
               <li class="nav-item">
                   <a class="nav-link menu" href="view/clients.php"><?php echo $home['menu'][6]; ?></a>
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
                    <li class="nav-item noneed">
                        <span class="nav-link text-light">|</span>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light" href="logout.php" style="color:white; border-radius:3px;">
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
                      <a class="nav-link" href="login.php"><?php echo $home['menu'][3]; ?></a>
                    </li>
                    <li class="nav-item noneed">
                        <span class="nav-link">|</span>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="register.php" style="border-radius:3px;"><?php echo $home['menu'][4]; ?></a>
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
                    <img src="images/us.jpg" alt="" width="50%">
                    <?php
                  }else{
                    ?>
                    <span style="font-size:14px;">
                      <img src="images/myanmar.jpg" alt="" width="50%">
                    </span>
                    <?php
                  }
                 ?>
              </button>

              <div class="landropdown-content">
                <form class="" action="" method="post">
                  <div class="conlan">
                    <button type="submit" name="eng" class="btn lan">
                      <span style="font-size:14px;">English</span>
                    </button>
                  </div>
                  <div class="conlan">
                    <button type="submit" name="myan" class="btn lan">
                      <span style="font-size:14px;">မြန်မာ</span>
                    </button>
                  </div>
                </form>
              </div>
            </div>

        </div>
      </div>
    </nav>

    <!-- for responsive -->
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
                <img src="images/original_logo.png" alt="" style="width:80%;">
              </a>
            </div>
            <div class="col-10">
              <span class="text-success" style="font-size:25px;"><span class="text-danger">P</span>ro<span class="text-danger">T</span>ech</span><br>
              <span style="font-size:15px;">Vocational Training Centre</span>
            </div>
          </div>
          <div class="col-2 me-4">

          </div>
          <div class="col-1 toshow mt-4 me-2">
              <div class="nav-item landropdown">
                <button type="button" name="button" class="btn btn-default text-dark landropbtn">
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-globe-asia-australia" viewBox="0 0 16 16">
                    <path d="m10.495 6.92 1.278-.619a.483.483 0 0 0 .126-.782c-.252-.244-.682-.139-.932.107-.23.226-.513.373-.816.53l-.102.054c-.338.178-.264.626.1.736a.48.48 0 0 0 .346-.027ZM7.741 9.808V9.78a.413.413 0 1 1 .783.183l-.22.443a.6.6 0 0 1-.12.167l-.193.185a.36.36 0 1 1-.5-.516l.112-.108a.45.45 0 0 0 .138-.326M5.672 12.5l.482.233A.386.386 0 1 0 6.32 12h-.416a.7.7 0 0 1-.419-.139l-.277-.206a.302.302 0 1 0-.298.52z"/>
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1.612 10.867l.756-1.288a1 1 0 0 1 1.545-.225l1.074 1.005a.986.986 0 0 0 1.36-.011l.038-.037a.88.88 0 0 0 .26-.755c-.075-.548.37-1.033.92-1.099.728-.086 1.587-.324 1.728-.957.086-.386-.114-.83-.361-1.2-.207-.312 0-.8.374-.8.123 0 .24-.055.318-.15l.393-.474c.196-.237.491-.368.797-.403.554-.064 1.407-.277 1.583-.973.098-.391-.192-.634-.484-.88-.254-.212-.51-.426-.515-.741a7 7 0 0 1 3.425 7.692 1 1 0 0 0-.087-.063l-.316-.204a1 1 0 0 0-.977-.06l-.169.082a1 1 0 0 1-.741.051l-1.021-.329A1 1 0 0 0 11.205 9h-.165a1 1 0 0 0-.945.674l-.172.499a1 1 0 0 1-.404.514l-.802.518a1 1 0 0 0-.458.84v.455a1 1 0 0 0 1 1h.257a1 1 0 0 1 .542.16l.762.49a1 1 0 0 0 .283.126 7 7 0 0 1-9.49-3.409Z"/>
                  </svg> -->
                  <?php
                    if ($_SESSION['language'] == 'eng') {
                      ?>
                      <img src="images/us.jpg" alt="" width="250%">
                      <?php
                    }else{
                      ?>
                      <span style="font-size:14px;">
                        <img src="images/myanmar.jpg" alt="" width="250%">
                      </span>
                      <?php
                    }
                   ?>
                </button>

                <div class="landropdown-content">
                  <form class="" action="" method="post">
                    <div class="conlan">
                      <button type="submit" name="eng" class="btn lan">
                        <span style="font-size:14px;">English</span>
                      </button>
                    </div>
                    <div class="conlan">
                      <button type="submit" name="myan" class="btn lan">
                        <span style="font-size:14px;">မြန်မာ</span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
          <div class="col-1 mt-3">
              <button class="btn btn-default text-secondary" style="border:none !important;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                </svg>
              </button>
          </div>
        </div>
      </div>
    </nav>

    <div class="collapse bg-light pt-3 pb-3 ps-5 text-center" id="collapseExample" style="box-shadow: 0px 8px 16px 0px rgba(0, 0, 255, 0.2);">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php"><?php echo $home['menu']['0']; ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="view/course.php"><?php echo $home['menu']['1']; ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="view/donate.php"><?php echo $home['menu']['2']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><?php echo $home['menu'][3]; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php" style="border-radius:3px;"><?php echo $home['menu'][4]; ?></a>
        </li>
    </ul>
  </div>
  <!-- for responsive -->
  </div>
    <div class="container register-div mt-5 mb-5 text-light pb-3 float-up" style="margin-top:130px !important;">
      <div class="row mt-5 pb-4 pt-3">
        <div class="col-7 text-center">
          <!-- <img src="images/sign_up.png" alt=""> -->
        </div>
        <div class="col-4 ps-5 pe-5 ms-5 pt-3 full nomargin inputs">
          <h2 class="text-center mb-4">Sign Up</h2>
          <form action="" method="post">
              <div class="form-group mb-2" style="height:70px;">
                  <label for="username">Username</label>
                  <input type="text" class="form-control login-inputs" id="username" name="username">
                  <span class="text-danger"><?php echo $nameerror; ?></span>
              </div>
              <div class="form-group mb-2" style="height:70px;">
                  <label for="email">Email</label>
                  <input type="email" class="form-control login-inputs" id="email" name="email">
                  <span class="text-danger"><?php echo $emailerror; ?></span>
              </div>
              <div class="form-group mb-2" style="height:70px;">
                  <label for="password">Password</label>
                  <input type="password" class="form-control login-inputs" id="password" name="password">
                  <span class="text-danger"><?php echo $passworderror; ?></span>
              </div>
              <div class="form-group mb-4" style="height:70px;">
                  <label for="confirm-password">Confirm Password</label>
                  <input type="password" class="form-control login-inputs" id="confirm-password" name="confirm_password">
                  <span class="text-danger"><?php echo $comfirmpassworderror; ?></span>
              </div>
              <button type="submit" name="submit" class="btn btn-primary form-control">Register</button>
          </form>
        </div>
      </div>
    </div>
<?php include 'css/footer.php'; ?>
