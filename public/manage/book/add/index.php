<?php
$pageTitle = 'Thêm sách mới';
$errorTextArray = [];
$errorHTML = '';
$successText = '';
$newBookQuery = "INSERT INTO book (
  isbn, title, author, publisher, publish_year, price, borrow_count, note) VALUES (
    :isbn, :title, :author, :publisher, :publish_year, :price, :borrow_count, :note)";
$newBookData = [];
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/header.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/ultility.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $newBookData = array(
    'isbn' => $_POST['isbn'],
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'publisher' => $_POST['publisher'],
    'publish_year' => $_POST['publish_year'],
    'price' => $_POST['price'],
    'borrow_count' => 0,
    'note' => $_POST['note'],
  );
  if (empty($newBookData['title'])) {
    array_push($errorTextArray, 'Thiếu tên sách');
  }
  if (empty($newBookData['price']) && $newBookData['price'] !== '0') {
    array_push($errorTextArray, 'Thiếu giá bìa');
  } else if (!ctype_digit($newBookData['price'])) {
    array_push($errorTextArray, 'Giá bìa có chứa các kí tự khác số');
  } else {
    $newBookData['price'] = (int)$newBookData['price'];
  }
  if (empty($newBookData['isbn'])) {
    $newBookData['isbn'] = NULL;
  } else if (!ctype_digit($newBookData['isbn'])) {
    array_push($errorTextArray, 'ISBN có chứa các kí tự khác số');
  } else if (strlen($newBookData['isbn']) !== 10 && strlen($newBookData['isbn']) !== 13) {
    array_push($errorTextArray, 'ISBN chứa số kí tự khác 10 hoặc 13');
  }
  if (empty($newBookData['author'])) {
    $newBookData['author'] = NULL;
  }
  if (empty($newBookData['publisher'])) {
    $newBookData['publisher'] = NULL;
  }
  if (empty($newBookData['publish_year'])) {
    $newBookData['publish_year'] = NULL;
  } else if (!validateDate($newBookData['publish_year'], 'Y')) {
    array_push($errorTextArray, 'Năm xuất bản và / hoặc định dạng không hợp lệ');
  } else {
    $newBookData['publish_year'] = (int)$newBookData['publish_year'];
  }
  if (empty($newBookData['note'])) {
    $newBookData['note'] = NULL;
  }

  if (empty($errorTextArray)) {
    try {
      $databaseConnection->prepare($newBookQuery)->execute($newBookData);
      $successText = 'Đã thêm thành công sách mới: ' . $newBookData['title'];
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  } else {
    $errorHTML = '<p class="w3-text-red">Không thể thêm sách mới do:</p>';
    $errorHTML .= '<ul>';
    foreach ($errorTextArray as $errorText) {
      $errorHTML .= '<li>' . $errorText . '</li>';
    }
    $errorHTML .= '</ul>';
  }
}

?>

<section class="w3-section w3-card">

  <header class="w3-container w3-<?php echo PRIMARY_COLOR; ?>">
    <h1><span class="material-icons">book</span> Thêm sách mới</h1>
  </header>

  <div class="w3-container w3-padding">
    <div><?php echo $errorHTML; ?></div>
    <p class="w3-text-green"><?php echo $successText; ?></p>
    <p>Các trường có đánh dấu <abbr class="w3-text-red" title="bắt buộc">*</abbr> là bắt buộc.</p>
    <form class="w3-container" method="post">
      <p>
        <label class="form-label" for="title">Tên sách <abbr class="w3-text-red" title="bắt buộc">*</abbr></label>
        <input class="w3-input" type="text" id="title" name="title" autofocus required value="<?php echo $_POST['title']; ?>">
      </p>

      <p>
        <label class="form-label" for="author">Tác giả</label>
        <input class="w3-input" type="text" id="author" name="author" value="<?php echo $_POST['author']; ?>">
      </p>

      <p>
        <label class="form-label" for="publisher">Nhà xuất bản</label>
        <input class="w3-input" type="text" id="publisher" name="publisher" value="<?php echo $_POST['publisher']; ?>">
      </p>

      <p>
        <label class="form-label" for="publish_year">Năm xuất bản</label>
        <input class="w3-input" type="tel" id="publish_year" name="publish_year" value="<?php echo $_POST['publish_year']; ?>">
      </p>

      <p>
        <label class="form-label" for="isbn">ISBN</label>
        <input class="w3-input" type="tel" id="isbn" name="isbn" value="<?php echo $_POST['isbn']; ?>">
      </p>

      <p>
        <label class="form-label" for="price">Giá bìa <abbr class="w3-text-red" title="bắt buộc">*</abbr></label>
        <input class="w3-input" type="number" id="price" name="price" required value="<?php echo $_POST['price']; ?>">
      </p>

      <p>
        <label class="form-label" for="note">Ghi chú</label>
        <textarea class="w3-input w3-border" id="note" name="note"><?php echo $_POST['note']; ?></textarea>
      </p>

      <p>
      <button class="w3-btn w3-blue" type="submit">Thêm sách</button>
      </p>
    </form>
  </div>

</section>


<?php
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-disconnect.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/footer.php';
?>
