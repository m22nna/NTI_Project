<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>فيزيتا | احجز أفضل دكتور وأطلب أدويتك بسهوله</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/all.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="icon" href="https://cdn-react.vezeeta.com/vezeeta-web-reactjs/jenkins-34/images/favicon-32x32.png" type="image/png" sizes="32x32">
    <link rel="stylesheet" href="css/mine.css"/>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/doctors.css" />
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background-color:rgb(0, 112, 205)">
  <div class="container">



    <!-- Toggle (mobile) -->
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu (right) -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center" st>

        <!-- Country (flag + text) -->
        <!-- Country Dropdown -->
        <li class="nav-item dropdown me-3">
          <a class="nav-link dropdown-toggle d-flex align-items-center text-white" href="#" id="countryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://flagcdn.com/w20/eg.png" alt="مصر" class="me-1">
            <span>مصر</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="countryDropdown">
            <li><a class="dropdown-item d-flex align-items-center" href="#"><img src="https://flagcdn.com/w20/eg.png" class="me-2"> مصر</a></li>
            <li><a class="dropdown-item d-flex align-items-center" href="#"><img src="https://flagcdn.com/w20/sa.png" class="me-2"> السعودية</a></li>
            <li><a class="dropdown-item d-flex align-items-center" href="#"><img src="https://flagcdn.com/w20/ae.png" class="me-2"> الإمارات</a></li>
            <li><a class="dropdown-item d-flex align-items-center" href="#"><img src="https://flagcdn.com/w20/us.png" class="me-2"> USA</a></li>
          </ul>
        </li>


        <!-- Links -->
        <li class="nav-item"><a class="nav-link text-white" href="#" style="border-right : 1px solid white;">English</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#" style="border-right : 1px solid white;">اتصل بنا</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#" style="border-right : 1px solid white;">فيزيتا للأطباء</a></li>
        <?php 
        if (isset($_SESSION['patient'])): 
        ?>
        <li class="nav-item"><a class="nav-link text-white" href="logout.php" style="border-right : 1px solid white;">تسجيل خروج</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="bookings_dashboard.php" style="border-right : 1px solid white;">اداره الحجز</a></li>
        <?php else: ?>  
        <li class="nav-item"><a class="nav-link text-white" href="patientLogin.php" style="border-right : 1px solid white;">دخول</a></li>

        <!-- Button -->
        <li class="nav-item">
          <a class="btn btn-outline-light ms-2" href="patientSignup.php">انضم الآن</a>
        </li>
        <?php endif; ?>

      </ul>
    </div>
        <!-- Logo (left) -->
        <img src="https://cdn-react.vezeeta.com/vezeeta-web-reactjs/jenkins-37/images/whitelogowithdotcom.png" alt="" style="width: 110px;">
  </div>
  </nav>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>


