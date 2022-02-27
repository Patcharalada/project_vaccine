<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <title>Register</title>

<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
  <style>
    body{
      background-color: #CCEAFF;
    }
    </style>

<body>

     <div class="container">
  <div class="row">
    <div class="col-md-12">
    <h3 align="center"> ลงทะเบียน </h3>
     <form  name="formlogin" action="" method="POST" id="login">
              <div class="row">
              <label class="col-md-6" style="text-align:right"> ชื่อ </label>
                <div class="col-md-6">
                <input type="text"  name="กรุณากรอกชื่อของผู้มารับบริการ" class="form-control" required placeholder="กรุณากรอกชื่อของผู้มารับบริการ" />
                </div>
                </div>
              
                <div class="row">
              <label class="col-md-6" style="text-align:right"> นามสกุล </label>
                <div class="col-md-6">
                <input type="text"  name="กรุณากรอกนามสกุลของผู้มารับบริการ" class="form-control" required placeholder="กรุณากรอกนามสกุลของผู้มารับบริการ" />
                </div>
                </div>

                <div class="row">
              <label class="col-md-6" style="text-align:right"> เบอร์โทรศัพท์ </label>
                <div class="col-md-6">
                <input type="text"  name="กรุณากรอกเบอร์โทรศัพท์ของผู้มารับบริการ" class="form-control" required placeholder="กรุณากรอกเบอร์โทรศัพท์ของผู้มารับบริการ" />
                </div>
                </div>

                <div class="row">
              <label class="col-md-6" style="text-align:right">เลข HN </label>
                <div class="col-md-6">
                <input type="text"  name="กรุณากรอกเลข HN ของผู้มารับบริการ" class="form-control" required placeholder="กรุณากรอกเลข HN ของผู้มารับบริการ" />
                </div>
                </div>

                <div class="row">
              <label class="col-md-6" style="text-align:right"> รหัสผ่าน </label>
                <div class="col-md-6">
                <input type="text"  name="กรุณากรอกรหัสผ่านของผู้รับบริการ" class="form-control" required placeholder="กรุณากรอกรหัสผ่าน" />
                </div>
                </div>

                <div class="row">
              <label class="col-md-6" style="text-align:right"> ยืนยันรหัสผ่าน </label>
                <div class="col-md-6">
                <input type="text"  name="กรุณายืนยันรหัสผ่านของผู้มารับบริการ" class="form-control" required placeholder="กรุณายืนยันรหัสผ่าน" />
                </div>
                </div>

              <div class="row">
              <div class="col-md-6"> </div>
              <div class="col-md-6">
              <br /><input name="remember" type="checkbox" value="Remember me" autocomplete="off" /> จำไว้ในระบบ

                </div>
                <div class="col-md-6"> </div>
              &nbsp; &nbsp; &nbsp; <br /> 
              <div class="col-md-12">
              <p align="right">
              
             
              <button type="submit" class="btn btn-success btn-sm" id="btn" value="Signin"> เข้าสู่ระบบ </button> 
              <button type="submit" class="btn btn-primary btn-sm" id="btn" value="Signin"> ลงทะเบียน </button>
              </p>
              </div>
              <br>
              
            </form>
      </div>
    </div>
  </div>
  </div>
    
  </body>
</html>