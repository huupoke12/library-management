<?php
define('ENVIRONMENT_CONFIG_FILE_PATH', dirname($_SERVER['DOCUMENT_ROOT']) . '/config/environment.json');

try {
    $environmentConfig = json_decode(file_get_contents(ENVIRONMENT_CONFIG_FILE_PATH));
    date_default_timezone_set($environmentConfig->timezone);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
