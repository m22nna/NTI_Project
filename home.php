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
                    <a href="doctors.php">أظهر المزيد</a>
                </div>
            </div>
            <div class="scroll-container">
                <?php $specialties = [
                    "كل التخصصات",
                    "اسنان",
                    "جهاز هضمي ومناظير",
                    "نساء وتوليد",
                    "جلدية",
                    "جراحة عامة",
                    "عظام",
                    "جراحة تجميل",
                    "نفسي",
                    "مسالك بولية",
                    "جراحة اطفال",
                    "جراحة اوعية دموية",
                    "انف واذن وحنجرة",
                    "روماتيزم",
                    "تخسيس وتغذية",
                    "باطنة",
                    "علاج طبيعي واصابات ملاعب",
                    "جراحة مخ واعصاب",
                    "ذكورة وعقم",
                    "كلى",
                    "مخ واعصاب"
                ];
                foreach ($specialties as $value): ?>
                    <span class="specialty"><?php echo $value ?></span>
                <?php endforeach; ?>
            </div>
            <!-- db-->
             <?php
              include'configration.php';
              $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
              $query = "SELECT * FROM doctors1";
              $result = mysqli_query($connection, $query);
             ?>
            <!-- db-->

            <div class="up">
               <?php while ($row = mysqli_fetch_assoc($result)): ?>
               <div class="doctor">
                <div class="img">
                <img src="<?php echo $row['img'];?>"/>
                </div>
                <h6><?php echo $row['name'];?></h6>
                <h7><?php echo $row['Specialization'];?></h7><br>
                <h7><?php echo $row['location'];?></h7>
               </div>
               <?php endwhile ; 
               mysqli_close($connection);
               ?>
            </div>
             <!-- db-->
             <?php
              $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
              $query = "SELECT * FROM doctors2";
              $result = mysqli_query($connection, $query);
             ?>
            <!-- db-->
            <div class="down">
               <?php while ($row = mysqli_fetch_assoc($result)): ?>
               <div class="doctor">
                <div class="img">
                <img src="<?php echo $row['img'];?>"/>
                </div>
                <h6><?php echo $row['name'];?></h6>
                <h7><?php echo $row['Specialization'];?></h7><br>
                <h7><?php echo $row['location'];?></h7>
               </div>
               <?php endwhile ; 
               mysqli_close($connection);
               ?>
            </div>
            </div>
        </div>


    <!--end the best doctors-->

    <!-- start for centers -->
    <div class="center">
        <div class="contain">
            <div class="text">
                <div class="right">
                    <h2>المراكز الأكثر اختيارا</h2>
                    </h2>
                </div>
                <div class="left">
                    <a href="#">أظهر المزيد</a>
                </div>
            </div>
            <div class="centers">
                <?php 
                $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
                $query = "SELECT * FROM centers";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="item">
                        <img src="<?php echo $row['image'] ?>" />
                        <div class="details">
                            <div class="right">
                                <img src="<?php echo $row['logo'] ?>" />
                            </div>
                            <div class="left">
                                <h6><?php echo $row['center'] ?></h6>
                                <h7><?php echo $row['number'] ?></h7>
                                <h7><?php echo $row['location'] ?></h7>
                            </div>
                        </div>
                    </div>
                <?php endwhile; 
                mysqli_close($connection);
                ?>
            </div>
        </div>
    </div>

    <!-- end for centers -->
    <!-- start nurth -->
    <div class="nurth">
        <div class="contain">
            <div class="right">
                <img src="photos/noprofile.jpg" />
                <div class="right2">
                    <img class="img" src="https://cdn-react.vezeeta.com/vezeeta-web-reactjs/jenkins-35/images/mental-health-logo.svg"><br>
                    <h3>عيشها براحة مع نورث.</h3>
                </div>
            </div>
            <div class="left">
                <a href="#">اكتشف نورث</a>
            </div>
        </div>
    </div>

    <!-- end nurth -->
    <!-- start ask-box -->
    <div class="askbox">
        <div class="contain">
            <h3>لديك سؤال طبي؟</h3>
            <p>ارسل سؤالك الطبي واحصل على اجابة من دكتور متخصص</p>
            <button>اسأل الآن</button>
        </div>
    </div>
    <!-- end ask-box -->
    <!-- start pharmacy-box -->

    <div class="card-box pharmacybox">
        <div class="contain">
            <div class="text">
                <h3>صيدلية</h3>
                <p>اطلب ادويتك وكل اللي تحتاجه من الصيدلية.</p>
                <button>اطلب الآن</button>
            </div>
        </div>
    </div>
