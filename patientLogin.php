<?php
include 'header.php';
include 'configration.php';
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($_POST) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "SELECT * FROM patient WHERE (email = '$email' OR number = '$email') AND password = '$password' LIMIT 1";
  $reslt = mysqli_query($connection, $query);

  if (mysqli_num_rows($reslt) > 0) {
    $row = mysqli_fetch_assoc($reslt);
    $_SESSION['patient'] = $row;
    header("Location: home.php");
    exit();
  } else {
    echo "<script>alert('Invalid email or password. Please try again.')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول</title>
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
    .login-box {
      background: #fff;
      width: 380px;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .login-header {
      background: #0069d9;
        color: #fff;
        text-align: center;
        padding: -10px;
        font-size: 13px;
        font-weight: bold;
        height: 25px;
    }
    .login-body {
      padding: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      font-size: 13px;
      margin-bottom: 5px;
      color: #333;
    }
    .form-group input {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 13px;
    }
    .submit-btn {
      background: #e60000;
      color: #fff;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
      margin-top: 10px;
    }
    .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 12px;
      margin: 10px 0;
    }
    .options a {
      color: #0069d9;
      text-decoration: none;
    }
    .divider {
      text-align: center;
      margin: 15px 0;
      position: relative;
      color: #888;
      font-size: 12px;
    }
    .divider::before, .divider::after {
      content: "";
      position: absolute;
      top: 50%;
      width: 40%;
      height: 1px;
      background: #ccc;
    }
    .divider::before { right: 0; }
    .divider::after { left: 0; }
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
    .login-footer {
      text-align: center;
      font-size: 12px;
      margin-top: 10px;
    }
    .login-footer a {
      color: #e60000;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <main>
    <div class="login-box">
      <div class="login-header">دخول</div>
      <div class="login-body">
        <form method="POST">
          <div class="form-group">
            <label>الموبايل او البريد الالكتروني <span style="color:red">*</span></label>
            <input type="text" name="email" required>
          </div>
          <div class="form-group">
            <label>كلمة المرور <span style="color:red">*</span></label>
            <input type="password" name="password" required>
          </div>
          <button type="submit" class="submit-btn">دخول</button>
          <div class="options">
            <div>
              <input type="checkbox" id="remember">
              <label for="remember">تذكرني</label>
            </div>
            <a href="#">نسيت كلمة المرور؟</a>
          </div>
        </form>
        <div class="divider">أو</div>
        <button class="fb-btn">فعل حسابك مع فيسبوك</button>
        <div class="login-footer">
          مستخدم جديد ؟ <a href="#">انضم الآن</a>
        </div>
      </div>
    </div>
  </main>
</body>
</html>


<?php
include 'footer.php';

?>