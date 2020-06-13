<?php
$primaryColor = 'teal';
?>

<!DOCTYPE html>
<html lang="vi-VN">
  <head>
    <title><?php echo isset($pageTitle) ? $pageTitle : ''; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >
    <!-- Additional tags here -->
    <?php
    if (function_exists('customPageHeader')){
      customPageHeader();
    }
    ?>

  </head>

  <body>
    <nav class="w3-bar w3-<?php echo $primaryColor; ?>">
      <a href="/" class="w3-bar-item w3-button" title="Trang chủ"><i class="material-icons">home</i> Trang chủ</a>
      <a href="/admin/setup-database.php" class="w3-bar-item w3-button" title="Cài đặt cơ sở dữ liệu"><i class="material-icons">settings</i> Cài đặt cơ sở dữ liệu</a>
    </nav>

    <div class="w3-container">