<?php
$pageTitle = 'Thêm thành viên mới';
$errorTextArray = [];
$errorHTML = '';
$successText = '';
$newMemberQuery = "INSERT INTO member (
  national_id, full_name, birth_date, gender, email_address, phone_number, join_date, note) VALUES (
    :national_id, :full_name, :birth_date, :gender, :email_address, :phone_number, :join_date, :note)";
$newMemberData = [];
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/header.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/ultility.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $newMemberData = array(
    'national_id' => $_POST['national_id'],
    'full_name' => $_POST['full_name'],
    'birth_date' => $_POST['birth_date'],
    'gender' => $_POST['gender'],
    'email_address' => $_POST['email_address'],
    'phone_number' => $_POST['phone_number'],
    'join_date' => date('Y-m-d'),
    'note' => $_POST['note'],
  );
  if (empty($newMemberData['full_name'])) {
    array_push($errorTextArray, 'Thiếu họ và tên');
  }
  if (empty($newMemberData['birth_date'])) {
    array_push($errorTextArray, 'Thiếu ngày tháng năm sinh');
  } else if (!validateDate($newMemberData['birth_date'], 'Y-m-d')) {
    array_push($errorTextArray, 'Ngày tháng năm sinh và / hoặc định dạng không hợp lệ');
  }
  if (empty($newMemberData['national_id'])) {
    array_push($errorTextArray, 'Thiếu số căn cước công dân');
  } else if (!ctype_digit($newMemberData['national_id'])) {
    array_push($errorTextArray, 'Số căn cước công dân có chứa các kí tự khác số');
  } else if (strlen($newMemberData['national_id']) > 12) {
    array_push($errorTextArray, 'Số căn cước công dân quá 12 kí tự');
  }
  if (empty($newMemberData['gender'])) {
    $newMemberData['gender'] = NULL;
  } else if (strlen($newMemberData['gender']) > 1) {
    array_push($errorTextArray, 'Định dạng giới tính không hợp lệ');
  }
  if (empty($newMemberData['email_address'])) {
    $newMemberData['email_address'] = NULL;
  }
  if (empty($newMemberData['phone_number'])) {
    $newMemberData['phone_number'] = NULL;
  } else if (!ctype_digit($newMemberData['phone_number'])) {
    array_push($errorTextArray, 'Số điện thoại có chứa các kí tự khác số');
  } else if (strlen($newMemberData['phone_number']) > 15) {
    array_push($errorTextArray, 'Số điện thoại quá 15 kí tự');
  }
  if (empty($newMemberData['note'])) {
    $newMemberData['note'] = NULL;
  }

  if (empty($errorTextArray)) {
    try {
      $databaseConnection->prepare($newMemberQuery)->execute($newMemberData);
      $successText = 'Đã thêm thành công thành viên mới: ' . $newMemberData['full_name'];
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  } else {
    $errorHTML = '<p class="w3-text-red">Không thể thêm thành viên mới do:</p>';
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
    <h1><span class="material-icons">person_add</span> Thêm thành viên mới</h1>
  </header>

  <div class="w3-container w3-padding">
    <div><?php echo $errorHTML; ?></div>
    <p class="w3-text-green"><?php echo $successText; ?></p>
    <p>Các trường có đánh dấu <abbr class="w3-text-red" title="bắt buộc">*</abbr> là bắt buộc.</p>
    <form class="w3-container" method="post">
      <p>
        <label class="form-label" for="full_name">Họ và tên <abbr class="w3-text-red" title="bắt buộc">*</abbr></label>
        <input class="w3-input" type="text" id="full_name" name="full_name" autofocus required value="<?php echo $_POST['full_name']; ?>">
      </p>

      <p>
        <label class="form-label" for="birth_date">Ngày tháng năm sinh <abbr class="w3-text-red" title="bắt buộc">*</abbr></label>
        <input class="w3-input" type="date" id="birth_date" name="birth_date" placeholder="YYYY-MM-DD" required value="<?php echo $_POST['birth_date']; ?>">
      </p>

      <fieldset>
        <legend class="form-label">Giới tính</legend>
        <div>
          <input class="w3-radio" type="radio" id="gender_undefined" name="gender" value="">
          <label for="gender_undefined">Không xác định</label>
        </div>

        <div>
          <input class="w3-radio" type="radio" id="gender_male" name="gender" value="m" <?php echo ($_POST['gender'] === 'm') ? 'checked' : ''; ?>>
          <label for="gender_male">Nam</label>
        </div>

        <div>
          <input class="w3-radio" type="radio" id="gender_female" name="gender" value="f" <?php echo ($_POST['gender'] === 'f') ? 'checked' : ''; ?>>
          <label for="gender_female">Nữ</label>
        </div>
      </fieldset>

      <p>
        <label class="form-label" for="national_id">Số Căn cước công dân / Chứng minh thư nhân dân <abbr class="w3-text-red" title="bắt buộc">*</abbr></label>
        <input class="w3-input" type="tel" id="national_id" name="national_id" required value="<?php echo $_POST['national_id']; ?>">
      </p>

      <p>
        <label class="form-label" for="email_address">Địa chỉ email</label>
        <input class="w3-input" type="email" id="email_address" name="email_address" value="<?php echo $_POST['email_address']; ?>">
      </p>

      <p>
        <label class="form-label" for="phone_number">Số điện thoại</label>
        <input class="w3-input" type="tel" id="phone_number" name="phone_number" value="<?php echo $_POST['phone_number']; ?>">
      </p>

      <p>
        <label class="form-label" for="note">Ghi chú</label>
        <textarea class="w3-input w3-border" id="note" name="note"><?php echo $_POST['note']; ?></textarea>
      </p>

      <p>
      <button class="w3-btn w3-blue" type="submit">Thêm thành viên</button>
      </p>
    </form>
  </div>

</section>


<?php
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/database-disconnect.php';
require_once dirname($_SERVER['DOCUMENT_ROOT']) . '/include/footer.php';
?>
