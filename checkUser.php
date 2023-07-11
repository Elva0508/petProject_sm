<?php
require_once('connect.php');
if (isset($_POST['account'])) {
    $account = $_POST['account'];

    // 查询数据库中是否存在该帐号
    $sql = "SELECT * FROM vendor WHERE account = '$account'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 帐号已存在，显示警告信息
        echo "<span class='checkText text-danger'>使用者帳號已存在</span>";
    } else {
        echo "使用者帳號可使用";
    }
}

?>