<?php
session_start();
include "database.php";

class Query
{
  public function register_role_attach($user_id, $role_id)
  {
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO role_user(role_id, user_id) VALUES('$role_id', '$user_id')");
    $stmt->execute();

    if ($stmt) {
      return ['status'=> 'success'];
    }else{
      return ['status'=> 'failed'];
    }
  }

  public function register($name, $email, $password){

    global $pdo;

    $passHash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (name,email,password) VALUES('$name', '$email', '$passHash')");
    $stmt->execute();
    if ($stmt) {
      $latestaddeduserstmt = $pdo->prepare("SELECT * FROM users ORDER BY id DESC");
      $latestaddeduserstmt->execute();
      $userdata = $latestaddeduserstmt->fetch(PDO::FETCH_ASSOC);

      $rolestmt = $pdo->prepare("SELECT * FROM `roles` WHERE `role_name` = 'user'");
      $rolestmt->execute();
      $roledata = $rolestmt->fetch(PDO::FETCH_ASSOC);
      $role = $this->register_role_attach($userdata['id'], $roledata['id']);
      if ($role['status'] == 'success') {
        return ['status' => 'success'];
      }
    }else{
      return ['status' => 'error'];
    }
  }

  public function login($email, $password){
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->bindValue(':email',$email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($user)) {
      if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['logged_in'] = time();

            // $role_idstmt = $pdo->prepare("SELECT * FROM role_user WHERE user_id=:user_id");
            // $role_idstmt->execute(
            //   array(':user_id' => $user['id'])
            // );
            // $role_iddata = $role_idstmt->fetch(PDO::FETCH_ASSOC);
            // $role_id = $role_iddata['role_id'];
            //
            // $role_namestmt = $pdo->prepare("SELECT * FROM roles WHERE id=:role_id");
            // $role_namestmt->execute(
            //   array(':role_id' => $role_id)
            // );
            // $role_namedata = $role_namestmt->fetch(PDO::FETCH_ASSOC);
            // $role_name = $role_namedata['role_name'];
            //
            // $_SESSION['role'] = $role_name;

            // if ($_SESSION['role'] == "admin") {
            //   header('location: index.php');
            // }else{
            //   header('location: login.php');
            // }
            // echo "<script>window.location.href='index.php';</script>";
              header('location: index.php');
      }else{
        echo '<script>';
        echo 'swal("Error!", "Incorrect Password, Please try again", "warning").then(function() {';
        echo '   window.location.href = "login.php";';
        echo '});';
        echo '</script>';
      }
    }else{
      echo '<script>';
      echo 'swal("Error!", "Incorrect Email, Please try again", "warning").then(function() {';
      echo '   window.location.href = "login.php";';
      echo '});';
      echo '</script>';
    }
  }


// Admin Panel query


public function addUser($name, $email, $role_id, $passHash, $image)
{
  global $pdo;

  $userstmt = $pdo->prepare("INSERT INTO users (name,email,password,image) VALUES (:name,:email,:password,:image)");
  $result1 = $userstmt->execute(
    array
    (':name' => $name, ':email' => $email, ':password' => $passHash, ':image' => $image)
  );

  $user_idstmt = $pdo->prepare("SELECT * FROM users ORDER BY id DESC");
  $user_idstmt->execute();
  $user_id = $user_idstmt->fetch(PDO::FETCH_ASSOC);
  $userid = $user_id['id'];
  $role_userstmt = $pdo->prepare("INSERT INTO role_user (role_id, user_id) VALUES (:role_id, :user_id)");
  $result2 = $role_userstmt->execute(
    array
    (':role_id' => $role_id, ':user_id' => $userid)
  );

  if ($result1 && $result2) {
    // echo '<script>swal("Good job!", "You clicked the button!", "success");</script>';
    echo '<script>';
    echo 'swal("Success!", "Account Created Successfully", "success").then(function() {';
    echo '   window.location.href = "accounts.php";';
    echo '});';
    echo '</script>';
  }
}

public function editUser($name, $email, $password, $role_id, $id)
{
  global $pdo;

  $date = date("Y-m-d");
  $time = date("h:i:s");
  $updated_at = $date . " " . $time;
    $passHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email AND id!=:id");
    $stmt->execute(
      array (':email'=>$email,':id'=>$id)
    );
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      echo '<script>swal("Sorry", "This email is already exist !!", "error");</script>';
    }else{
      if ($password != null) {
        $stmt = $pdo->prepare("UPDATE users SET name='$name', email='$email', password='$passHash', updated_at='$updated_at' WHERE id='$id'");
      }else{
        $stmt = $pdo->prepare("UPDATE users SET name='$name', email='$email', updated_at='$updated_at' WHERE id='$id'");
      }
      $result1 = $stmt->execute();

      $role_userstmt = $pdo->prepare("UPDATE role_user SET role_id=:role_id WHERE user_id='$id'");
      $result2 = $role_userstmt->execute(
        array(':role_id' => $role_id)
      );

      if ($result1 && $result2) {
        echo '<script>';
        echo 'swal("Success", "Updated Successfully", "success").then(function() {';
        echo '   window.location.href = "accounts.php";';
        echo '});';
        echo '</script>';
      }
    }
}

