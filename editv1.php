<?php 
    require_once('connection.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $db->prepare("SELECT * FROM eme_vaccine WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        $vacc_id_up = $_REQUEST['txt_vvid'];
        $vacc_name_up = $_REQUEST['txt_vvname'];
        $vacc_details_up = $_REQUEST['txt_vvdetails'];

        if (empty($vacc_id_up)) {
            $errorMsg = "กรุณากรอกรหัสวัคซีน";
        } if (empty($vacc_name_up)) {
            $errorMsg = "กรุณากรอกชื่อวัคซีน";
        }else if (empty($vacc_details_up)) {
            $errorMsg = "กรุณากรอกราายละเอียด";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("UPDATE epi_vaccine SET vacc_id = :vvid_up, vacc_name = :vvname_up, vacc_details = vvdetails_up WHERE id = :id");
                    $update_stmt->bindParam(':vvid_up', $vacc_id_up);
                    $update_stmt->bindParam(':vvname_up', $vacc_name_up);
                    $update_stmt->bindParam(':vvdetails_up', $vacc_details_up);
                    $update_stmt->bindParam(':id', $id);

                    if ($update_stmt->execute()) {
                        $updateMsg = "บันทึกการแก้ไขข้อมูลสำเร็จ...";
                        header("refresh:1;vaccine.php");
                    }
                }
            } catch(PDOException $e) {
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
    <title>Edit</title>

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
            <h1><br><b>แก้ไขข้อมูล</b></br></h1>
        </div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>ผิดพลาด! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    
    <?php 
         if (isset($updateMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>สำเร็จ! <?php echo $updateMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5">
            <div class="form-group text-center">
                <div class="row">
                    <label for="vacc_id" class="col-sm-3 control-label">รหัสวัคซีน</label>
                    <div class="col-sm-9">
                        <input type="number" name="txt_vvid" class="form-control" value="<?php echo $vacc_id; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="vacc_name" class="col-sm-3 control-label">ชื่อวัคซีน</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_vvname" class="form-control" value="<?php echo $vacc_name; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="vacc_details" class="col-sm-3 control-label">รายละเอียด</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_vvdetails" class="form-control" value="<?php echo $vacc_details; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="บันทึก">
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