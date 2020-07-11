<?php
$pageTitle = 'Chi tiết thành viên';
$memberInfoQuery = "SELECT * FROM member WHERE id = ";
$memberInfo = [];
$errorText = '';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/header.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-connect.php';

if (ctype_digit($_GET['id'])) {
  try {
    $memberInfo = $databaseConnection->query($memberInfoQuery . $_GET['id'])->fetch();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

if (empty($memberInfo) || !$memberInfo) {
  $errorText .= 'Không tồn tại thành viên với ID = ' . $_GET['id'];
}

?>

<section class="w3-section w3-card">
  <header class="w3-container w3-<?php echo PRIMARY_COLOR; ?>">
    <h1><i class="material-icons">person</i> <?php echo $pageTitle; ?></h1>
  </header>

  <div class="w3-container w3-padding">
    <p class="w3-text-red"><?php echo $errorText; ?></p>
    <div>
      <ul class="w3-ul w3-hoverable">
        <li><span class="info-column-name">ID</span>: <?php echo $memberInfo['id']; ?></li>
        <li><span class="info-column-name">Họ và Tên</span>: <?php echo $memberInfo['full_name']; ?></li>
        <li><span class="info-column-name">Ngày tháng năm sinh</span>:
        <time datetime="<?php echo $memberInfo['birth_date']; ?>"><?php echo $memberInfo['birth_date']; ?></time></li>
        <li><span class="info-column-name">Giới tính</span>:
        <?php
          switch ($memberInfo['gender']) {
            case 'm':
              echo 'Nam';
              break;
            case 'f':
              echo 'Nữ';
              break;
            default:
              echo '';
              break;
          }
          ?></li>
          <li><span class="info-column-name">Số Căn cước công dân</span>: <?php echo $memberInfo['national_id']; ?></li>
          <li><span class="info-column-name">Đia chỉ Email</span>: <?php echo $memberInfo['email_address']; ?></li>
          <li><span class="info-column-name">Số điện thoại</span>: <?php echo $memberInfo['phone_number']; ?></li>
          <li><span class="info-column-name">Ngày tham gia</span>:
          <time datetime="<?php echo $memberInfo['join_date']; ?>"><?php echo $memberInfo['join_date']; ?></time></li>
          <li><span class="info-column-name">Ghi chú</span>: <?php echo $memberInfo['note']; ?></li>
      </ul>
    </div>
  </div>
</section>


<?php
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-disconnect.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/footer.php';
?>