public function editUserwithimg($name, $email, $password, $role_id, $image, $id)
{
  global $pdo;

  $date = date("Y-m-d");
  $time = date("h:i:s");
  $updated_at = $date . " " . $time;
    $passHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email AND id!=:id");
    $stmt->execute(
      array (':email'=>$email,':id'=>$id)
    );
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      echo '<script>swal("Sorry", "This email is already exist !!", "error");</script>';
    }else{
      if ($password != null) {
        $stmt = $pdo->prepare("UPDATE users SET name='$name', email='$email', password='$passHash', image='$image', updated_at='$updated_at' WHERE id='$id'");
      }else{
        $stmt = $pdo->prepare("UPDATE users SET name='$name', email='$email', image='$image', updated_at='$updated_at' WHERE id='$id'");
      }
      $result1 = $stmt->execute();

      $role_userstmt = $pdo->prepare("UPDATE role_user SET role_id=:role_id WHERE user_id='$id'");
      $result2 = $role_userstmt->execute(
        array(':role_id' => $role_id)
      );

      if ($result1 && $result2) {
        echo '<script>';
        echo 'swal("Success", "Updated Successfully", "success").then(function() {';
        echo '   window.location.href = "accounts.php";';
        echo '});';
        echo '</script>';
      }
    }
}

public function addMainSubject($subject_name)
{
  global $pdo;

  $mainSubjectstmt = $pdo->prepare("INSERT INTO main_subjects(subject_name) VALUES (:subject_name)");
  $mainSubject = $mainSubjectstmt->execute(
    array(':subject_name' => $subject_name)
  );
  if ($mainSubject) {
    echo '<script>';
    echo 'swal("Success", "Added Main Subject Successfully", "success").then(function() {';
    echo '   window.location.href = "mainSubjects.php";';
    echo '});';
    echo '</script>';
  }
}

public function editMainSubject($subject_name, $id)
{
  global $pdo;

  $date = date("Y-m-d");
  $time = date("h:i:s");
  $updated_at = $date . " " . $time;

  $stmt = $pdo->prepare("UPDATE main_Subjects SET subject_name=:subject_name, updated_at=:updated_at WHERE id='$id'");
  $result = $stmt->execute(
    array(':subject_name' => $subject_name, ':updated_at' => $updated_at)
  );
  if ($result) {
      echo '<script>';
      echo 'swal("Success", "Update Main Subject Successfully", "success").then(function() {';
      echo '   window.location.href = "mainSubjects.php";';
      echo '});';
      echo '</script>';
  }
}

public function addCourse($name, $desc, $content, $duration_year, $duration_month, $type, $fee, $image, $subject_id)
{
  global $pdo;

  $coursestmt = $pdo->prepare("INSERT INTO course(name,description,content,type,fee,image,duration_year,duration_month,subject_id) VALUES (:name,:desc,:content,:type,:fee,:image,:duration_year,:duration_month,:subject_id)");
  $courseresult = $coursestmt->execute(
    array(':name' => $name, ':desc' => $desc, ':content' => $content, ':type' => $type, ':fee' => $fee, ':image' => $image, ':duration_year' => $duration_year, ':duration_month' => $duration_month, ':subject_id' => $subject_id)
  );
  if ($courseresult) {
    echo '<script>';
    echo 'swal("Success", "Added Course Successfully", "success").then(function() {';
    echo '   window.location.href = "courses.php?subject_id=";' . $subject_id;
    echo '});';
    echo '</script>';
  }
}

public function editCoursewithimage($name, $subject_id, $desc, $content, $duration_year, $duration_month, $type, $fee, $image, $id)
{
  global $pdo;

  $stmt = $pdo->prepare("UPDATE course SET name=:name, description=:desc, content=:content, type=:type, fee=:fee, image=:image, duration_year=:duration_year, duration_month=:duration_month, subject_id=:subject_id WHERE id='$id'");
  $result = $stmt->execute(
    array(':name' => $name, ':desc' => $desc, ':content' => $content, ':type' => $type, ':fee' => $fee, ':image' => $image, ':duration_year' => $duration_year, ':duration_month' => $duration_month, ':subject_id' => $subject_id)
  );
  if ($result) {
      echo '<script>';
      echo 'swal("Success", "Update Course Successfully", "success").then(function() {';
      // echo '   window.location.href = "courses.php";';
      echo '});';
      echo '</script>';
  }
}

