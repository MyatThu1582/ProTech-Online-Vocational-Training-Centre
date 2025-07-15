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
  <div class="container mt-5 mb-5 pb-5 nomargin">
    <div class="card-container row mb-no" style="margin-bottom:100px;">
        <div class="col-6 text-center full mlrb">
          <div class="card mb-4" style="box-shadow: 0px 8px 16px rgba(0,0,0,0.5);">
            <div class="card-body">
              <img src="../images/sms.png" alt="" width="100%" height="300px">
            </div>
          </div>
          <a href="http://shwemyanmarsan.protechmm.com" class="text-center mb-4">Shwe Myanmar San <br>Oversea Employment Angecy</a>
        </div>
        <div class="col-6 text-center full mlrb">
          <div class="card mb-4" style="box-shadow: 0px 8px 16px rgba(0,0,0,0.5);">
            <div class="card-body">
              <img src="../images/sbh.png" alt="" width="100%" height="300px">
            </div>
          </div>
          <a href="http://shwebhonehein.com" class="text-center mb-4">Shwe Bhone Hein <br>Oversea Employment Angecy</a>
        </div>
    </div>

    <div class="card-container row mb-no" style="margin-bottom:100px;">
        <div class="col-6 text-center full mlrb">
          <div class="card mb-4" style="box-shadow: 0px 8px 16px rgba(0,0,0,0.5);">
            <div class="card-body">
              <img src="../images/ds33.jpg" alt="" width="100%" height="300px">
            </div>
          </div>
          <a href="http://shwemyanmarsan.protechmm.com" class="text-center mb-4">Dhama School Foundation Yangon</a>
        </div>
        <div class="col-6 text-center full mlrb">
          <div class="card mb-4" style="box-shadow: 0px 8px 16px rgba(0,0,0,0.5);">
            <div class="card-body">
              <img src="../images/thaeinngu.png" alt="" width="100%" height="300px">
            </div>
          </div>
          <a href="../images/thaeinngu.png" class="text-center mb-4">Thaeinngu</a>
        </div>
    </div>

    <div class="card-container row mb-no" style="margin-bottom:20px;">
      <div class="col-6 text-center full mlrb">
        <div class="card mb-4" style="box-shadow: 0px 8px 16px rgba(0,0,0,0.5);">
          <div class="card-body">
            <img src="../images/asoka.png" alt="" width="100%" height="300px">
          </div>
        </div>
          <a href="http://asokabuddhiststudies.protechmm.com">Asoka Centre For Buddhist Studies</a>
      </div>
        <div class="col-6 text-center full mlrb">
          <div class="card mb-4" style="box-shadow: 0px 8px 16px rgba(0,0,0,0.5);">
            <div class="card-body">
              <img src="../images/linkmark.png" alt="" width="100%" height="300px">
            </div>
          </div>
          <a href="../images/linkmark.png">Link Mark Company Limited</a>
        </div>
    </div>
  </div>

<?php include '../css/footer.php'; ?>
