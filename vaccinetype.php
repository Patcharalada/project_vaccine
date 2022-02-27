<?php 
    require_once('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccinetype</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
    body{
      background-color: #CCEAFF;
    }
    </style>
</head>

<body>
        <nav class="navbar navbar-expand-sm bg-light navbar-primary sticky-top">
          <a class="navbar-brand">โรงพยาบาลส่งเสริมสุขภาพตำบลบ้านดอนคา</a>
            <ul class="navbar-nav, nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link" href="member.php">รายชื่อผู้มารับบริการ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="vaccine.php">วัคซีน</a>
              </li>
            </ul>
        </nav>

    <div class="container">
        <div class="text-center text-primary">
            <h1><br><b>ประเภทของวัคซีน</b></br></h1>
        </div>

        <div class="section-title">
            <h4>1. วัคซีนพื้นฐานสำหรับเด็ก</h4>
            <h4>2. วัคซีนกรณีฉุกเฉิน</h4>
        </div>

            <a href="vaccine.php" class="btn btn-primary mt-4 float-center">ถัดไป</a>
            </div>
    </div>

        <nav class="navbar navbar-expand-sm bg-light navbar-primary, justify-content-center fixed-bottom">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Designed by Patcharalada</a>
              </li>
            </ul>
        </nav>

  </div>
</body>
</html>