public function editCoursewithoutimage($name, $subject_id, $desc, $content, $duration_year, $duration_month, $type, $fee, $id)
{
  global $pdo;

  $stmt = $pdo->prepare("UPDATE course SET name=:name, description=:desc, content=:content, type=:type, fee=:fee, duration_year=:duration_year, duration_month=:duration_month, subject_id=:subject_id WHERE id='$id'");
  $result = $stmt->execute(
    array(':name' => $name, ':desc' => $desc, ':content' => $content, ':type' => $type, ':fee' => $fee, ':duration_year' => $duration_year, ':duration_month' => $duration_month, ':subject_id' => $subject_id)
  );
  if ($result) {
      echo '<script>';
      echo 'swal("Success", "Update Course Successfully", "success").then(function() {';
        echo 'window.location.href = "courses.php";';
      echo '});';
      echo '</script>';
  }
}

public function addChapter($title, $course_id, $description)
{
  global $pdo;

  $userstmt = $pdo->prepare("INSERT INTO chapters (title,course_id,description) VALUES (:title,:course_id,:description)");
  $result1 = $userstmt->execute(
    array
    (':title' => $title, ':course_id' => $course_id, ':description' => $description)
  );
  // if ($result1) {
  //   echo "<script>alert(\"SUCCESS\");</script>";
  // }
  if ($result1) {
    echo '<script>';
    echo 'swal("Success!", "Chapter Created Successfully", "success").then(function() {';
    echo '   window.location.href = "chapters.php";';
    echo '});';
    echo '</script>';
  }
}

public function editChapter($title, $course_id, $description, $id)
{
  global $pdo;

  $userstmt = $pdo->prepare("UPDATE chapters SET title=:title,course_id=:course_id,description=:description WHERE id='$id'");
  $result1 = $userstmt->execute(
    array
    (':title' => $title, ':course_id' => $course_id, ':description' => $description)
  );
  if ($result1) {
    echo '<script>';
    echo 'swal("Success!", "Chapter Edited Successfully", "success").then(function() {';
    echo '   window.location.href = "chapters.php";';
    echo '});';
    echo '</script>';
  }
}

public function addVideo($title, $course_id, $chapter_id, $description, $video)
{
  global $pdo;
  $video_order_stmt = $pdo->prepare("SELECT COUNT(*) AS row_count FROM videos WHERE chapter_id='$chapter_id'");
  $video_order_stmt->execute();
  $video_order_datas = $video_order_stmt->fetch(PDO::FETCH_ASSOC);
  if ($video_order_datas['row_count'] > 0) {
    $video_order = $video_order_datas['row_count'] + 1;
  }else{
    $video_order = 1;
  }

  $stmt = $pdo->prepare("INSERT INTO videos (video_order, video_url, course_id, chapter_id, title, description) VALUES (:video_order, :video_url, :course_id, :chapter_id, :title, :description)");
  $stmt->execute(
    array(':video_order' => $video_order, ':video_url' => $video, ':course_id' => $course_id, ':chapter_id' => $chapter_id, ':title' => $title, ':description' => $description)
  );

  if ($stmt) {
    echo '<script>';
    echo 'swal("Success!", "Video Created Successfully", "success").then(function() {';
    echo '   window.location.href = "video.php";';
    echo '});';
    echo '</script>';
  }
}

public function editvideo($title, $description, $course_id, $chapter_id, $video, $id)
{
  global $pdo;

  $stmt = $pdo->prepare("UPDATE videos SET video_url=:video, course_id=:course_id, chapter_id=:chapter_id, title=:title, description=:description WHERE id='$id'");
  $result1 = $stmt->execute(
    array
    (':video' => $video, ':course_id' => $course_id, ':chapter_id' => $chapter_id, ':title' => $title, ':description' => $description)
  );
  if ($result1) {
    echo '<script>';
    echo 'swal("Success!", "Video Edited Successfully", "success").then(function() {';
    echo '   window.location.href = "video.php";';
    echo '});';
    echo '</script>';
  }
}

