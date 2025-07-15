<?php
require '../Controllers/query.ctr.php';
$query = new Query();
require '../config/common.php';
if($_SESSION['role'] != "admin") {
  header('location: login.php');
}
if (empty($_SESSION['user_id']) && empty($_SESSION['logged_in'])){
    header('location: login.php');
  }
  $id = $_GET['id'];
  $user_id = $_GET['user_id'];
  $course_id = $_GET['course_id'];
  $request_date = $_GET['request_date'];
  $accept_date = date('Y-m-d');

  if ($_GET['duration_year'] > 0 || $_GET['duration_month'] > 0) {
    if ($_GET['duration_year'] > 0) {
      $duration_year = $_GET['duration_year'];
    }else{
      $duration_year = 0;
    }
    if ($_GET['duration_month'] > 0) {
      $duration_month = $_GET['duration_month'];
    }else{
      $duration_month = 0;
    }
  }

  $year = date('Y') + $duration_year;
  $month = date('m') + $duration_month;
  $day = date('d');
  $expire_date = $year . "-" . $month . "-" . $day;
  $status = $query->acceptUser($id, $user_id, $course_id, $request_date, $accept_date, $expire_date);
 ?>
