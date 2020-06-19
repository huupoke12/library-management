<?php
$pageTitle = 'Cài đặt';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/header.php';

$databaseConfig = null;
$newDatabaseConfigStatusHTML = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['hostname']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['database_name'])) {
        $newDatabaseConfigStatusHTML .= '<p class="w3-text-red">Xin hãy nhập đầy đủ tất cả các trường.</p>';
    } else {
        try {
            $newDatabaseConfigJson = json_encode(array('hostname'=>$_POST['hostname'], 'username'=>$_POST['username'], 'password'=>$_POST['password'], 'database_name'=>$_POST['database_name']));

            if (!file_put_contents(DATABASE_CONFIG_FILE_PATH, $newDatabaseConfigJson)) {
                throw new Exception('Không thể ghi file cài đặt!');
            }

            $newDatabaseConfigStatusHTML .= '<p class="w3-text-green">Đã gửi thành công cài đặt.</p>';

        } catch (Exception $e) {
            $newDatabaseConfigStatusHTML .= '<p class="w3-text-red">' . $e->getMessage() . '</p>';
        }
    }
}
?>

<section class="w3-card-4 w3-section">
  <header class="w3-container w3-<?php echo PRIMARY_COLOR; ?>">
    <h2><i class="material-icons">table_rows</i> Cài đặt cơ sở dữ liệu</h2>
  </header>

  <div class="w3-container">

    <h3>Trạng thái hiện tại:</h3>
      <div class="w3-container">


<?php
try {
    if (!file_exists(DATABASE_CONFIG_FILE_PATH)) {
        throw new Exception('File cài đặt không tồn tại');
    }
    $databaseConfigJson = file_get_contents(DATABASE_CONFIG_FILE_PATH);

    if (!$databaseConfigJson) {
        if ($databaseConfigJson === '') {
            throw new Exception('File cài đặt rỗng');
        }
        throw new Exception('Không thể đọc file cài đặt');
    }

    $databaseConfig = json_decode($databaseConfigJson);

    if (empty($databaseConfig->hostname) || empty($databaseConfig->username) || empty($databaseConfig->password) || empty($databaseConfig->database_name)) {
        throw new Exception('File cài đặt không hợp lệ');
    }

    $databaseConnection = new PDO("mysql:host=$databaseConfig->hostname;dbname=$databaseConfig->database_name", $databaseConfig->username, $databaseConfig->password);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo '<strong class="w3-text-green w3-large">Kết nối thành công</strong>';
} catch (Exception $e) {
    echo '<strong class="w3-text-red w3-large">' . $e->getMessage() . '</strong>';
}
$databaseConnection = null;
?>
</div>
<hr>

<?php echo $newDatabaseConfigStatusHTML; ?>

<form method="post">
  <p>
  <label for="hostname"><b>Tên máy chủ</b></label>
  <input class="w3-input w3-hover-border-<?php echo PRIMARY_COLOR; ?>" type="text" id="hostname" name="hostname" placeholder="Nhập tên máy chủ" value="<?php echo empty($databaseConfig->hostname) ? '' : $databaseConfig->hostname; ?>"></p>

  <p>
  <label for="username"><b>Tên tài khoản</b></label>
  <input class="w3-input w3-hover-border-<?php echo PRIMARY_COLOR; ?>" type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" value="<?php echo empty($databaseConfig->username) ? '' : $databaseConfig->username; ?>"></p>

  <p>
  <label for="password"><b>Mật khẩu</b></label>
  <input class="w3-input w3-hover-border-<?php echo PRIMARY_COLOR; ?>" type="password" id="password" name="password" placeholder="Nhập mật khẩu" value="<?php echo empty($databaseConfig->username) ? '' : str_repeat('*', 32); ?>"></p>

  <p>
  <label for="database_name"><b>Tên cơ sở dữ liệu</b></label>
  <input class="w3-input w3-hover-border-<?php echo PRIMARY_COLOR; ?>" type="text" id="database_name" name="database_name" placeholder="Nhập tên cơ sở dữ liệu" value="<?php echo empty($databaseConfig->database_name) ? '' : $databaseConfig->database_name; ?>"></p>

  <p><input class="w3-btn w3-blue" type="submit" value="Gửi cài đặt"></p>

</form>
<button class="w3-btn w3-<?php echo PRIMARY_COLOR; ?>" onclick="showNewDatabasePassword()">Hiện / Ẩn mật khẩu</button>
<hr>
</div>
</section>

<script>
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
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/footer.php';
?>
