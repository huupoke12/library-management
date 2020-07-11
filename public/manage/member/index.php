<?php
$pageTitle = 'Quản lý thành viên';
$urlPart = explode('/', $_SERVER['REQUEST_URI']);
$prefixUrl = $urlPart[1] . '/' . $urlPart[2];
$memberTableQuery = "SELECT id, national_id, full_name, birth_date, gender FROM member";
$memberTableData = [];

require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/header.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-connect.php';

try {
  $memberTableData = $databaseConnection->query($memberTableQuery)->fetchAll();
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>

<section class="w3-section w3-card">

  <header class="w3-container w3-<?php echo PRIMARY_COLOR; ?>">
    <h1><i class="material-icons">people</i> <?php echo $pageTitle; ?></h1>
  </header>

  <div class="w3-container w3-padding">
    <a class="w3-btn w3-blue" href="/<?php echo $prefixUrl; ?>/add">
    <i class="material-icons">person_add</i> Thêm thành viên mới</a>
    <hr>
    <table class="w3-table-all w3-hoverable">
      <caption>Danh sách thành viên</caption>
        <thead>
          <tr class="w3-<?php echo PRIMARY_COLOR; ?>">
            <th>ID</th>
            <th>Họ và Tên</th>
            <th>Ngày tháng năm sinh</th>
            <th>Giới tính</th>
            <th>Số CCCD</th>
            <th>Các thông tin khác</th>
          </tr>
        </thead>
        <tbody>
<?php
foreach ($memberTableData as $memberData) {
  echo '<tr>';
  echo '<td class="primary-key">' . $memberData['id'] . '</td>';
  echo '<td>' . $memberData['full_name'] . '</td>';
  echo '<td><time datetime="' . $memberData['birth_date'] .'">' . $memberData['birth_date'] . '</time></td>';
  echo '<td>';
  switch ($memberData['gender']) {
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
  echo '</td>';
  echo '<td>' . $memberData['national_id'] . '</td>';
  echo '<td><a class="w3-btn w3-blue" href="/' . $prefixUrl . '/view?id=' . $memberData['id'] . '">';
  echo '<i class="material-icons">visibility</i> Xem chi tiết</a></td>';
  echo '</tr>';
}
?>
        </tbody>
        <tfoot>
          <tr class="w3-<?php echo PRIMARY_COLOR; ?>">
            <td colspan="5">Tổng số thành viên</td>
            <td><?php echo count($memberTableData); ?></td>
          </tr>
        </tfoot>
    </table>
  </div>
</section>


<?php
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-disconnect.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/footer.php';
?>
