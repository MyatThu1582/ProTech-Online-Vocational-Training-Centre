<?php include 'header.php' ?>
    <!-- Main content -->
    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <?php
            $user_datas = $query->selectAll('users');
            ?>
            <table id="d-tabe" class="table">
              <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- <th>Password</th> -->
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($user_datas as $user_data) {
                  $user_id = $user_data['id'];
                  $role_idstmt = $pdo->prepare("SELECT * FROM role_user WHERE user_id=:user_id");
                  $role_idstmt->execute(
                    array(':user_id' => $user_id)
                  );
                  $role_iddata = $role_idstmt->fetch(PDO::FETCH_ASSOC);
                  $role_id = $role_iddata['role_id'];

                  $role_namestmt = $pdo->prepare("SELECT * FROM roles WHERE id=:role_id");
                  $role_namestmt->execute(
                    array(':role_id' => $role_id)
                  );
                  $role_namedata = $role_namestmt->fetch(PDO::FETCH_ASSOC);
                  $role_name = $role_namedata['role_name'];

                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $user_data['name']; ?></td>
                    <td><?php echo $user_data['email']; ?></td>
                    <!-- <td><?php //echo $user_data['password']; ?></td> -->
                    <td><?php echo $role_name; ?></td>
                    <td><?php echo $user_data['created_at']; ?></td>
                    <td><?php echo $user_data['updated_at']; ?></td>
                    <td>
                      <a href="editAccount.php?id=<?php echo $user_data['id']; ?>" type="button" class="btn btn-warning text-light btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                      </a>
                      <a href="delete.php?table_name=users&id=<?php echo $user_data['id']; ?>" type="button" class="btn btn-danger btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
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

<?php include 'footer.html'; ?>
<script type="text/javascript">
$(document).ready(function() {
  $('#d-table').DataTable();
})
</script>
