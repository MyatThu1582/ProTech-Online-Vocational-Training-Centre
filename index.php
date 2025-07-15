<?php
include 'Controllers/query.ctr.php';
$query = new Query();

if (empty($_SESSION)) {
  $_SESSION['language'] = 'eng';
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProTech</title>
    <?php //include 'link.php'; ?>
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <!-- <script src="boostrap/js/bootstrap.min.js"></script> -->
    <script src="boostrap/js/bootstrap.bundle.js"></script>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->

  <style media="screen">
    body{
      font-family: "Titillium Web", sans-serif;
      font-weight: 600;
      font-style: normal;
    }
    .headerimg{
      /* margin-top: 70px; */
      background-image: url('images/homebackground7.png');
      background-repeat: no-repeat;
      background-size: 100%;
      background-position: 100% 100%;
      height:100%;
    }

    .navbar{
        transition: 0.5s;
        background-color: white;
}
    .navbar2{
      background: rgb(255,255,255);
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 255, 0.2);
      margin-top: -200px;
    }
    ul li .menu{
      position: relative;
      /* color: white !important; */
      text-align: center;
    }
    ul li .menu:before{
      content: '';
      width: 0px;
      height: 2px;
      background-color: blue;
      position: absolute;
      left: 5;
      top: 90%;
      transition: 0.8s;
      margin-left: 40%;
    }
    ul li:hover .menu:before{
      width: 90%;
      margin: 0;
    }
    ul li .menu2{
      position: relative;
    }
    /* ul li .menu:hover{
      color: #f5be0a;
    } */
    ul li .menu2:before{
      content: '';
      width: 0px;
      height: 2px;
      background-color: blue;
      position: absolute;
      left: 5;
      top: 90%;
      transition: 0.8s;
      margin-left: 40%;
    }
    ul li:hover .menu2:before{
      width: 90%;
      margin: 0;
      /* display: none; */
    }

    img{
      object-fit: cover;
    }
    .course{
      cursor: pointer;
      transition: 0.2s;
      overflow: hidden !important;
    }
    .tallcourse{
      cursor: pointer;
      transition: 0.2s;
      overflow: hidden !important;
    }
    .coursetitle{
      padding: 15px;
      height: 55px;
      color: white;
      background-color: rgba(0,0,0,0.7);
      /* margin-top: 180px; */
      /* margin-top: 230px; */
      /* margin-left: -237px; */
      opacity: 0;
      position: absolute;
      transition: 0.7s;
    }
    .course:hover{
      width: 102% !important;
      height: 102% !important;
    }
    .course:hover .coursetitle {
      opacity: 1;
      margin-top: 185px;
      /* margin-left: 0px; */
    }


    .tallcoursetitle{
      padding: 15px;
      height: 55px;
      color: white;
      background-color: rgba(0,0,0,0.6);
      /* margin-left: -225px; */
      /* margin-top: 436.5px; */
      opacity: 0;
      position: absolute;
      transition: 0.5s;

    }
    .tallcourse:hover{
      width: 102% !important;
      height: 102% !important;
    }
    .tallcourse:hover .tallcoursetitle {
      opacity: 1;
      /* margin-left: 0px; */
      margin-top: 446.5px;
    }
    a{
      text-decoration: none;
      color: white;
    }
    .dropdown {
      position: relative;
      display: inline-block;
      transition: 0.5s;
      cursor: pointer;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 10px 14px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background: #044bb5;
      color: white;
    }

    .dropdown:hover .dropdown-content {display: block;}

    .conlan{
      padding-bottom: 6px;
      padding-left: 10px;
      padding-right: 10px;
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
      min-width: 50px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      color: black;
      height: 95px;
    }

    .conlan:hover{
      background: #044bb5;
    }
    .conlan:hover .lan{
      color: white;
    }

    .landropdown:hover .landropdown-content {display: block;}

    #container {
      width: 35px;
      height: 35px;
      border-radius: 100px;
      background: #05347a;
      margin-top: 3px;
    }
    #name {
      width: 100%;
      text-align: center;
      color: white;
      font-size: 17px;
      line-height: 20px;
    }
    #name2 {
      width: 100%;
      text-align: center;
      color: white;
      font-size: 17px;
      line-height: 20px;
    }

    .indexbtn{
      border: 1px solid white;
      color: white;
      padding: 8px;
      border-radius: 8px;
      margin-right: 10px;
      margin-top: 15px;
    }
    .hide{
      opacity: 0;
    }
    .uptodown{
      margin-top: -88px;
    }
    .homediv{
      /* padding: 20px; */
      background-color: transparent;
      transition: 0.5s;
      cursor: pointer;
      border-top-right-radius: 30px;
      border-bottom-left-radius: 30px;
      box-shadow: 6px 10px 26px 3px rgba(0,0,255,0.9);
    }
    .homeimage{
      transition: 0.5s;
      border-top-right-radius: 30px;
      border-bottom-left-radius: 30px;
      object-fit: cover;
    }
    .homediv:hover{
      border-top-left-radius: 30px;
      border-bottom-right-radius: 30px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
    }
    .homediv:hover .homeimage{
      border-top-left-radius: 30px;
      border-bottom-right-radius: 30px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;

    }
    .innerhomediv{
      border-radius: 10px;
      border:1px double white;
    }
    .lan{
      padding-top: 15px;
      border: none;
    }
    .none{
      display: none;
    }
    /* 2️⃣  Drop this in your main stylesheet (or inside a <style> tag) */
