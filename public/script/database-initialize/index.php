<?php
define('DATABASE_INITIALIZE_SCRIPT_PATH', dirname($_SERVER['DOCUMENT_ROOT']) . '/script/sql/database-initialize.sql');
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-connect.php';

try {
    $databaseConnection->exec(file_get_contents(DATABASE_INITIALIZE_SCRIPT_PATH));
    echo 'Database has been successfully initialized.';
} catch (Exception $e) {
    echo $e->getMessage();
}

require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-disconnect.php';
?>

