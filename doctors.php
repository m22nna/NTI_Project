
<?php   include_once("header.php");?>
<?php 
// الاتصال بقاعدة البيانات
$servername = "localhost"; 
$username = "root"; 
$password = ""; // الافتراضي فاضي في XAMPP
$dbname = "hospital"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استعلام لجلب كل الأطباء
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);

if (!$result) {
    die("خطأ في الاستعلام: " . $conn->error);
}
?> 
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="doctors.css">
  <title>صفحة دكتور</title>
  
</head>
<body>

  <!--<div class="container">
    
    
    <div class="main-content">

      
      <div class="doctor-card">
        <img src="https://via.placeholder.com/120" alt="Doctor Image">
        <div class="doctor-info">
          <h2>دكتور موريس فكري</h2>
          <p>استشاري جراحة التجميل - جامعة القاهرة</p>
          <div class="rating">★★★★★</div>
          <p class="tags">جراحة التجميل، الليزر، الحروق</p>
          <p class="details">العنوان: المهندسين - شارع البطل أحمد عبدالعزيز</p>
          <p class="price">الكشف: 600 جنيه</p>

          <div class="schedule">
            <div class="day">
              <h4>اليوم</h4>
              <p>من 5:00 م</p>
              <p>حتى 10:00 م</p>
              <a href="#" class="reserve-btn">حجز</a>
            </div>
            <div class="day">
              <h4>غداً</h4>
              <p>من 5:00 م</p>
              <p>حتى 10:00 م</p>
              <a href="#" class="reserve-btn">حجز</a>
            </div>
            <div class="day">
              <h4>الثلاثاء</h4>
              <p>من 7:30 م</p>
              <p>حتى 10:00 م</p>
              <a href="#" class="reserve-btn">حجز</a>
            </div>
          </div>
        </div>
      </div>

    </div> -->
    <!-- العمود الرئيسي -->
     <div class="doctor-page">
<div class="main-content">

  <?php
  if ($result->num_rows > 0) {
      while ($doctor = $result->fetch_assoc()) {
          ?>
          <!-- كارت الدكتور -->
          <div class="doctor-card">
            <img src="<?php echo $doctor['image_url']; ?>" alt="Doctor Image">
            <div class="doctor-info">
              <h2><?php echo $doctor['name']; ?></h2>
              <p><?php echo $doctor['speciality']; ?></p>
              <div class="rating">★★★★★</div>
              <p class="tags"><?php echo $doctor['description']; ?></p>
              <p class="details">العنوان: لم يتم إضافته</p>
              <p class="price">الكشف: لم يتم تحديده</p>

              <div class="schedule">
                <div class="day">
                  <h4>اليوم</h4>
                  <p>من 5:00 م</p>
                  <p>حتى 10:00 م</p>
                  <a href="#" class="reserve-btn">حجز</a>
                </div>
                <div class="day">
                  <h4>غداً</h4>
                  <p>من 5:00 م</p>
                  <p>حتى 10:00 م</p>
                  <a href="#" class="reserve-btn">حجز</a>
                </div>
                <div class="day">
                  <h4>الثلاثاء</h4>
                  <p>من 7:30 م</p>
                  <p>حتى 10:00 م</p>
                  <a href="#" class="reserve-btn">حجز</a>
                </div>
              </div>
            </div>
          </div>
          <?php
      }
  } else {
      echo "<p>لا يوجد أطباء مسجلين.</p>";
  }
  $conn->close();?>

</div>

    <!-- العمود الجانبي -->

    <div class="sidebar">
      <h3>حدد بحثك 🔍</h3>

      <div class="filter-group">
        <div class="filter-title">🎓 <span>اللقب</span> <span class="arrow">▶</span></div>
        <div class="filter-content">
          <label><input type="checkbox"> أستاذ</label>
          <label><input type="checkbox"> مدرس</label>
          <label><input type="checkbox"> استشاري</label>
          <label><input type="checkbox"> أخصائي</label>
        </div>
      </div>

      <div class="filter-group">
        <div class="filter-title">⚥ <span>النوع</span> <span class="arrow">▶</span></div>
        <div class="filter-content">
          <label><input type="checkbox"> دكتورة</label>
          <label><input type="checkbox"> دكتور</label>
        </div>
      </div>

      <div class="filter-group">
        <div class="filter-title">📅 <span>المواعيد المتاحة</span> <span class="arrow">▶</span></div>
        <div class="filter-content">
          <label><input type="checkbox"> أي يوم</label>
          <label><input type="checkbox"> اليوم</label>
          <label><input type="checkbox"> غداً</label>
        </div>
      </div>

      <div class="filter-group">
        <div class="filter-title">🏷️ <span>أكواد الخصم</span> <span class="arrow">▶</span></div>
        <div class="filter-content">
          <label><input type="checkbox"> يقبل أكواد الخصم</label>
        </div>
      </div>

      <div class="filter-group">
        <div class="filter-title">💰 <span>سعر الكشف</span> <span class="arrow">▶</span></div>
        <div class="filter-content">
          <label><input type="checkbox"> أقل من 200</label>
          <label><input type="checkbox"> 200 - 500</label>
          <label><input type="checkbox"> أكثر من 500</label>
        </div>
        <div class="filter-group">
          <div class="filter-title">🏷️ <span>طرق الدفع</span> <span class="arrow">▶</span> </div>
          <label><input type="checkbox"> يقبل الدفع الالكترونى</label>
        </div>
        <div class ="filter-group">
          <div class="filter-title"><span>المنشاه</span> <span class="arrow">▶</span></div>
          <label><input type="checkbox"> مستشفى </label>
          <label><input type="checkbox"> عياده</label>
        </div>
      </div>
    </div>

  </div>
</div>
  <script>
    // كود فتح/غلق الفلاتر
    document.querySelectorAll('.filter-title').forEach(title => {
      title.addEventListener('click', () => {
        const content = title.nextElementSibling;
        title.classList.toggle('active');
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    });
  </script>

</body>
</html>
<?php  include_once("questions.php");?>
<?php  include_once("footer.php");?>