@keyframes floatUp {
  from {
    transform: translateY(60px);  /* start 60 px lower */
    opacity: 0;                   /* invisible */
  }
  to {
    transform: translateY(0);     /* natural spot */
    opacity: 1;                   /* fully visible */
  }
}

.float-up {
  animation: floatUp 0.8s ease-out forwards;   /* ≈0.8 s, tweak as you like */
  /* optional extras to make it feel lighter */
  will-change: transform, opacity;
  backface-visibility: hidden;
}
/* hidden state before scrolling */
/* 💤 Before scroll: hidden + slightly dropped */
.intro-hidden {
  opacity: 0;
  transform: translateY(100px);
  transition: all 0.8s ease-out;
  will-change: opacity, transform;
}

/* 💥 After scroll: visible + back to natural spot */
.intro-show {
  opacity: 1;
  transform: translateY(0);
}

.count {
    letter-spacing: 0.5px;
    font-variant-numeric: tabular-nums;
  }

    /* Start hidden + dropped */
.indexgroup img {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

  /* When active, fade in and float up */
  .indexgroup img.animate-img {
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

      .landropdown-content {
        left: -60px;
      }

      .dropdown-content {
        left: -120px;
        top: 38.5px;
      }

      .headerimg{
        background-position: 0% 100%;
        background-size: cover;
        height: 70%;
        width: 100%;
        padding-top: 150px !important;
      }
      .introdiv{
          margin-left: -20px !important;
      }
      .indextext{
        font-size: 25px !important;
      }
      .welcome{
        font-size: 16.5px !important;
      }
      .introbtn{
        margin-top: 0px !important;
      }
      .indeximgdiv{
        width: 100%;
        overflow: hidden;
      }
      .indexpara{
        width: 100%;
      }
      .indexgroup{
        width: 100%;
      }
      .indexvideo{
        margin-left: 80px !important;
        margin-right: 40px !important;
        height: 75% !important;
      }
      .courses{
        display: none;
      }
      .rescourses{
        display: block !important;
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
            <?php echo $home['main_title'][0]; ?>
          </div>
        </div>
        <div class="col-7">
            <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="p-2 tohide" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu" href="<?php if($page == "index.php" || $page == "Index.php"){ echo "index.php"; }else{ echo "../index.php"; } ?>" style="<?php if($page == 'index.php'){ echo "color:#05a0ed !important; text-shadow: -2px 3px 5px lightblue;"; } ?>">
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
                        <span class="nav-link">|</span>
                    </li>
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

    <!-- navbar when scroll -->
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
              <img src="images/original_logo.png" alt="" style="width:100%;">
            </a>
          </div>
          <div class="ms-4">
            <span class="text-success" style="font-size:30px;"><span class="text-danger">P</span>ro<span class="text-danger">T</span>ech</span><br>
            <?php echo $home['main_title'][0]; ?>
          </div>
        </div>
        <div class="col-7 text-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="p-2 tohide" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu2" style="<?php if($page == 'index.php'){ echo "color:#05a0ed !important; text-shadow: -2px 3px 5px lightblue;"; } ?>" href="<?php if($page != "index.php"){ echo "../index.php"; } ?>">
                      <?php echo $home['menu'][0]; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu2" href="view/course.php"><?php echo $home['menu'][1]; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu2" href="view/announcement.php"><?php echo $home['menu'][2]; ?></a>
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
                    <li class="nav-item noneed">
                        <span class="nav-link">|</span>
                    </li>
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
        <div class="col-1 ms-3">
            <div class="nav-item landropdown">
              <button type="button" name="button" class="btn btn-default text-dark landropbtn">
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
    <!-- Navbar when scroll -->

    <!-- For Responsive -->

    <nav class="navbar navbar-expand-lg none toshow" id="navbar2" style="box-shadow:0px 10px 40px 0px rgba(0, 0, 255,0.2);">
      <div class="container">
        <div class="d-flex">
          <div class="col-7 d-flex">
            <div class="col-4 mb-1">
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
              <?php echo $home['main_title'][0]; ?>
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
                        <img src="images/us.jpg" alt="" width="150%">
                        <?php
                      }else{
                        ?>
                        <span style="font-size:14px;">
                          <img src="images/myanmar.jpg" alt="" width="150%">
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
            <a class="nav-link" href="view/course.php"><?php echo $home['menu']['1']; ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="view/announcement.php"><?php echo $home['menu']['2']; ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link menu" href="view/clients.php"><?php echo $home['menu'][6]; ?></a>
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
              <a class="nav-link" href="login.php"><?php echo $home['menu'][3]; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php" style="border-radius:3px;"><?php echo $home['menu'][4]; ?></a>
            </li>

            <?php
          }
        ?>
    </ul>
  </div>
  <!-- For Responsive -->

  </div>

  <!-- Home Screen -->
  <div class="headerimg d-flex" style="padding-top:17%; padding-left:20%;">
    <div class="col-8 me-2 ms-5 full text-center introdiv float-up">
      <h2 class="indextext mb-4 text-light" <?php if($_SESSION['language'] == 'eng'){ ?>style="font-size:40px; font-weight:bold;"<?php }else{ ?>style="font-size:33px; font-weight:bold;"<?php } ?>>
        <?php echo $home['main_intro']['title']; ?>
      </h2>
      <span class="text-light welcome">
        <?php echo $home['main_intro']['text']; ?>
      </span>
      <div class="d-flex mt-3 introbtn" style="justify-content:center !important;">
        <div class="indexbtn ms-4">
          <?php echo $home['main_intro']['total']; ?>
          <?php
          $datas = $query->selectCount('total_courses', 'course');
          echo $datas['total_courses'];
          ?>
          +
        </div>
        <div class="indexbtn">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
          </svg>
          <?php echo $home['main_intro']['ads']; ?>
        </div>
      </div>
    </div>
    <!-- <div class="ms-5 homediv mt-4 tohide" style="margin-left: 65px !important; width:400px; height:350px; background-color:white !important;">
      <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-interval="1000">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/laughing.jpg" class="d-block w-100 h-100 homeimage" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/it2.jpg" class="d-block w-100 h-100 homeimage" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/laughing2.jpg" class="d-block w-100 h-100 homeimage" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/accounting3.jpg" class="d-block w-100 h-100 homeimage" alt="...">
          </div>
        </div>
      </div>
    </div> -->
  </div>

  <div class="container mt-3 pt-3">
    <!-- Intro Screen -->
    <div id="introSection" class="row m-5 pt-4 intro-hidden">
      <div class="col-6 indeximgdiv">
        <img src="images/img.webp" alt="" style="width:100%; height:100%;">
      </div>
      <div class="col-6 mt-3 mb-5 ps-4 indexpara" style="text-align:justify;">
        <h3 class="mb-4"><b><?= $home['screen2']['title']; ?></b></h3>
        <?= $home['screen2']['text']; ?>
      </div>
    </div>

    <!-- Total Screen -->
    <div id="totalSection" class="row ps-5 pe-5 pb-5" style="margin-top:40px;">

      <!-- Total Users -->
      <div class="col-4 text-center pt-5 d-flex indexgroup">
        <div class="ms-5 me-3" style="width:50%; height:70%;">
          <img src="images/education.png" alt="" width="100%" height="100%" class="mb-3">
        </div>
        <div class="mt-5">
          <h3>
            <span class="count" data-target="<?= $query->selectCount('total_users', 'permission')['total_users']; ?>">0</span>+
          </h3>
          <h6><?= $home['screen3']['total1']; ?></h6>
        </div>
      </div>

      <!-- Total Courses -->
      <div class="col-4 text-center pt-5 d-flex indexgroup">
        <div class="ms-5 me-3" style="width:45%; height:80%;">
          <img src="images/online-course.png" alt="" width="100%" height="100%" class="mb-3">
        </div>
        <div class="mt-5">
          <h3>
            <span class="count" data-target="<?= $query->selectCount('total_courses', 'course')['total_courses']; ?>">0</span>+
          </h3>
          <h6><?= $home['screen3']['total2']; ?></h6>
        </div>
      </div>

      <!-- Total Videos -->
      <div class="col-4 text-center pt-5 d-flex indexgroup">
        <div class="ms-5 me-3 indexvideo" style="width:30%; height:55%;">
          <img src="images/video.png" alt="" width="100%" height="100%" class="mb-4 mt-3">
        </div>
        <div class="mt-5">
          <h3>
            <span class="count" data-target="<?= $query->selectCount('total_videos', 'videos')['total_videos']; ?>">0</span>+
          </h3>
          <h6><?= $home['screen3']['total3']; ?></h6>
        </div>
      </div>
    </div>

    <!-- Popular Course -->
    <div class="row mt-3 ms-5 me-5 courses">
      <h3 class="m-3"><?php echo $home['screen4']['title1'] . " "; ?><b class="text-danger"><?php echo $home['screen4']['title2']; ?></b></h3>
      <div class="col-8 pt-3">
        <div class="d-flex">
          <?php
          $coursedatas = $query->selectLimit('course', 4);
          ?>
          <div class="col-6 ms-2" style="height:235px;">
            <div class="container">
              <div class="course" style="background-image:url('admin/images/<?php echo $coursedatas[0]['image']; ?>'); background-size:cover; background-repeat: no-repeat; width:100%; height:100%;">
                <div class="coursetitle">
                  <a href="view/courseDetails.php?course_id=<?php echo $coursedatas[0]['id']; ?>"><h4><?php echo $coursedatas[0]['name']; ?></h4></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6" style="height:235px;">
            <div class="container">
              <div class="course" style="background-image:url('admin/images/<?php echo $coursedatas[1]['image']; ?>'); background-size:cover; background-repeat: no-repeat; width:100%; height:100%;">
                <div class="coursetitle">
                  <a href="view/courseDetails.php?course_id=<?php echo $coursedatas[1]['id']; ?>"><h4><?php echo $coursedatas[1]['name']; ?></h4></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex">
          <div class="col-12 mt-4 ms-2" style="height:235px;">
            <div class="container">
              <div class="course" style="background-image:url('admin/images/<?php echo $coursedatas[2]['image']; ?>'); background-size:cover; background-repeat: no-repeat; width:100%; height:100%;">
                <div class="coursetitle">
                  <a href="view/courseDetails.php?course_id=<?php echo $coursedatas[2]['id']; ?>"><h4><?php echo $coursedatas[2]['name']; ?></h4></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 pt-3" style="height:550px;">
        <div class="" style="height:92%;">
          <div class="tallcourse" style="background-image:url('admin/images/<?php echo $coursedatas[3]['image']; ?>'); background-size:cover; background-repeat: no-repeat; width:100%; height:100%;">
            <div class="tallcoursetitle">
              <a href="view/courseDetails.php?course_id=<?php echo $coursedatas[3]['id']; ?>"><h4><?php echo $coursedatas[3]['name']; ?></h4></a>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Course For Responsive -->

    <div id="demo" class="carousel slide d-none rescourses" data-bs-ride="carousel" style="height:400px;">
        <div class="carousel-inner">
          <h3 class="m-3"><?php echo $home['screen4']['title1'] . " "; ?><b class="text-danger"><?php echo $home['screen4']['title2']; ?></b></h3>
          <div class="col-9 pt-3 ms-2" style="height:550px;">
              <?php
              $coursedatas = $query->selectLimit('course', 4);
              $i = 0;
              foreach ($coursedatas as $coursedata) {
                ?>
                <div class="col-6 ms-5 carousel-item <?php if($i === 0){ echo "active"; } ?>" style="height:235px;">
                  <div class="container">
                    <div class="course" style="background-image:url('admin/images/<?php echo $coursedata['image']; ?>'); background-size:cover; background-repeat: no-repeat; width:100%; height:100%;">
                      <div class="coursetitle">
                        <a href="view/courseDetails.php?course_id=<?php echo $coursedata['id']; ?>"><h4><?php echo $coursedata['name']; ?></h4></a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                $i++;
              }
              ?>
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev" style="height:20px; color:black; margin-top:180px;">
            <img src="images/left.png" alt="" width="100%" height="100%">
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next" style="height:20px; color:black; margin-top:180px;">
            <img src="images/left.png" alt="" width="100%" height="100%" style="transform:rotateZ(180deg) !important;">
        </button>
    </div>

    <!-- Course For Responsive -->

  </div>
  <script type="text/javascript">
  var myCarousel = document.querySelector('#carouselExampleFade')
  var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 4000,
    ride: 'carousel'
  })
  </script>
  <?php include 'css/footer.php'; ?>
