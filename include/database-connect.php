<?php
$databaseConnection = null;

try {
    $databaseConfig = json_decode(file_get_contents(DATABASE_CONFIG_FILE_PATH));

    $databaseConnection = new PDO("mysql:host=$databaseConfig->hostname;dbname=$databaseConfig->database_name", $databaseConfig->username, $databaseConfig->password);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
    echo '<p class="w3-text-red w3-large"><strong>Đã có lỗi xảy ra. Hãy kiểm tra cài đặt cơ sở dữ liệu.</strong></p>';
}
?>