public function addRequest($date, $user_id, $course_id, $image)
{
  global $pdo;

  $stmt = $pdo->prepare("INSERT INTO request_users (date,user_id,course_id,payment_photo) VALUES (:date,:user_id,:course_id,:image)");
  $stmt->execute(
    array(':date' => $date, ':user_id' => $user_id, ':course_id' => $course_id, ':image' => $image)
  );
  // if ($stmt) {
  //   echo '<script>';
  //   echo 'swal("Success!", "Request Successfully, Please wait 24 hours, then you can learn this course .", "success").then(function() {';
  //   echo '   window.location.href = "courseDetails.php?course_id=$course_id";';
  //   echo '});';
  //   echo '</script>';
  // }
}
public function acceptUser($id, $user_id, $course_id, $request_date, $accept_date, $expire_date)
{
  global $pdo;

  $stmt = $pdo->prepare("INSERT INTO permission (request_date,user_id,course_id,accept_date,expire_date,status) VALUES (:request_date,:user_id,:course_id,:accept_date,:expire_date,:status)");
  $stmt->execute(
    array(':request_date' => $request_date, ':user_id' => $user_id, ':course_id' => $course_id, ':accept_date' => $accept_date, ':expire_date' => $expire_date, ':status' => "yes")
  );
  $stmt = $pdo->prepare("DELETE FROM request_users WHERE id='$id'");
  $result = $stmt->execute();
  if ($stmt) {
    header('location: request_users.php');
  }
}

public function editPassword($newPassword, $user_id)
{
  global $pdo;

  $passHash = password_hash($newPassword, PASSWORD_DEFAULT);
  $stmt = $pdo->prepare("UPDATE users SET password=:newPassword WHERE id='$user_id'");
  $stmt->execute(
    array(':newPassword' => $passHash)
  );
  if ($stmt) {
    echo '<script>';
    echo 'swal("Success!", "Password Edited Successfully, Please Log in again", "success").then(function() {';
    echo '   window.location.href = "../logout.php";';
    echo '});';
    echo '</script>';
  }
}

public function editProfile($image, $user_id)
{
  global $pdo;

  $stmt = $pdo->prepare("UPDATE users SET image=:image WHERE id='$user_id'");
  $stmt->execute(
    array(':image' => $image)
  );
}

public function addFeedback($comments, $course_id, $user_id)
{
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO feedback(user_id, course_id, feedback) VALUES ('$user_id', '$course_id', '$comments')");
    $stmt->execute();
    if ($stmt) {
      echo '<script>';
      echo 'swal("Thank You", "Submit Feedback Successfully", "success").then(function() {';
      echo '   window.location.href = "courseDetails.php";';
      echo '});';
      echo '</script>';
    }
}

public function editFeedback($new_comments, $user_id)
{
    global $pdo;

    $stmt = $pdo->prepare("UPDATE feedback SET feedback=:feedback WHERE user_id='$user_id'");
    $stmt->execute(
      array(':feedback' => $new_comments)
    );
    if ($stmt) {
      echo '<script>';
      echo 'swal("Success", "Edited Feedback Successfully,", "success").then(function() {';
      echo '   window.location.href = "courseDetails.php";';
      echo '});';
      echo '</script>';
    }
}

// COMMON FUNCTIONS

public function selectOne($table)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM $table ORDER BY id");
  $stmt->execute();
  $datas = $stmt->fetch(PDO::FETCH_ASSOC);
  return $datas;
}

public function select($table, $id)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM $table WHERE id = '$id' ORDER BY id DESC");
  $stmt->execute();
  $datas = $stmt->fetch(PDO::FETCH_ASSOC);
  return $datas;
}

public function selectAll($table)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM $table ORDER BY id DESC");
  $stmt->execute();
  $datas = $stmt->fetchall();
  return $datas;
}

public function selectAllNoDesc($table)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM $table ORDER BY id");
  $stmt->execute();
  $datas = $stmt->fetchall();
  return $datas;
}

public function selectWithCol($table, $col, $id)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM $table WHERE $col='$id' ORDER BY id DESC");
  $stmt->execute();
  $datas = $stmt->fetchall();
  return $datas;
}

public function selectLimit($table, $limit)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM $table ORDER BY id LIMIT $limit");
  $stmt->execute();
  $datas = $stmt->fetchall();
  return $datas;
}

public function selectOneWithWhere($table,$column,$what)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM $table WHERE $column=:what");
  $stmt->execute(
    array(':what' => $what)
  );
  $datas = $stmt->fetch(PDO::FETCH_ASSOC);
  return $datas;
}


public function selectCount($aswhat, $table)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT COUNT(*) AS :aswhat FROM $table");
  $stmt->execute(
    array(':aswhat' => $aswhat)
  );
  $datas = $stmt->fetch(PDO::FETCH_ASSOC);
  return $datas;
}

public function selectCountWithWhere($aswhat, $table,$column,$what)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT COUNT(*) AS :aswhat FROM $table WHERE $column=:what");
  $stmt->execute(
    array(':aswhat' => $aswhat, ':what' => $what)
  );
  $datas = $stmt->fetch(PDO::FETCH_ASSOC);
  return $datas;
}

public function search($table,$column,$search)
{
  global $pdo;

  $stmt = $pdo->prepare("SELECT * FROM $table WHERE $column LIKE '%$search%' ORDER BY id DESC");
  $stmt->execute();
  $datas = $stmt->fetchall();
  return $datas;
}
}
