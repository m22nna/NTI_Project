<?php
include 'header.php'
?>
<?php
include 'configration.php';
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($_POST) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $number = $_POST['number'];
  $gender = $_POST['gender'];
  $birthdate = $_POST['birthdate'];

  $query = "INSERT INTO patient (`first_name`, `last_name`, `email`, `number`, `password`, `gender`, `birthdate`) 
            VALUES ('$first_name','$last_name','$email','$number','$password','$gender','$birthdate')";
  mysqli_query($connection, $query);
  echo "<script>alert('User Registered Successfully');</script>";
}


?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>انضم الآن</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Tahoma, Arial, sans-serif;
    }
    body {
      margin: 0;
      background: #e3e7eb;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    
    main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0;
    }
    .signup-box {
      background: #fff;
      width: 380px;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .signup-header {
        background: rgb(0, 112, 205);
        color: #fff;
        text-align: center;
        padding: -10px;
        font-size: 13px;
        font-weight: bold;
        height: 25px;
    }
    .signup-body {
      padding: 20px;
    }
    .fb-btn {
      background: #3b5998;
      color: #fff;
      border: none;
      padding: 8px;
      width: 100%;
      border-radius: 4px;
      cursor: pointer;
      font-size: 13px;
    }
    .divider {
      text-align: center;
      margin: 15px 0;
      position: relative;
    }
    .divider::before, .divider::after {
      content: "";
      position: absolute;
      top: 50%;
      width: 35%;
      height: 1px;
      background: #ccc;
    }
    .divider::before { right: 0; }
    .divider::after { left: 0; }
    .divider span {
      background: #fff;
      padding: 0 8px;
      color: #888;
      font-size: 12px;
    }
    .form-group {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 12px;
    }
    .form-group label {
      flex: 0 0 110px;
      font-size: 13px;
      color: #333;
    }
    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="password"],
    .form-group input[type="date"],
    .form-group select {
      flex: 1;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 13px;
    }
    .gender {
      display: flex;
      align-items: center;
      gap: 15px;
      font-size: 13px;
    }
    .switch {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 12px;
      font-size: 13px;
    }
    .submit-btn {
      background: #e60000;
      color: #fff;
      border: none;
      padding: 10px;
      width: 95px;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
    }
    form hr {
        width: 340px;
    }
    .signup-footer {
      text-align: center;
      font-size: 12px;
      margin-top: 10px;
    }
    .signup-footer a {
      color: #0069d9;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <main>
    <div class="signup-box">
      <div class="signup-header">انضم الآن</div>
      <div class="signup-body">
        <button class="fb-btn">فعل حسابك مع فيسبوك</button>

        <div class="divider"><span>أو</span></div>

       <form method="post">
  <div class="form-group">
    <label>الاسم الأول *</label>
    <input type="text" name="first_name" placeholder="الاسم الأول" required>
  </div>

  <div class="form-group">
    <label>الاسم الأخير *</label>
    <input type="text" name="last_name" placeholder="الاسم الأخير" required>
  </div>

  <div class="form-group">
    <label>رقم الموبايل *</label>
    <input type="text" name="number" placeholder="رقم الموبايل" required>
  </div>

  <div class="form-group">
    <label>البريد الإلكتروني *</label>
    <input type="email" name="email" placeholder="example@domain.com" required>
  </div>

  <div class="form-group">
    <label>النوع *</label>
    <div class="gender">
      <label><input type="radio" name="gender" value="male"> ذكر</label>
      <label><input type="radio" name="gender" value="female"> أنثى</label>
    </div>
  </div>

  <div class="form-group">
    <label>تاريخ الميلاد</label>
    <input type="date" name="birthdate" required>
  </div>

  <div class="form-group">
    <label>كلمة المرور *</label>
    <input type="password" name="password" placeholder="كلمة المرور" required>
  </div>

  <div class="switch">
    <input type="checkbox" id="insurance" name="insurance">
    <label for="insurance">إضافة التأمين الطبي</label>
  </div>

  <center><button class="submit-btn">اشترك الآن</button></center>
  <hr>
</form>


        <div class="signup-footer">
          مسجل بالفعل في فيزيتا ؟ <a href="#">دخول</a>
          
        </div>
      </div>
    </div>
  </main>

</body>
</html>
<?php
include_once 'footer.php'
?>
