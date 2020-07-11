<?php
$pageTitle = 'Hệ thống quản lý thư viện';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/header.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-connect.php';
?>

<section class="w3-section">
  <header class="w3-center">
    <h1>Chào mừng đến với hệ thống quản lý thư viện</h1>
  </header>

  <div class="text-justified-limit">

    <p>Nhằm hạn chế giấy mực, cũng như công sức viết lách ghi chú trong công việc quản lí thư viện,
    đây là một ứng dụng được viết nhằm hỗ trợ thủ thư quản lí người dùng mượn sách và trả sách.</p>
    <p>Hãy sử dụng thanh điều hướng để sử dụng các chức năng của ứng dụng.</p>

  </div>

</section>

<?php
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-disconnect.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/footer.php';
?>
