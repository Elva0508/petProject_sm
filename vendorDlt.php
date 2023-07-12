<?php
require_once('connect.php');
$checkboxes = $_GET['checkbox'];
foreach ($checkboxes as $checkbox) {
    echo $checkbox . "<br>";
    // 在這裡執行刪除操作或其他需要處理的任務
    $sql = "DELETE FROM vendor WHERE vendor_id = $checkbox";
    $result = $conn->query($sql);
}
header("location: mainVendors.php");
