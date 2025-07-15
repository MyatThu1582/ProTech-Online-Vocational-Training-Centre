<?php
include '../Controllers/query.ctr.php';
$query = new Query();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProTech - Clients</title>
    <?php include '../css/link.php'; ?>
</head>
<style media="screen">
:root { --nav-h: 72px; }

.bannar {
  /* size & spacing */
  min-height: calc(60vh - var(--nav-h));
  margin: 0;
  display: flex;
  align-items: flex-end;
  padding: 0 10% 8%;

  /* parallax‑style background */
    background: url("../images/accounting2new.jpg") center/cover no-repeat fixed;
   background-position: 100% 63%;           /* keep your Y‑offset */

  /* readability */
  position: relative;
  color: #fff;
  overflow: hidden;
}

.bannar::before {                         /* soft dark overlay */
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(
              0deg,
              rgba(0,0,0,.55) 0%,
              rgba(0,0,0,.15) 60%,
              rgba(0,0,0,.05) 100%);
  /* backdrop-filter: blur(2px); */
  z-index: 0;
}

.bannar h2 {
  opacity: 0;
  transform-origin: left bottom;
  transform: translateY(20px) rotate(0deg);
  animation: slightTilt 0.5s ease-out 0.1s forwards;
}

@keyframes slightTilt {
  0% {
    opacity: 0;
    transform: translateY(-5px) rotate(-5deg);
  }
  100% {
    opacity: 1;
    transform: translateY(0) rotate(0deg);
  }
}
/* mobile fall‑back: fixed often disabled on iOS, so make banner taller */
@media (max-width: 576px) {
  .bannar { min-height: 70vh; background-attachment: scroll; }
}

</style>
<body>
  <div class="fixed-top">
    <?php
    include '../css/navbar.php';
    ?>
  </div>
  <div class="bannar">
    <h2 class="text-light testhover" style="font-size:27px; padding-top:21.5%; padding-left:10%; font-weight:bold;">
      <a href="course.php" class="text-light"><?php echo $clients['title']; ?><a>
    </h2>
  </div>
  <div class="container my-5">
  <div class="row g-4">

    <!-- ShweMyanmarSan -->
    <div class="col-md-4 col-sm-6">
      <div class="client-card position-relative overflow-hidden rounded-3 shadow-sm">
        <img src="../images/sms.png" class="img-fluid w-100 client-img" alt="Shwe Myanmar San">
        <div class="client-overlay">
          <div class="text-center text-white">
            <h5>Shwe Myanmar San</h5>
            <small>Oversea Employment Agency</small><br>
            <a href="http://shwemyanmarsan.protechmm.com" class="btn btn-outline-light btn-sm mt-3" target="_blank">Visit Site</a>
          </div>
        </div>
      </div>
    </div>

    <!-- ShweBhoneHein -->
    <div class="col-md-4 col-sm-6">
      <div class="client-card position-relative overflow-hidden rounded-3 shadow-sm">
        <img src="../images/sbh.png" class="img-fluid w-100 client-img" alt="Shwe Bhone Hein">
        <div class="client-overlay">
          <div class="text-center text-white">
            <h5>Shwe Bhone Hein</h5>
            <small>Oversea Employment Agency</small><br>
            <a href="http://shwebhonehein.com" class="btn btn-outline-light btn-sm mt-3" target="_blank">Visit Site</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Thaeinngu -->
     <div class="col-md-4 col-sm-6">
      <div class="client-card position-relative overflow-hidden rounded-3 shadow-sm">
        <img src="../images/thaeinngu.jpg" class="img-fluid w-100 client-img" alt="ThaeInngu">
        <div class="client-overlay">
          <div class="text-center text-white">
            <h5>Thaeinngu</h5>
            <small>ဗဟိုဌာနချုပ် (မှော်ဘီ )</small><br>
            <a href="http://thaeinngu.org" class="btn btn-outline-light btn-sm mt-3" target="_blank">Visit Site</a>
          </div>
        </div>
      </div>
    </div>

    <!-- DhammaSchool -->
     <div class="col-md-4 col-sm-6">
      <div class="client-card position-relative overflow-hidden rounded-3 shadow-sm">
        <img src="../images/ds33.jpg" class="img-fluid w-100 client-img" alt="ThaeInngu">
        <div class="client-overlay">
          <div class="text-center text-white">
            <h5>Dhamma School Foundation</h5>
            <small>Yangon</small><br>
            <a href="../images/ds33.jpg" class="btn btn-outline-light btn-sm mt-3" target="_blank">Visit Site</a>
          </div>
        </div>
      </div>
    </div>

    <!-- LinkMark -->
     <div class="col-md-4 col-sm-6">
      <div class="client-card position-relative overflow-hidden rounded-3 shadow-sm">
        <img src="../images/linkmark.png" class="img-fluid w-100 client-img" alt="ThaeInngu">
        <div class="client-overlay">
          <div class="text-center text-white">
            <h5>Link Mark Company Limited</h5>
            <small>Fish Export Trading</small><br>
            <a href="../images/linkmark.png" class="btn btn-outline-light btn-sm mt-3" target="_blank">Visit Site</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Asoka -->
     <div class="col-md-4 col-sm-6">
      <div class="client-card position-relative overflow-hidden rounded-3 shadow-sm">
        <img src="../images/asoka.png" class="img-fluid w-100 client-img" alt="ThaeInngu">
        <div class="client-overlay">
          <div class="text-center text-white">
            <h5>Asoka</h5>
            <small>Center of Buddhist Studies</small><br>
            <a href="http://asokabuddhiststudies.com" class="btn btn-outline-light btn-sm mt-3" target="_blank">Visit Site</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php include '../css/footer.php'; ?>
