<?php
include '../Controllers/query.ctr.php';
$query = new Query();
require '../config/common.php';

if($_SESSION['role'] != "admin") {
  header('location: login.php');
}
if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])){
    header('location: login.php');
  }

 ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ProTech | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../font.css">
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <script src="../js/sweetalert.js"></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->

  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> -->

  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
  <style media="screen">
    body{
      font-family: "Titillium Web", sans-serif;
      font-weight: 600;
      font-style: normal;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light p-3">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php
        $link = $_SERVER['PHP_SELF'];
        $linkary = explode('/',$link);
        $page = end($linkary);
        if ($page == "index.php") {
            ?>
            <h1 class="card-title" style="font-size:25px;"><b>ProTech Dashboard</b></h1>
            <?php
        }elseif ($page == "accounts.php" || $page == "Accounts.php") {
            ?>
            <h1 class="card-title"><b>Manage Accounts</b></h1>
            <?php
        }elseif($page == "courses.php"){
          if (!empty($_SESSION['subject_id'])) {
            $subject_id = $_SESSION['subject_id'];
          }else{
            $subject_id = $_GET['subject_id'];
          }
          $mainSubjectName = $query->select('main_subjects',$subject_id);
            ?>
            <h1 class="card-title"><b>Manage <?php echo $mainSubjectName['subject_name']; ?> Courses</b></h1>
            <?php
        }elseif($page == "users.php"){
            ?>
            <h1 class="card-title"><b>Manage Users</b></h1>
            <?php
        }elseif($page == "video.php"){
            ?>
            <h1 class="card-title"><b>Manage Videos</b></h1>
            <?php
      }elseif($page == "chapters.php"){
            ?>
            <h1 class="card-title"><b>Manage Chapters</b></h1>
            <?php
      }elseif($page == "addAccount.php"){
            ?>
            <h1 class="card-title"><b>Add New Account</b></h1>
            <?php
       }elseif($page == "editAccount.php"){
            ?>
            <h1 class="card-title"><b>Edit Account</b></h1>
            <?php
        }elseif($page == "addCourse.php"){
            ?>
            <h1 class="card-title"><b>Add New Course</b></h1>
            <?php
        }elseif($page == "addChapter.php"){
            ?>
            <h1 class="card-title"><b>Add New Chapters</b></h1>
            <?php
        }elseif($page == "addVideo.php"){
            ?>
            <h1 class="card-title"><b>Add New Video</b></h1>
            <?php
        }elseif($page == "addMainSubject.php"){
            ?>
            <h1 class="card-title"><b>Add Main Subject</b></h1>
            <?php
        }elseif($page == "editMainSubject.php"){
            ?>
            <h1 class="card-title"><b>Edit Main Subject</b></h1>
            <?php
        }elseif($page == "editVideo.php"){
            ?>
            <h1 class="card-title"><b>Edit Video</b></h1>
            <?php
        }elseif($page == "editCourse.php"){
            ?>
            <h1 class="card-title"><b>Edit Course</b></h1>
            <?php
        }elseif($page == "editChapter.php"){
            ?>
            <h1 class="card-title"><b>Edit Chapter</b></h1>
            <?php
        }elseif($page == "request_users.php"){
            ?>
            <h1 class="card-title"><b>Manage Request Users</b></h1>
            <?php
        }elseif($page == "mainSubjects.php"){
            ?>
            <h1 class="card-title"><b>Manage Main Subjects</b></h1>
            <?php
        }
        elseif($page == "editMainSubjects.php"){
            ?>
            <h1 class="card-title"><b>Edit Main Subjects</b></h1>
            <?php
        }
            ?>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <?php
        $link = $_SERVER['PHP_SELF'];
        $linkary = explode('/',$link);
        $page = end($linkary);
        if($page == "courses.php"){
          if (!empty($_GET['subject_id'])) {
            $subject_id = $_GET['subject_id'];
          }else{
            $subject_id = $_SESSION['subject_id'];
          }
        ?>
        <a href="addCourse.php?subject_id=<?php echo $subject_id; ?>" class="btn btn-success btn-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
          </svg>
          Add New Course
        </a>
        <a href="mainSubjects.php" class="btn btn-danger ml-1 btn-sm">Back</a>
        <?php
      }elseif($page == "accounts.php" || $page == "Accounts.php"){
        ?>
        <a href="addAccount.php" class="btn btn-success btn-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
          </svg>
          Add New Account
        </a>
        <?php
      }elseif($page == "mainSubjects.php"){
        ?>
        <a href="addMainSubject.php" class="btn btn-success btn-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
          </svg>
          Add Main Subject
        </a>
        <?php
      }elseif($page == "chapters.php"){
        ?>
        <a href="addChapter.php" class="btn btn-success btn-sm">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
          </svg>
          Add New Chapters
        </a>
        <?php
      }elseif($page == "addAccount.php" || $page == "editAccount.php"){
         ?>
         <a href="accounts.php" class="btn btn-danger ml-1 btn-sm">Back</a>
         <?php
       }elseif($page == "addCourse.php" || $page == "editCourse.php"){
         $subject_id = $_SESSION['subject_id'];
          ?>
          <a href="courses.php?subject_id=<?php echo $subject_id; ?>" class="btn btn-danger ml-1 btn-sm">Back</a>
          <?php
        }elseif($page == "addChapter.php" || $page == "editChapter.php"){
          ?>
          <a href="chapters.php" class="btn btn-danger ml-1 btn-sm">Back</a>
          <?php
        }elseif($page == "addVideo.php" || $page == "editVideo.php"){
           ?>
          <a href="video.php" class="btn btn-danger ml-1 btn-sm">Back</a>
        <?php
      }elseif($page == "addMainSubject.php" || $page == "editMainSubject.php"){
           ?>
          <a href="mainSubjects.php" class="btn btn-danger ml-1 btn-sm">Back</a>
        <?php
          }
        ?>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="logo" style="width:50%; height:20%; overflow:hidden; margin-left:60px;">
      <a href="index.php" class="brand-link" style="width:100%; height:100%;">
        <img src="../images/original_logo.png" alt="" style="width:100%; height:100%;">
      </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 text-center">
        <div class="info text-light">
          <?php echo $_SESSION['name']; ?>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item ml-1">
           <a href="index.php" class="nav-link">
             <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
               <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
               <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3"/>
             </svg>
             <p class="ml-1">
               Dashboard
             </p>
           </a>
          </li>
          <li class="nav-item">
           <a href="accounts.php" class="nav-link">
             <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="ml-1 bi bi-person-rolodex" viewBox="0 0 16 16">
                <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z"/>
             </svg>
             <p class="ml-1">
               Accounts
             </p>
           </a>
          </li>
          <li class="nav-item">
            <a href="request_users.php" class="nav-link ml-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="mr-1 bi bi-person-fill-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
              </svg>
              <p>
                Request Users
              </p>
            </a>
          </li>
          <li class="nav-item">
           <a href="users.php" class="nav-link">
             <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
              </svg>
             <p class="ml-1">
               Users
             </p>
           </a>
          </li>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="ml-1 mr-1 bi bi-gear-fill" viewBox="0 0 16 16">
                  <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                </svg>
                <p>
                  Comfrigration
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="mainSubjects.php" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie ml-4"></i>
                    <p>
                      Main Subjects
                    </p>
                  </a>
                </li>
                <li class="nav-item text-light">
                  <a href="chapters.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="ml-4 mr-1 bi bi-files" viewBox="0 0 16 16">
                      <path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1M3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z"/>
                    </svg>
                    <p>
                      Chapters
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="video.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="ml-4 mr-1 bi bi-play-btn-fill" viewBox="0 0 16 16">
                      <path d="M0 12V4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2m6.79-6.907A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/>
                    </svg>
                    <p>
                      Videos
                    </p>
                  </a>
                </li>
              </ul>

              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Main Subjects
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <?php
                  $mainSubjectDatas = $query->selectAll('main_subjects');

                  foreach ($mainSubjectDatas as $mainSubjectData) {
                    ?>
                    <li class="nav-item">
                      <a href="courses.php?subject_id=<?= $mainSubjectData['id']; ?>" class="nav-link pl-5">
                        <p><?php echo $mainSubjectData['subject_name']; ?></p>
                      </a>
                    </li>
                    <?php
                  }
                   ?>
                </ul>
              </li> -->

            </li>
          </ul>
          <li class="nav-item">
            <a href="logout.php" class="nav-link ml-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="mr-1 bi bi-door-open-fill" viewBox="0 0 16 16">
                <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
              </svg>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="width:81.1%;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
