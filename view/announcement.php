<?php
include '../Controllers/query.ctr.php';
$query = new Query();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProTech - Announcement</title>
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
  background-position: 50% 63%;           /* keep your Y‑offset */

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
  /* backdrop-filter: blur(2px);             tiny blur = premium */
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
    <h2 class="testhover" style="font-size:30px; padding-top:21.5%; padding-left:10%; font-weight:bold;">
      <a href="announcement.php" class="text-light"><?php echo $announcement['title']; ?></a>
    </h2>
  </div>
  <div class="container m-5 p-5 nomargin">
    <span class="ms-5">No Result ...</span>
  </div>

<?php include '../css/footer.php'; ?>
