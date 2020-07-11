<?php
$pageTitle = 'Quản lý thành viên';
$urlPart = explode('/', $_SERVER['REQUEST_URI']);
$prefixUrl = $urlPart[1] . '/' . $urlPart[2];
$memberTableQuery = "SELECT id, national_id, full_name, birth_date, gender FROM member";
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/header.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-connect.php';


?>

<section class="w3-section w3-card">

  <header class="w3-container w3-<?php echo PRIMARY_COLOR; ?>">
    <h1><i class="material-icons">people</i> <?php echo $pageTitle; ?></h1>
  </header>

  <div class="w3-container w3-padding">
    <table class="w3-table-all w3-hoverable">
      <caption>Danh sách thành viên</caption>
        <thead>
          <tr class="w3-<?php echo PRIMARY_COLOR; ?>">
            <th>ID</th>
            <th>Số CCCD</th>
            <th>Họ và Tên</th>
            <th>Ngày tháng năm sinh</th>
            <th>Giới tính</th>
            <th>Các thông tin khác</th>
          </tr>
        </thead>
        <tbody>
<?php
try {
  $memberCount = 0;
  foreach ($databaseConnection->query($memberTableQuery) as $memberRow) {
    echo '<tr>';
    echo '<td class="primary-key">' . $memberRow['id'] . '</td>';
    echo '<td>' . $memberRow['national_id'] . '</td>';
    echo '<td>' . $memberRow['full_name'] . '</td>';
    echo '<td><time datetime="' . $memberRow['birth_date'] .'">' . $memberRow['birth_date'] . '</time></td>';
    echo '<td>';
    switch ($memberRow['gender']) {
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
    echo '<td><a class="w3-btn w3-blue" href="/' . $prefixUrl . '/view?id=' . $memberRow['id'] . '">';
    echo '<i class="material-icons">visibility</i> Xem chi tiết</a></td>';
    echo '</tr>';
    $memberCount++;
  }
} catch(PDOException $e) {
  echo $e->getMessage();
}
?>
        </tbody>
        <tfoot>
          <tr class="w3-<?php echo PRIMARY_COLOR; ?>">
            <td colspan="5">Tổng số thành viên</td>
            <td><?php echo $memberCount; ?></td>
          </tr>
        </tfoot>
    </table>
  </div>
</section>


<?php
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-disconnect.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/footer.php';
?>
