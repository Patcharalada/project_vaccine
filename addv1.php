<?php 
    require_once('connection.php');

    if (isset($_REQUEST['btn_insert'])) {
        $vacc_id = $_REQUEST['txt_vvid'];
        $vacc_name = $_REQUEST['txt_vvname'];
        $vacc_details = $_REQUEST['txt_vvdetails'];

        if (empty($vacc_id)) {
            $errorMsg = "กรุณากรอกรหัสวัคซีน";
        }
        if (empty($vacc_name)) {
            $errorMsg = "กรุณากรอกชื่อวัคซีน";
        } else if (empty($vacc_details)) {
            $errorMsg = "กรุณากรอกราายละเอียด";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO eme_vaccine(vacc_id, vacc_name, vacc_details) VALUES (:vvid, :vvname, :vvdetails)");
                    $insert_stmt->bindParam(':vvid', $vacc_id);
                    $insert_stmt->bindParam(':vvname', $vacc_name);
                    $insert_stmt->bindParam(':vvdetails', $vacc_details);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "เพิ่มข้อมูลสำเร็จ...";
                        header("refresh:1;vaccine.php");
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">

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
    <div class="text-center">
        <h1><br><b>เพิ่มข้อมูล</b></br></h1>
    </div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>ผิดพลาด! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    
    <?php 
         if (isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>สำเร็จ! <?php echo $insertMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5">
            <div class="form-group text-center">
                <div class="row">
                    <label for="vacc_id" class="col-sm-3 control-label">รหัสวัคซีน</label>
                    <div class="col-sm-9">
                        <input type="number" name="txt_vvid" class="form-control" placeholder="กรุณากรอกรหัสวัคซีน">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="vacc_name" class="col-sm-3 control-label">ชื่อวัคซีน</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_vvname" class="form-control" placeholder="กรุณากรอกชื่อวัคซีน">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="vacc_details" class="col-sm-3 control-label">รายละเอียด</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_vvdetails" class="form-control" placeholder="กรุณากรอกรายละเอียด...">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-5">
                    <input type="submit" name="btn_insert" class="btn btn-success" value="บันทึก">
                    <a href="vaccine.php" class="btn btn-danger">ยกเลิก</a>
                </div>
            </div>
    </form>

        <nav class="navbar navbar-expand-sm bg-light navbar-primary, justify-content-center fixed-bottom">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Designed by Patcharalada</a>
              </li>
            </ul>
        </nav>

</body>
</html>