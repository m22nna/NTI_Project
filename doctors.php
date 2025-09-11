
<?php   include_once("header.php");?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>صفحة دكتور</title>
  <style>
    body {
      font-family: 'Tahoma', sans-serif;
      background: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 1200px;
      margin: 20px auto;
      display: flex;
      gap: 20px;
    }

    /* العمود الرئيسي */
    .main-content {
      flex: 3;
    }

    /* العمود الجانبي */
    .sidebar {
      flex: 1;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      padding: 0;
      height: fit-content;
    }

    .sidebar h3 {
      background: #0d6efd;
      color: #fff;
      padding: 12px;
      border-radius: 12px 12px 0 0;
      margin: 0;
      font-size: 16px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .filter-group {
      border-bottom: 1px solid #eee;
    }

    .filter-title {
      display: flex;
      align-items: center;
      justify-content: space-between;
      font-size: 15px;
      padding: 12px 15px;
      color: #333;
      cursor: pointer;
      user-select: none;
    }

    .filter-title span.icon {
      margin-left: 6px;
    }

    .filter-title .arrow {
      transition: transform 0.3s;
    }

    .filter-title.active .arrow {
      transform: rotate(90deg);
    }

    .filter-content {
      display: none;
      padding: 0 15px 10px 15px;
    }

    .filter-content label {
      display: block;
      font-size: 14px;
      color: #555;
      margin-bottom: 6px;
      cursor: pointer;
    }

    .filter-content input {
      margin-left: 6px;
    }

    /* كارت الدكتور */
    .doctor-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      padding: 20px;
      display: flex;
      align-items: flex-start;
      margin-bottom: 20px;
    }

    .doctor-card img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      margin-left: 20px;
      border: 3px solid #eee;
    }

    .doctor-info {
      flex: 1;
    }

    .doctor-info h2 {
      margin: 0;
      font-size: 20px;
      color: #333;
    }

    .doctor-info p {
      margin: 5px 0;
      color: #555;
    }

    .rating {
      color: #FFD700;
      font-size: 18px;
    }

    .tags {
      margin: 10px 0;
      font-size: 14px;
      color: #666;
    }

    .details {
      font-size: 14px;
      color: #444;
      margin-bottom: 10px;
    }

    .price {
      font-weight: bold;
      color: #0d6efd;
      margin-top: 8px;
    }

    /* جدول المواعيد */
    .schedule {
      display: flex;
      gap: 10px;
      margin-top: 15px;
    }

    .schedule .day {
      flex: 1;
      background: #e9f2ff;
      padding: 10px;
      text-align: center;
      border-radius: 8px;
      font-size: 14px;
    }

    .day h4 {
      margin: 5px 0;
      color: #0d6efd;
    }

    .reserve-btn {
      background: #dc3545;
      color: #fff;
      padding: 6px 12px;
      border-radius: 6px;
      text-decoration: none;
      display: inline-block;
      margin-top: 8px;
      font-size: 14px;
    }

    .reserve-btn:hover {
      background: #b52a37;
    }
  </style>
</head>
<body>

  <div class="container">
    
    <!-- العمود الرئيسي -->
    <div class="main-content">

      <!-- كارت الدكتور -->
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
