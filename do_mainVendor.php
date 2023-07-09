<?php
// 連線到資料庫
require_once('connect.php');
if ($conn->connect_error) {
  die("連線失敗: " . $conn->connect_error);
}
$sql = "SELECT * FROM vendor";
$result = $conn->query($sql);
$data_num = $result->num_rows; //統計總比數
$per = 5; //每頁顯示項目數量
$pages = ceil($data_num / $per); //取得不小於值的下一個整數，代表總共幾個分頁
if (!isset($_GET["page"])) { //假如$_GET["page"]未設置
  $page = 1; //則在此設定起始頁數
} else {
  $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
}
$start = ($page - 1) * $per; //每一頁開始的資料序號
$result = $conn->query($sql . ' LIMIT ' . $start . ', ' . $per) or die("Error");
