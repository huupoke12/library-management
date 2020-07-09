<?php
define('PRIMARY_COLOR', 'teal');
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/environment-config.php';
?>

<!DOCTYPE html>
<html lang="vi">
  <head>
    <title><?php echo isset($pageTitle) ? $pageTitle : ''; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/style/custom.css">
    <?php
    if (function_exists('customPageHeader')){
      customPageHeader();
    }
    ?>

  </head>

  <body>
    <header>
      <nav class="w3-bar w3-large w3-<?php echo PRIMARY_COLOR; ?>">
        <a href="/" class="w3-bar-item w3-button" title="Trang chủ"><i class="material-icons">home</i> Trang chủ</a>
      </nav>
    </header>

    <main class="w3-container">
