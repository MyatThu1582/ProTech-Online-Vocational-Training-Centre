<?php include 'header.php' ?>
    <!-- Main content -->
    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <?php
            $request_user_datasstmt = $pdo->prepare("SELECT * FROM request_users ORDER BY id DESC");
            $request_user_datasstmt->execute();
            $request_user_datas = $request_user_datasstmt->fetchAll();
            ?>
            <table id="d-table" class="table">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Date</th>
                      <th>User Name</th>
                      <th>Course</th>
                      <th>Payment Image</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($request_user_datas as $request_user_data) {
                  $user_id = $request_user_data['user_id'];
                  $course_id = $request_user_data['course_id'];
                  $usernamestmt = $pdo->prepare("SELECT * FROM users WHERE id=:user_id");
                  $usernamestmt->execute(
                    array(':user_id' => $user_id)
                  );
                  $usernamedata = $usernamestmt->fetch(PDO::FETCH_ASSOC);
                  $username = $usernamedata['name'];

                  $course_namestmt = $pdo->prepare("SELECT * FROM course WHERE id=:course_id");
                  $course_namestmt->execute(
                    array(':course_id' => $course_id)
                  );
                  $course_namedata = $course_namestmt->fetch(PDO::FETCH_ASSOC);
                  $course = $course_namedata['name'];

                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($request_user_data['date'])); ?></td>
                    <td><?php echo $username;   ?></td>
                    <td><?php echo $course; ?></td>
                    <td>
                      <a href="../request_images/<?php echo $request_user_data['payment_photo']; ?>">
                        <img src="../request_images/<?php echo $request_user_data['payment_photo']; ?>" alt="" width="100">
                      </a>
                    </td>
                    <td>
                      <a href="accept.php?id=<?php echo $request_user_data['id']; ?>&user_id=<?php echo $user_id; ?>&course_id=<?php echo $course_id; ?>&duration_year=<?php echo $course_namedata['duration_year']; ?>&duration_month=<?php echo $course_namedata['duration_month']; ?>&request_date=<?php echo $request_user_data['date']; ?>" type="button" class="btn btn-success text-light btn-sm">
                        Accept
                      </a>
                      <a href="delete.php?table_name=request_users&id=<?php echo $request_user_data['id']; ?>" type="button" class="btn btn-danger btn-sm">
                        Cancel
                      </a>
                    </td>
                  </tr>
                  <?php
                  $no++;
                }
                 ?>
              </tbody>
          </table>
          </div>
        </div>
          </div>
        </div>
        </div>

<script type="text/javascript">
$(document).ready(function() {
  $('#d-table').DataTable();
})
</script>
