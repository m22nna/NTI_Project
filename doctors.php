
<?php   
include_once("header.php");
include 'configration.php';

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

// استعلام لجلب كل الأطباء
$sql = "SELECT * FROM doctors";
$result = mysqli_query($connection, $sql);
if (!$result) {
    die("خطأ في الاستعلام: " . mysqli_error($connection));
}
?> 

<div class="container">
  <!-- العمود الرئيسي -->
  <div class="main-content">

    <?php
    if ($result->num_rows > 0) {
        while ($doctor = $result->fetch_assoc()) {
            ?>
            <!-- كارت الدكتور -->
            <div class="doctor-card">
              <img src="<?php echo !empty($doctor['image_url']) ? $doctor['image_url'] : 'https://via.placeholder.com/120'; ?>" alt="Doctor Image" />
              <div class="doctor-info">
                <h2><?php echo $doctor['name']; ?></h2>
                <p><?php echo $doctor['speciality']; ?> <? echo $doctor ['degree']; ?></p>
                <div class="rating">★★★★★</div>
                <p class="tags"><?php echo $doctor['description']; ?></p>
                <p class="details">العنوان: <?php echo !empty($doctor['address']) ? $doctor['address'] : "لم يتم إضافته"; ?></p>
                <p class="price">الكشف: <?php echo !empty($doctor['price']) ? $doctor['price']." جنيه" : "لم يتم تحديده"; ?></p>

                <div class="schedule">
                  <div class="day">
                    <h4>اليوم</h4>
                    <p>من 5:00 م</p>
                    <p>حتى 10:00 م</p>
                    <form method="POST" action="bookings_dashboard.php" style="display:inline;">
                    <input type="hidden" name="doctor_id" value="<?php echo $doctor['id']; ?>">
                    <input type="hidden" name="patient_name" value="<?php echo $_SESSION['patient_name'] ?? 'مريض مجهول'; ?>">
                    <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                    <input type="hidden" name="time" value="<?php echo date('H:i'); ?>">
                    <button type="submit" name="add" class="reserve-btn">حجز</button>
                  </form>
                  </div>
                  <div class="day">
                    <h4>غداً</h4>
                    <p>من 5:00 م</p>
                    <p>حتى 10:00 م</p>
                    <form method="POST" action="bookings_dashboard.php" style="display:inline;">
                    <input type="hidden" name="doctor_id" value="<?php echo $doctor['id']; ?>">
                    <input type="hidden" name="patient_name" value="<?php echo $_SESSION['patient_name'] ?? 'مريض مجهول'; ?>">
                    <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                    <input type="hidden" name="time" value="<?php echo date('H:i'); ?>">
                    <button type="submit" name="add" class="reserve-btn">حجز</button>
                  </form>
                  </div>
                  <div class="day">
                    <h4>الثلاثاء</h4>
                    <p>من 7:30 م</p>
                    <p>حتى 10:00 م</p>
                    <form method="POST" action="bookings_dashboard.php" style="display:inline;">
                    <input type="hidden" name="doctor_id" value="<?php echo $doctor['id']; ?>">
                    <input type="hidden" name="patient_name" value="<?php echo $_SESSION['patient_name'] ?? 'مريض مجهول'; ?>">
                    <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
                    <input type="hidden" name="time" value="<?php echo date('H:i'); ?>">
                    <button type="submit" name="add" class="reserve-btn">حجز</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <?php
        }
    } else {
        echo "<p>لا يوجد أطباء مسجلين.</p>";
    }
    mysqli_close($connection);
    ?>
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
    </div>

    <div class="filter-group">
      <div class="filter-title">🏷️ <span>طرق الدفع</span> <span class="arrow">▶</span></div>
      <div class="filter-content">
        <label><input type="checkbox"> يقبل الدفع الالكترونى</label>
      </div>
    </div>

    <div class="filter-group">
      <div class="filter-title"><span>المنشاه</span> <span class="arrow">▶</span></div>
      <div class="filter-content">
        <label><input type="checkbox"> مستشفى </label>
        <label><input type="checkbox"> عياده</label>
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

<?php  
include_once("questions.php");
include_once("footer.php");
?>
