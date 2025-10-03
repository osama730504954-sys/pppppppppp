<?php
include 'config.php';

// استلام بيانات POST
$name   = trim($_POST['name'] ?? '');
$phone  = trim($_POST['phone'] ?? '');
$guests = (int)($_POST['guests'] ?? 1);
$date   = $_POST['date'] ?? '';
$time   = $_POST['time'] ?? '';
$notes  = trim($_POST['notes'] ?? '');

// تحقق بسيط (يمكن تطويره)
if (!$name || !$phone || !$date || !$time) {
    die("الرجاء ملء الحقول المطلوبة.");
}

// جهّز الاستعلام المحضّر
$stmt = $pdo->prepare("INSERT INTO reservations (name, phone, guests, date_booking, time_booking, notes)
                       VALUES (:name, :phone, :guests, :date_booking, :time_booking, :notes)");
$stmt->execute([
    ':name' => $name,
    ':phone' => $phone,
    ':guests' => $guests,
    ':date_booking' => $date,
    ':time_booking' => $time,
    ':notes' => $notes
]);

// إعادة توجيه لصفحة نجاح أو إظهار رسالة
header("Location: contact.html?sent=1");
exit;
