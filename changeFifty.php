<?php
// 連線到資料庫
require_once('connect.php');
if ($conn->connect_error) {
  die("連線失敗: " . $conn->connect_error);
}
$sql = "SELECT * FROM vendor";
$result = $conn->query($sql);


$data_num = $result->num_rows; //統計總比數
$per = 50; //每頁顯示項目數量
$pages = ceil($data_num / $per); //取得不小於值的下一個整數，代表總共幾個分頁
if (!isset($_GET["page"])) { //假如$_GET["page"]未設置
  $page = 1; //則在此設定起始頁數
} else {
  $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
}
$start = ($page - 1) * $per; //每一頁開始的資料序號
$result = $conn->query($sql . ' LIMIT ' . $start . ', ' . $per) or die("Error");
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
          For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <div class="d-flex justify-content-center mb-3">
                <!-- Example single danger button -->
                <div class="d-flex align-items-center justify-content-between">
                  <span>顯示</span>
                  <select class="selectInfo form-select text-center border border-secondary rounded mx-2" aria-label="Default select example">
                    <option value="5">5</option>
                    <option value="20">20</option>
                    <option selected value="50">50</option>
                  </select>
                  <span>筆資料</span>
                </div>

                <form class="form-inline offset-7" method="post">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  // 從表單 POST 提交的資料中擷取數據
                  $search = $_POST['search'];

                  // 執行相應的操作，例如將資料存入資料庫或進行驗證

                  // 輸出擷取到的資廖
                  echo "search關鍵字: " . $search . "<br>";
                }
                ?>
              </div>
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
                      <a aria-label="Previous" class="page-link" href="javascript:void(0)" onclick="loadPage(
          <?php if ($page == 1) { ?> 
                     <?php echo 1 ?>
                   <?php } else { ?>
                   <?php echo $page - 1; ?>
                 <?php } ?>)">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>

                    <?php $start = max(1, $page - 2) ?>
                    <?php $end = min($start + 4, $pages) ?>
                    <?php for ($i = $start; $i <= $end; $i++) { ?>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)" onclick="loadPage(<?php echo $i; ?>)">
                          <?php echo $i; ?>
                        </a>
                      </li>
                    <?php
                    } ?>

                    <li class="page-item">
                      <a class="page-link" href="javascript:void(0)" onclick="loadPage(
                      <?php if ($page == $pages) { ?> 
                     <?php echo $pages ?>
                   <?php } else {
                        echo $page + 1;
                      } ?> )">
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


            </div>
          </div>

        </div>


      </div>
      <!-- /.container-fluid -->
    </div>

    <script>
      function loadPage(page) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "vendorList.php?page=" + page, true);
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            var paginationContainer = document.body;
            paginationContainer.innerHTML = response;
          }
        };
        xhr.send();
      }
      const selectInfo = document.querySelector(".selectInfo")
      const selectList = selectInfo.querySelectorAll("option")
      // console.log(selectList[2].value)

      selectInfo.addEventListener("change", function(e) {
        var xhr = new XMLHttpRequest();
        if (this.value == 20) {
          console.log(this.value)
          xhr.open("GET", "changeTwenty.php", true);
        }else if(this.value == 50){
          console.log(this.value)
          xhr.open("GET", "changeFifty.php", true);
        }else{
          console.log(this.value)
          xhr.open("GET", "mainVendors.php", true);
        }
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            var paginationContainer = document.body;
            paginationContainer.innerHTML = response;
          }
        };
        xhr.send();
      })
      selectInfo = document.querySelector(".selectInfo")
    </script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


</body>

</html>