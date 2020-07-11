<?php
$pageTitle = 'Chi tiết sách';
$bookInfoQuery = "SELECT * FROM book WHERE id = ";
$bookInfo = [];
$errorText = '';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/header.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-connect.php';

if (ctype_digit($_GET['id'])) {
  try {
    $bookInfo = $databaseConnection->query($bookInfoQuery . $_GET['id'])->fetch();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}

if (empty($bookInfo) || !$bookInfo) {
  $errorText .= 'Không tồn tại sách với ID = ' . $_GET['id'];
}

?>

<section class="w3-section w3-card">
  <header class="w3-container w3-<?php echo PRIMARY_COLOR; ?>">
    <h1><i class="material-icons">book</i> <?php echo $pageTitle; ?></h1>
  </header>

  <div class="w3-container w3-padding">
    <p class="w3-text-red"><?php echo $errorText; ?></p>
    <div>
      <ul class="w3-ul w3-hoverable">
        <li><span class="info-column-name">ID</span>: <?php echo $bookInfo['id']; ?></li>
        <li><span class="info-column-name">Tên sách</span>: <?php echo $bookInfo['title']; ?></li>
        <li><span class="info-column-name">Tác giả</span>: <?php echo $bookInfo['author']; ?></li>
        <li><span class="info-column-name">Nhà xuất bản</span>: <?php echo $bookInfo['publisher']; ?></li>
        <li><span class="info-column-name">Năm xuất bản</span>:
        <time datetime="<?php echo $bookInfo['publish_year']; ?>"><?php echo $bookInfo['publish_year']; ?></time></li>
        <li><span class="info-column-name">ISBN</span>: <?php echo $bookInfo['isbn']; ?></li>
        <li><span class="info-column-name">Giá bìa</span>: <?php echo $bookInfo['price']; ?></li>
        <li><span class="info-column-name">Số lượt mượn tổng cộng</span>: <?php echo $bookInfo['borrow_count']; ?></li>
        <li><span class="info-column-name">Ghi chú</span>: <?php echo $bookInfo['note']; ?></li>
      </ul>
    </div>
  </div>
</section>


<?php
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-disconnect.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/footer.php';
?>
