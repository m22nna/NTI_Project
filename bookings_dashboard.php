<?php
include_once("header.php");
include 'configration.php';

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

// CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $patient_name    = mysqli_real_escape_string($connection, $_POST['patient_name']);
        $doctor_id       = intval($_POST['doctor_id']);
        $clinic_location = mysqli_real_escape_string($connection, $_POST['clinic_location']);
        $date            = mysqli_real_escape_string($connection, $_POST['date']);
        $time            = mysqli_real_escape_string($connection, $_POST['time']);

        $sql = "INSERT INTO booking (patient_name, doctor_id, clinic_location, date, time)
                VALUES ('$patient_name','$doctor_id','$clinic_location','$date','$time')";
        mysqli_query($connection, $sql);
        header("Location: bookings_dashboard.php");
        exit();
    }

    if (isset($_POST['edit'])) {
        $id              = intval($_POST['id']);
        $patient_name    = mysqli_real_escape_string($connection, $_POST['patient_name']);
        $doctor_id       = intval($_POST['doctor_id']);
        $clinic_location = mysqli_real_escape_string($connection, $_POST['clinic_location']);
        $date            = mysqli_real_escape_string($connection, $_POST['date']);
        $time            = mysqli_real_escape_string($connection, $_POST['time']);

        $sql = "UPDATE booking
                SET patient_name='$patient_name',
                    doctor_id=$doctor_id,
                    clinic_location='$clinic_location',
                    date='$date',
                    time='$time'
                WHERE id=$id";
        mysqli_query($connection, $sql);
    }

    if (isset($_POST['delete'])) {
        $id = intval($_POST['id']);
        $sql = "DELETE FROM booking WHERE id=$id";
        mysqli_query($connection, $sql);
    }
}

// البحث
$search = "";
$where = "";
if (!empty($_GET['q'])) {
    $search = mysqli_real_escape_string($connection, $_GET['q']);
    $where = "WHERE b.patient_name LIKE '%$search%' 
              OR d.name LIKE '%$search%' 
              OR d.Specialization LIKE '%$search%'";
}

// الأطباء
$doctors_sql = "SELECT id, name, location, Specialization, img FROM doctors1
                UNION
                SELECT id, name, location, Specialization, img FROM doctors2
                ORDER BY name ASC";
$doctors_result = mysqli_query($connection, $doctors_sql);
$doctors = [];
while ($row = mysqli_fetch_assoc($doctors_result)) {
    $doctors[] = $row;
}

// الحجوزات
$sql = "SELECT b.*, d.name as doctor_name, d.location as doctor_location, 
               d.Specialization as doctor_speciality, d.img as doctor_img
        FROM booking b
        LEFT JOIN (
            SELECT id, name, location, Specialization, img FROM doctors1
            UNION
            SELECT id, name, location, Specialization, img FROM doctors2
        ) d ON b.doctor_id = d.id
        $where
        ORDER BY b.date DESC, b.time DESC";
$result = mysqli_query($connection, $sql);
?>

<div class="dashboard">

    <!-- العنوان -->
    <div class="header">
        <h2>📅 لوحة إدارة الحجوزات</h2>
        <p>إضافة، تعديل، حذف وبحث عن الحجوزات بسهولة</p>
    </div>

    <!-- البحث -->
    <div class="search-box">
        <form method="GET">
            <input type="text" name="q" placeholder="🔍 ابحث باسم المريض أو الدكتور" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">بحث</button>
            <a href="bookings_dashboard.php" class="reset-btn">إلغاء</a>
        </form>
    </div>

    <div class="content">
        <!-- إضافة حجز -->
        <div class="add-box">
            <h3>➕ إضافة حجز جديد</h3>
            <form method="POST">
                <input type="text" name="patient_name" placeholder="اسم المريض" required>
                <select name="doctor_id" required>
                    <option value="">اختر الدكتور</option>
                    <?php foreach ($doctors as $d): ?>
                        <option value="<?php echo $d['id']; ?>">
                            <?php echo $d['name']." - ".$d['Specialization']." - ".$d['location']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="text" name="clinic_location" placeholder="مكان العيادة (اختياري)">
                <input type="date" name="date" required>
                <input type="time" name="time" required>
                <button type="submit" name="add" class="add-btn">إضافة</button>
            </form>
        </div>

        <!-- عرض الحجوزات -->
        <div class="table-box">
            <h3>📋 قائمة الحجوزات</h3>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المريض</th>
                            <th>الدكتور</th>
                            <th>التخصص</th>
                            <th>مكان العيادة</th>
                            <th>التاريخ</th>
                            <th>الوقت</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['patient_name']; ?></td>
                            <td><?php echo $row['doctor_name']; ?></td>
                            <td><?php echo $row['doctor_speciality']; ?></td>
                            <td><?php echo $row['clinic_location'] ?: $row['doctor_location']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td>
                                <form method="POST" style="display:inline-block;">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="edit_request" class="edit-btn">✏️</button>
                                </form>
                                <?php if (isset($_POST['edit_request'])): 
                                    $edit_id = intval($_POST['edit_id']);
                                    $edit_sql = "SELECT * FROM booking WHERE id=$edit_id";
                                    $edit_res = mysqli_query($connection, $edit_sql);
                                    $edit_row = mysqli_fetch_assoc($edit_res);
                                ?>
                                <div class="edit-box">
                                    <h3>✏️ تعديل الحجز</h3>
                                    <form method="POST">
                                        <input type="hidden" name="id" value="<?php echo $edit_row['id']; ?>">
                                        <input type="text" name="patient_name" value="<?php echo $edit_row['patient_name']; ?>" required>
                                        <select name="doctor_id" required>
                                            <?php foreach ($doctors as $d): ?>
                                                <option value="<?php echo $d['id']; ?>" 
                                                    <?php if ($d['id'] == $edit_row['doctor_id']) echo "selected"; ?>>
                                                    <?php echo $d['name']." - ".$d['Specialization']." - ".$d['location']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="text" name="clinic_location" value="<?php echo $edit_row['clinic_location']; ?>">
                                        <input type="date" name="date" value="<?php echo $edit_row['date']; ?>">
                                        <input type="time" name="time" value="<?php echo $edit_row['time']; ?>">
                                        <button type="submit" name="edit" class="edit-btn">حفظ التعديلات</button>
                                    </form>
                                </div>
                                <?php endif; ?>
                                
                                <form method="POST" style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete" class="delete-btn">🗑️</button>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
mysqli_close($connection);
include_once("footer.php");
?>
