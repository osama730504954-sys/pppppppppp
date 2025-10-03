<?php
// عدّل القيم التالية حسب استضافتك
$db_host = 'sql123.infinityfree.com';   // مثال
$db_name = 'epiz_12345678_restaurant'; // مثال
$db_user = 'epiz_12345678';
$db_pass = 'YourDBPassword';

$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
  $pdo = new PDO($dsn, $db_user, $db_pass, $options);
} catch (PDOException $e) {
  // في بيئة الإنتاج استبدل الرسالة بتسجيل في ملف لزيادة الأمان
  die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}
