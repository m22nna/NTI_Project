<?php
include_once("header.php");
//start search page
?>
<div class="home">
    <div class="top-gradient"></div>
    <div class="start">
        <div class="container">
            <h1>رعاية صحية لحياة أفضل ليك</h1>
            <span>احجز أونلاين أو كلم <i class="fa-solid fa-phone-flip" style="color:red"></i> ١٦٦٧٦</span>

            <!--start search par -->
            <div class="search-bar">
                <div class="tabs">
                    <button class="tab active" onclick="showTab('reserve', this)">احجز دكتور</button>
                    <button class="tab" onclick="showTab('call', this)">مكالمة دكتور</button>
                </div>

                <!-- تبويب احجز دكتور -->
                <form method="POST">
                    <div id="reserve" class="tab-content">
                        <select name="التخصص">
                            <option>اختر التخصص</option>
                            <option>قلب</option>
                            <option>باطنة</option>
                            <option>أسنان</option>
                        </select>

                        <select name="المحافظة">
                            <option>اختر المحافظة</option>
                            <option>القاهرة</option>
                            <option>الجيزة</option>
                        </select>

                        <select name="المنطقة">
                            <option>اختر المنطقة</option>
                            <option>مدينة نصر</option>
                            <option>المهندسين</option>
                        </select>

                        <input name="name" type="text" placeholder="الدكتور او المستشفى">
                        <button class="search-btn">ابحث</button>
                    </div>
                </form>

                <!-- تبويب مكالمة دكتور -->
                <form method="POST">
                    <div id="call" class="tab-content" style="display:none;padding-right:442px">
                        <select name="التخصص">
                            <option>اختر التخصص</option>
                            <option>قلب</option>
                            <option>باطنة</option>
                            <option>أسنان</option>
                        </select>
                        <button class="search-btn">ابحث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--end search page-->
    <!--start shamel bar-->
    <div class="contain">
        <div class="bar">
            <div class="right">
                <a href="#">
                    <img src="photos/shamel.jpg" />
                    <h2>وفر حتى 80 % على جميع الخدمات الطبية </h2>
                </a>
            </div>
            <div class="left">
                <a href="#">انظر التفاصيل</a>
            </div>
        </div>
    </div>
    <!--end shamel bar-->
    <!--start the best doctors-->
    <div class="contain">
        <div class="doctors">
        <div class="text">
            <div class="right">
                <h2>الأطباء الأكثر اختيارا</h2>
            </div>
            <div class="left">
                <a href="#">أظهر المزيد</a>
            </div>
        </div>
        <div class="scroll-container" id="scroll">
            <?php $specialties = [
                "كل التخصصات","اسنان","جهاز هضمي ومناظير","نساء وتوليد","جلدية","جراحة عامة",
                "عظام","جراحة تجميل","نفسي","مسالك بولية","جراحة اطفال","جراحة اوعية دموية",
                "انف واذن وحنجرة","روماتيزم","تخسيس وتغذية","باطنة","علاج طبيعي واصابات ملاعب",
                "جراحة مخ واعصاب","ذكورة وعقم","كلى","مخ واعصاب"                  
            ];
            foreach($specialties as $value): ?>
            <span class="specialty"><?php echo $value ?></span>
            <?php endforeach; ?>
        </div>
        </div>
    </div>

<!--end the best doctors-->

<!-- start for centers -->
<div class="centers">
    <div class="contain">
        <div class="right">
         <h2>المراكز الأكثر اختيارا</h2>
         </h2>
        </div>
        <div class="left">
         <a href="#">أظهر المزيد</a>
        </div>
    </div>
</div>
</div>
<!-- end for centers -->

<script>
    function showTab(tabId, btn) {
        // اخفاء كل المحتويات
        document.querySelectorAll('.tab-content').forEach(c => c.style.display = 'none');

        // اظهار التاب المطلوب
        document.getElementById(tabId).style.display = 'block';

        // ازالة active من كل الازرار
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));

        // اضافة active للزرار اللي اتضغط
        btn.classList.add('active');
    }
</script>



<?php

include_once("footer.php");
?>
