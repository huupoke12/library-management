<?php
define('DATABASE_CONFIG_FILE_PATH', dirname($_SERVER['DOCUMENT_ROOT']) . '/config/database.json');
$databaseConnection = null;

try {
    $databaseConfig = json_decode(file_get_contents(DATABASE_CONFIG_FILE_PATH));

    $databaseConnection = new PDO("mysql:host=$databaseConfig->hostname;dbname=$databaseConfig->database_name", $databaseConfig->username, $databaseConfig->password);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
