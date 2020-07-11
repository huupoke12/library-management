<?php
$pageTitle = 'Quản lý sách';
$urlPart = explode('/', $_SERVER['REQUEST_URI']);
$prefixUrl = $urlPart[1] . '/' . $urlPart[2];
$bookTableQuery = "SELECT id, isbn, title, author, publisher, price, borrow_count FROM book";
$bookTableData = [];

require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/header.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-connect.php';

try {
  $bookTableData = $databaseConnection->query($bookTableQuery)->fetchAll();
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>

<section class="w3-section w3-card">

  <header class="w3-container w3-<?php echo PRIMARY_COLOR; ?>">
    <h1><i class="material-icons">library_books</i> <?php echo $pageTitle; ?></h1>
  </header>

  <div class="w3-container w3-padding">
    <a class="w3-btn w3-blue" href="/<?php echo $prefixUrl; ?>/add">
    <i class="material-icons">book</i> Thêm sách mới</a>
    <hr>
    <table class="w3-table-all w3-hoverable">
      <caption>Danh sách sách</caption>
        <thead>
          <tr class="w3-<?php echo PRIMARY_COLOR; ?>">
            <th>ID</th>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Nhà xuất bản</th>
            <th>ISBN</th>
            <th>Giá bìa</th>
            <th>Số lượt mượn tổng cộng</th>
            <th>Các thông tin khác</th>
          </tr>
        </thead>
        <tbody>
<?php
foreach ($bookTableData as $bookData) {
  echo '<tr>';
  echo '<td class="primary-key">' . $bookData['id'] . '</td>';
  echo '<td>' . $bookData['title'] . '</td>';
  echo '<td>' . $bookData['author'] . '</td>';
  echo '<td>' . $bookData['publisher'] . '</td>';
  echo '<td>' . $bookData['isbn'] . '</td>';
  echo '<td>' . $bookData['price'] . '</td>';
  echo '<td>' . $bookData['borrow_count'] . '</td>';
  echo '<td><a class="w3-btn w3-blue" href="/' . $prefixUrl . '/view?id=' . $bookData['id'] . '">';
  echo '<i class="material-icons">visibility</i> Xem chi tiết</a></td>';
  echo '</tr>';
}
?>
        </tbody>
        <tfoot>
          <tr class="w3-<?php echo PRIMARY_COLOR; ?>">
            <td colspan="7">Tổng số sách</td>
            <td><?php echo count($bookTableData); ?></td>
          </tr>
        </tfoot>
    </table>
  </div>
</section>


<?php
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-disconnect.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/footer.php';
?>
