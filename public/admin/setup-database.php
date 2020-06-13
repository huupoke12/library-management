<?php
$pageTitle = 'Cài đặt cơ sở dữ liệu';
require_once $_SERVER['DOCUMENT_ROOT'].'/include/header.php';

$databaseConfigFilePath = dirname($_SERVER['DOCUMENT_ROOT']).'/config/database.json';

$newDatabaseConfigStatusHTML = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['hostname']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['database_name'])) {
        $newDatabaseConfigStatusHTML .= '<p class="w3-text-red">Xin hãy nhập đầy đủ tất cả các trường.</p>';
    } else {
        try {
            $newDatabaseConfigJson = json_encode(array('hostname'=>$_POST['hostname'], 'username'=>$_POST['username'], 'password'=>$_POST['password'], 'database_name'=>$_POST['database_name']));

            if (!file_put_contents($databaseConfigFilePath, $newDatabaseConfigJson)) {
                throw new Exception('Không thể ghi file cài đặt!');
            }

            $newDatabaseConfigStatusHTML .= '<p class="w3-text-green">Đã gửi thành công cài đặt.</p>';

        } catch (Exception $e) {
            $newDatabaseConfigStatusHTML .= '<p class="w3-text-red">' . $e->getMessage() . '</p>';
        }
    }
}
?>

<div class="w3-card-4 w3-section">
  <header class="w3-panel w3-<?php echo $primaryColor; ?>">
    <h2><i class="material-icons">settings</i> <?php echo $pageTitle; ?></h2>
  </header>

  <div class="w3-panel">

  <section class="w3-section">
    <h3>Cài đặt hiện tại</h3>


<?php
try {
    if (!file_exists($databaseConfigFilePath)) {
        throw new Exception('File cài đặt không tồn tại!');
    }
    $databaseConfigJson = file_get_contents($databaseConfigFilePath);

    if (!$databaseConfigJson) {
        if ($databaseConfigJson === '') {
            throw new Exception('File cài đặt rỗng!');
        }
        throw new Exception('Không thể đọc file cài đặt!');
    }

    $databaseConfig = json_decode($databaseConfigJson);

    if (empty($databaseConfig->hostname) || empty($databaseConfig->username) || empty($databaseConfig->password) || empty($databaseConfig->database_name)) {
        throw new Exception('File cài đặt không hợp lệ!');
    }

    echo '<p><b>Tên máy chủ:</b> <samp>' . $databaseConfig->hostname . '</samp></p>';
    echo '<p><b>Tên đăng nhập:</b> <samp>' . $databaseConfig->username . '</samp></p>';
    echo '<p><b>Mật khẩu:</b> <input type="password" id="current_db_password" value="' . $databaseConfig->password . '"></p>';
    echo '<p><b>Tên cơ sở dữ liệu:</b> <samp>' . $databaseConfig->database_name . '</samp></p>';
    echo '<p><button class="w3-btn w3-' . $primaryColor . '" onclick="showCurrentDatabasePassword()">Hiện / Ẩn mật khẩu</button></p>';
} catch (Exception $e) {
    echo '<p class="w3-text-red">Không thể đọc cài đặt hiện tại: ' . $e->getMessage() . '</p>';
}
?>
<hr>
</section>

<section class="w3-section">
  <h3>Thiết lập cài đặt mới</h3>
<?php echo $newDatabaseConfigStatusHTML; ?>

<form method="post">
  <p>
  <label for="hostname"><b>Tên máy chủ</b></label>
  <input class="w3-input w3-hover-border-<?php echo $primaryColor; ?>" type="text" id="hostname" name="hostname" placeholder="Nhập tên máy chủ"></p>

  <p>
  <label for="username"><b>Tên đăng nhập</b></label>
  <input class="w3-input w3-hover-border-<?php echo $primaryColor; ?>" type="text" id="username" name="username" placeholder="Nhập tên đăng nhập"></p>

  <p>
  <label for="password"><b>Mật khẩu</b></label>
  <input class="w3-input w3-hover-border-<?php echo $primaryColor; ?>" type="password" id="password" name="password" placeholder="Nhập mật khẩu"></p>

  <p>
  <label for="database_name"><b>Tên cơ sở dữ liệu</b></label>
  <input class="w3-input w3-hover-border-<?php echo $primaryColor; ?>" type="text" id="database_name" name="database_name" placeholder="Nhập tên cơ sở dữ liệu"></p>

  <p><input class="w3-btn w3-blue" type="submit" value="Gửi cài đặt mới"></p>

</form>
<button class="w3-btn w3-<?php echo $primaryColor; ?>" onclick="showNewDatabasePassword()">Hiện / Ẩn mật khẩu</button>
</section>

</div>
</div>

<script>
function showCurrentDatabasePassword() {
    var current_db_password_element = document.getElementById('current_db_password');
    if (current_db_password_element.type === 'password') {
        current_db_password_element.type = 'text';
    } else {
        current_db_password_element.type = 'password';
    }
}

function showNewDatabasePassword() {
    var new_db_password_element = document.getElementById('password');
    if (new_db_password_element.type === 'password') {
        new_db_password_element.type = 'text';
    } else {
        new_db_password_element.type = 'password';
    }
}
</script>

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/include/footer.php';
?>