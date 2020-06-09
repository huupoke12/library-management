<!DOCTYPE html>
<html lang="vi-VN">
<title>Hệ thống quản lý thư viện</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <p>Xin chào tới hệ thống quản lý thư viện</p>
  <p>Bây giờ là: 
    <?php
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    echo "<strong>" . date("H:i:s") . "</strong> ngày <strong>" . date("d/m/Y") . "</strong> (UTC+7)";
    $day_percent = (date("H") * 3600 + date("i") * 60 + date("s")) / 86400.0 * 100;
    ?>
  </p>
  <div class="w3-light-grey w3-round">
    <div class="w3-container w3-round w3-blue w3-center" style="height: 24px; width: <?php echo $day_percent; ?>%"></div>
  </div>
  <p><strong><?php echo $day_percent; ?>%</strong> của ngày hôm nay đã trôi qua</p>
</div>

</body>
</html>