</div>
<!-- end pharmacy-box -->
<!-- start two boxes -->
<div class="twoboxes">
    <div class="contain">
        <div class="right">
            <img src="https://cdn-react.vezeeta.com/vezeeta-web-reactjs/jenkins-37/images/telehealth-solution-card/desktop.webp" />
            <div class="text">
                <h2>مكالمة دكتور</h2>
                <h5>للمتابعة عبر مكالمة صوتية أو فيديو</h5>
                <a href="">احجز الآن</a>
            </div>
        </div>
        <div class="left">
            <img src="https://cdn-react.vezeeta.com/vezeeta-web-reactjs/jenkins-37/images/homevisits-solution-card/eg/desktop.webp" />
            <div class="text">
                <h2>زيارة منزلية</h2>
                <h5>اختار التخصص أو الدكتور هيجيلك البيت</h5>
                <a href="">احجز زيارة</a>
            </div>
        </div>
    </div>
</div>
<!-- end two boxes -->
<!-- start end-part -->
<div class="details">
    <div class="contain">
        <div class="detail">
            <i class="fa-solid fa-hands-holding-circle"></i>
            <h2>كل احتياجاتك على فيزيتا</h2>
            <h5>ابحث و احجز كشف مع دكتور في عيادة، مستشفى، زيارة منزلية، 
            أو عبر مكالمة. ممكن كمان تطلب أدوية، أو تحجز خدمة أو عملية بأحسن سعر.</h5>
        </div>
        <div class="detail">
             <i class="fa-solid fa-user-doctor"></i>
             <h2>تقييمات حقيقية من المرضى</h2>
             <h5>تقييمات الدكاترة من مرضى حجزوا على فيزيتا و زاروا الدكتور بالفعل.</h5>
        </div>
        <div class="detail">
            <i class="fa-solid fa-calendar-check"></i>
             <h2>حجزك مؤكد مع الدكتور</h2>
             <h5>حجزك مؤكد بمجرد اختيارك من المواعيد المتاحة للدكتور.</h5>
        </div>
        <div class="detail">
            <i class="fa-solid fa-shield"></i>
             <h2>احجز مجاناً، و ادفع في العيادة</h2>
             <h5>سعر الكشف على فيزيتا نفس سعر الكشف في العيادة، بدون أي مصاريف إضافية.</h5>
        </div>
    </div>
</div>

<div class="download">
    <div class="contain">
        <div class="right">
          <h2>حمّل تطبيق فيزيتا</h2>
          <h5>ابحث ، قارن واحجز استشارات طبية بسهولة مع اكبر شبكة دكاترة فى مصر اطلب
             أدويتك وهتوصلك خلال 60 دقيقة تتبع خطواتك اليومية واكسب النقاط عند تحقيق الهدف اليومي.</h5>
           <div class="link">                     
            <a href="#">App Galary</a>
             <a href="#"><i class="fa-brands fa-apple"></i>App Store</a>
             <a href="#"><i class="fa-brands fa-google-play"></i>Google Play</a>
           </div>
        </div>
        <div class="left">
            <img src="https://cdn-react.vezeeta.com/vezeeta-web-reactjs/jenkins-37/images/dowanloadApp-eg-ar.webp"/>
        </div>
    </div>
</div>
<div class="choose">
    <div class="contain">
        <div class="right">
           <h3>اختار التخصص واحجز كشف دكتور</h3>
           <div class="doctors">
            <?php 
            $doctors=["جلدية","أسنان","نفسي","أطفال وحديثي الولادة","مخ وأعصاب","عظام","نساء وتوليد","أنف وأذن وحنجرة","قلب"];
            foreach($doctors as $doctor){
            echo "<a href='#'>$doctor</a>";
            }
            echo "<a href='#'>عرض المزيد ...</a>";
            ?>
           </div>
        </div>
        <div class="left">
            <h3>اختار المحافظة واحجز كشف دكتور</h3>
            <div class="cities">
            <?php
            $cities=["القاهرة","الجيزة","الاسكندرية","الساحل الشمالي","القليوبية","الغربية","المنوفية","الفيوم","الدقهلية"];
             foreach($cities as $city){
            echo "<a href='#'>$city</a>";
            }
            echo "<a href='#'>عرض المزيد ...</a>";
            ?>
            </div>
        </div>
    </div>
</div>
    </div>
<!-- end end-part -->
<script>
function showTab(tabName, elmnt) {
  // اخفاء كل التابات
  var tabcontent = document.getElementsByClassName("tab-content");
  for (var i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // إزالة الـ active من كل الأزرار
  var tablinks = document.getElementsByClassName("tab");
  for (var i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("active");
  }

  // إظهار التاب المطلوب
  document.getElementById(tabName).style.display = "block";

  // إضافة كلاس active للزر المضغوط
  elmnt.classList.add("active");
}
</script>
<?php

include_once("footer.php");
?>

