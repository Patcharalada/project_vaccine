<?php 
    require_once('connection.php');

    if (isset($_REQUEST['btn_insert'])) {
        $vaccine_id = $_REQUEST['txt_vid'];
        $vaccine_name = $_REQUEST['txt_vname'];
        $details = $_REQUEST['txt_vdetails'];
        $type_name = $_REQUEST['txt_vtype'];

        if (empty($vaccine_id)) {
            $errorMsg = "กรุณากรอกรหัสวัคซีน";
        }
        if (empty($vaccine_name)) {
            $errorMsg = "กรุณากรอกชื่อวัคซีน";
        } 
        if (empty($details)) {
            $errorMsg = "กรุณากรอกรายละเอียด";
        }else if (empty($type_name)) {
            $errorMsg = " ";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO vaccine_name(vaccine_id, vaccine_name, details, type_name) VALUES (:vid, :vname, :vdetails, :vtype)");
                    $insert_stmt->bindParam(':vid', $vaccine_id);
                    $insert_stmt->bindParam(':vname', $vaccine_name);
                    $insert_stmt->bindParam(':vdetails', $details);
                    $insert_stmt->bindParam(':vtype', $type_name);

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

    select {
      padding: 6px ;
      border: none;
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
                    <label for="vaccine_id" class="col-sm-3 control-label">รหัสวัคซีน</label>
                    <div class="col-sm-9">
                        <input type="number" name="txt_vid" class="form-control" placeholder="กรุณากรอกรหัสวัคซีน">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="vaccine_name" class="col-sm-3 control-label">ชื่อวัคซีน</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_vname" class="form-control" placeholder="กรุณากรอกชื่อวัคซีน">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="details" class="col-sm-3 control-label">รายละเอียด</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_vdetails" class="form-control" placeholder="กรุณากรอกรายละเอียด">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="type_name" class="col-sm-3 control-label">ประเภทวัคซีน</label>
                    <div class="col-sm-9">
                      <select id="type" name="txt_vtype" class="form-control">
                        <option value="type1">วัคซีนพื้นฐานสำหรับเด็ก</option>
                        <option value="type2">วัคซีนกรณีฉุกเฉิน</option>
                      </select>
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
    </div>
    </div>
    
        <nav class="navbar navbar-expand-sm bg-light navbar-primary, justify-content-center fixed-bottom">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Designed by Patcharalada</a>
              </li>
            </ul>
        </nav>

</body>
</html>