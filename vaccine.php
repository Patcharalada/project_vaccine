<?php 
    require_once('connection.php');

    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];

        $select_stmt = $db->prepare("SELECT * FROM vaccine_name WHERE id = :vaccine_id");
        $select_stmt->bindParam(':vaccine_id', $vaccine_id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        // Delete an original record from db
        $delete_stmt = $db->prepare('DELETE FROM vaccine_name WHERE id = :vaccine_id');
        $delete_stmt->bindParam(':vaccine_id', $vaccine_id);
        $delete_stmt->execute();

        header('Location:vaccine.php');
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
    <title>Vaccine</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
    body{
      background-color: #CCEAFF;
    }
    thead,tbody{
      background-color: #FFFFFF;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }
    th {
        text-align: center;
    }
    tr {
        vertical-align: middle;
    }
    </style>
</head>

<body>
    
        <nav class="navbar navbar-expand-sm bg-light navbar-primary sticky-top">
          <a class="navbar-brand"><h4>โรงพยาบาลส่งเสริมสุขภาพตำบลบ้านดอนคา</h4></a>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="member.php">รายชื่อรายชื่อผู้มารับบริการ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="vaccine.php">วัคซีน</a>
              </li>
            </ul>
        </nav>

    <div class="container">
        <div class="text-center text-primary">
            <h1><b>วัคซีน</b></h1>
        </div>

    <a href="add.php" class="btn btn-success mb-3 float-right">เพิ่มข้อมูล</a>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>รหัสวัคซีน</th>
                <th>ชื่อวัคซีน</th>
                <th>รายละเอียด</th>
                <th>ประเภทวัคซีน</th>
                <th>แก้ไขข้อมูล</th>
                <th>ลบข้อมูล</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $select_stmt = $db->prepare("SELECT * FROM vaccine_name");
                $select_stmt->execute();

                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $row["vaccine_id"]; ?></td>
                    <td><?php echo $row["vaccine_name"]; ?></td>
                    <td><?php echo $row["details"]; ?></td>
                    <td><?php echo $row["type_name"]; ?></td>
                    <td><a href="edit.php?update_id=<?php echo $row["vaccine_id"]; ?>" class="btn btn-warning">แก้ไข</a></td>
                    <td><a href="?delete_id=<?php echo $row["vaccine_id"]; ?>" class="btn btn-danger">ลบ</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>

        <nav class="navbar navbar-expand-sm bg-light navbar-primary, fixed-bottom, justify-content-center">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Designed by Patcharalada</a>
              </li>
            </ul>
        </nav>
        
  </div>
</body>
</html>