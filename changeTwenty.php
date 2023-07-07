<?php
// 連線到資料庫
require_once('connect.php');
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}
$sql = "SELECT * FROM vendor";
$result = $conn->query($sql);


$data_num = $result->num_rows; //統計總比數
$per = 20; //每頁顯示項目數量
$pages = ceil($data_num / $per); //取得不小於值的下一個整數，代表總共幾個分頁
if (!isset($_GET["page"])) { //假如$_GET["page"]未設置
    $page = 1; //則在此設定起始頁數
} else {
    $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
}
$start = ($page - 1) * $per; //每一頁開始的資料序號
$result = $conn->query($sql . ' LIMIT ' . $start . ', ' . $per) or die("Error");
?>

<div class="list-wrapper">
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>企業商標</th>
                <th>廠商名稱</th>
                <th>使用者帳號</th>
                <th>企業所在地</th>
                <th>註冊時間</th>
                <th>上次更新時間</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>企業商標</th>
                <th>廠商名稱</th>
                <th>使用者帳號</th>
                <th>企業所在地</th>
                <th>註冊時間</th>
                <th>上次更新時間</th>
            </tr>
        </tfoot>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["vendor_id"]; ?></td>
                    <td><img src="./vendorLogo/<?php echo $row["logo_image"]; ?>.png" alt="logo"></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["account"]; ?></td>
                    <td><?php echo $row["company_location"]; ?></td>
                    <td><?php echo $row["created_at"]; ?></td>
                    <td><?php echo $row["updated_at"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example" class="d-flex justify-content-end">
        <ul class="pagination">
            <li class="page-item">
                <a aria-label="Previous" class="page-link" href="javascript:void(0)">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php $start = max(1, $page - 2) ?>
            <?php $end = min($start + 4, $pages) ?>
            <?php $pageCount = $end - $start + 1 ?>
            <?php for ($i = $start; $i <= $end; $i++) { ?>
                <li class="page-item">
                    <a class="page-link" href="javascript:void(0)" onclick="loadPage(<?php echo $i; ?>)">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php
            } ?>
            <!-- for($i = 1; $i <= $pages; $i++){
                   
                    
                  } -->


            <li class="page-item">
                <a class="page-link" href="javascript:void(0)" onclick="loadPage(<?php echo $page + 1; ?>)">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>


    </nav>
    <?php
    echo '共 ' . $data_num . ' 筆-目前在第 ' . $page . ' 頁-共 ' . $pages . ' 頁';
    ?>
</div>