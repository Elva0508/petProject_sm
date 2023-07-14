<?php
require_once('connect.php');
$checkboxes = $_GET['checkbox'];
if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = '';
};
if (isset($_GET['infoNum'])) {
    $infoNum = $_GET['infoNum'];
} else {
    $infoNum = 5;
};
if (isset($_GET['sortNum'])) {
    $sortNum = $_GET['sortNum'];
} else {
    $sortNum = 1;
};


foreach ($checkboxes as $checkbox) {
    echo $checkbox . "<br>";
    // 在這裡執行刪除操作或其他需要處理的任務
    $sql = "DELETE FROM vendor WHERE vendor_id = $checkbox";
    $result = $conn->query($sql);
}
header("location: admin-vendors.php?search=" . $search . "&sortNum=" . $sortNum . "&infoNum=" . $infoNum);
