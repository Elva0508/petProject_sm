<?php
// 檢查表單是否提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 檢查是否有選擇檔案
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // 取得檔案資訊
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $targetDir = "C:/xampp/htdocs/petProject_sm/";
        echo $fileTmpPath . "</br>";
        echo $fileName;
        $targetFile = $targetDir . $fileName;
        move_uploaded_file($fileTmpPath, $targetFile);

        // 連接 MySQL 資料庫



        // 轉義特殊字元

    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>檔案上傳</title>
</head>

<body>
    <h2>檔案上傳</h2>
    <form method="GET" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="上傳">
    </form>
</body>

</html>