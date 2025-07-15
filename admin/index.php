<?php include 'header.php' ?>
    <!-- Main content -->
    <div class="container">
      <div class="d-flex">
        <div class="col-1">

        </div>

        <div class="col-3 m-4">
          <div class="card bg-secondary">
            <div class="text-light pt-4 pl-4 pb-4">
              <h1>
                <?php
                $datas = $query->selectCount('total_request_users', 'request_users');
                echo $datas['total_request_users'];
                ?>
              </h1>
              <!-- <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
              </svg> -->
              <h6>Request Users</h6>
            </div>
              <a href="request_users.php">
                <div class="text-light text-center pt-2 pb-1" style="background-color:rgba(0,0,0,0.1);">
                  <h6 class="">More Info</h6>
                </div>
            </a>
          </div>
        </div>

        <div class="col-3 m-4">
          <div class="card" style="background-color:orange !important;">
            <div class="text-light pt-4 pl-4 pb-4">
              <h1>
                <?php
                $datas = $query->selectCount('total_users', 'permission');
                echo $datas['total_users'];
                ?>
              </h1>
              <!-- <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
              </svg> -->
              <h6 class="">Total Users</h6>
            </div>
            <a href="users.php">
              <div class="text-light text-center pt-2 pb-1" style="background-color:rgba(0,0,0,0.1);">
                <h6 class="">More Info</h6>
              </div>
            </a>
          </div>
        </div>

        <div class="col-3 m-4">
          <div class="card" style="background-color:rgba(0,0,100,0.8) !important;">
            <div class="text-light p-4">
              <h1>
                <?php
                $datas = $query->selectCount('total_account', 'users');
                echo $datas['total_account'];
                ?>
              </h1>
              <!-- <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
              </svg> -->
              <h6>Total Accounts</h6>
            </div>
              <a href="accounts.php">
                <div class="text-light text-center pt-2 pb-1" style="background-color:rgba(0,0,0,0.1);">
                  <h6 class="">More Info</h6>
                </div>
              </a>
          </div>
        </div>
      </div>

      <div class="d-flex">
        <div class="col-1">

        </div>

        <div class="col-3 m-4">
          <div class="card bg-danger">
            <div class="text-light p-4">
              <h1>
                <?php
                $datas = $query->selectCount('total_mainsubjects', 'main_subjects');
                echo $datas['total_mainsubjects'];
                ?>
              </h1>
              <!-- <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
              </svg> -->
              <h6 class="mt-3">Total Main Subjects</h6>
            </div>
            <a href="mainSubjects.php">
              <div class="text-light text-center pt-2 pb-1" style="background-color:rgba(0,0,0,0.1);">
                <h6 class="">More Info</h6>
              </div>
            </a>
          </div>
        </div>

        <div class="col-3 m-4">
          <div class="card bg-success">
            <div class="text-light p-4">
              <h1>
                <?php
                $datas = $query->selectCount('total_chapters', 'chapters');
                echo $datas['total_chapters'];
                ?>
              </h1>
              <!-- <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
              </svg> -->
              <h6 class="mt-3">Total Chapters</h6>
            </div>
                <a href="chapters.php">
                <div class="text-light text-center pt-2 pb-1" style="background-color:rgba(0,0,0,0.1);">
                  <h6 class="">More Info</h6>
                </div>
              </a>
          </div>
        </div>

        <div class="col-3 m-4">
          <div class="card bg-info">
            <div class="text-light p-4">
              <h1>
                <?php
                $datas = $query->selectCount('total_videos', 'videos');
                echo $datas['total_videos'];
                ?>
              </h1>
              <!-- <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
              </svg> -->
              <h6 class="mt-3">Total Videos</h6>
            </div>
            <a href="video.php">
              <div class="text-light text-center pt-2 pb-1" style="background-color:rgba(0,0,0,0.1);">
                <h6 class="">More Info</h6>
              </div>
            </a>
          </div>
        </div>

      </div>
    </div>
