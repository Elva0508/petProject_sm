<?php
include("do-admin-vendor.php");
//搜尋功能
if (isset($_GET['search'])) {
  $search = $_GET['search'];
  if (isset($_GET['sortBtn'])) {
    if ($_GET['sortBtn'] == 1) {
      $sql = "SELECT * FROM pet.vendor WHERE account LIKE '%$search%' OR name LIKE '%$search%' ORDER BY vendor_id";
    } else if ($_GET['sortBtn'] == 2) {
      $sql = "SELECT * FROM pet.vendor WHERE account LIKE '%$search%' OR name LIKE '%$search%' ORDER BY vendor_id DESC";
    } else if ($_GET['sortBtn'] == 3) {
      $sql = "SELECT * FROM pet.vendor WHERE account LIKE '%$search%' OR name LIKE '%$search%' ORDER BY account ";
    } else if ($_GET['sortBtn'] == 4) {
      $sql = "SELECT * FROM pet.vendor WHERE account LIKE '%$search%' OR name LIKE '%$search%' ORDER BY account DESC";
    }
  } else {
    $sql = "SELECT * FROM vendor WHERE account LIKE '%$search%' OR name LIKE '%$search%'";
  }
  $result = $conn->query($sql);
  $data_num = $result->num_rows; //統計總比數
  $per = isset($per) && $per > 0 ? $per : 5; // Set default value if $per is invalid
  $pages = ceil($data_num / $per); //取得不小於值的下一個整數，代表總共幾個分頁
  if (!isset($_GET["page"])) { //假如$_GET["page"]未設置
    $page = 1; //則在此設定起始頁數
  } else {
    $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
  }
  $start = ($page - 1) * $per; //每一頁開始的資料序號
  $result = $conn->query($sql . ' LIMIT ' . $start . ', ' . $per) or die("Error");
}

//排序按鈕篩選資料
if (isset($_GET['sortNum'])) {
  $sortNum = $_GET['sortNum'];
  if ($sortNum == 1) {
    if (isset($_GET['search'])) {
      $search = $_GET['search'];
      $sql = "SELECT * FROM pet.vendor WHERE account LIKE '%$search%' OR name LIKE '%$search%' ORDER BY vendor_id";
    } else {
      $sql = "SELECT * FROM pet.vendor ORDER BY vendor_id";
    }
  } else if ($sortNum == 2) {
    if (isset($_GET['search'])) {
      $sql = "SELECT * FROM pet.vendor WHERE account LIKE '%$search%' OR name LIKE '%$search%' ORDER BY vendor_id DESC";
    } else {
      $sql = "SELECT * FROM pet.vendor ORDER BY vendor_id DESC";
    }
  } else if ($sortNum == 3) {
    if (isset($_GET['search'])) {
      $sql = "SELECT * FROM pet.vendor WHERE account LIKE '%$search%' OR name LIKE '%$search%' ORDER BY account";
    } else {
      $sql = "SELECT * FROM pet.vendor ORDER BY account";
    }
  } else if ($sortNum == 4) {
    if (isset($_GET['search'])) {
      $sql = "SELECT * FROM pet.vendor WHERE account LIKE '%$search%' OR name LIKE '%$search%' ORDER BY account DESC";
    } else {
      $sql = "SELECT * FROM pet.vendor ORDER BY account DESC";
    }
  }
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
}

//顯示每頁筆數
$infoNum = isset($_GET['infoNum']) ? $_GET['infoNum'] : 5;
if ($infoNum == 20) {
  $per = $infoNum; //每頁顯示項目數量
  $pages = ceil($data_num / $per); //取得不小於值的下一個整數，代表總共幾個分頁
  $start = ($page - 1) * $per; //每一頁開始的資料序號
  $result = $conn->query($sql . ' LIMIT ' . $start . ', ' . $per) or die("Error");
} else if ($infoNum == 50) {
  $per = $infoNum; //每頁顯示項目數量
  $pages = ceil($data_num / $per); //取得不小於值的下一個整數，代表總共幾個分頁
  $start = ($page - 1) * $per; //每一頁開始的資料序號
  $result = $conn->query($sql . ' LIMIT ' . $start . ', ' . $per) or die("Error");
}
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    w */
  </style>
</head>

<body>
  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div class="d-flex justify-content-center mb-3">
                <div class="d-flex align-items-center justify-content-between">
                  <span>顯示</span>
                  <form action="admin-vendors.php" method="GET" onchange="submit()">
                    <select class="selectInfo form-select text-center border border-secondary rounded mx-2" aria-label="Default select example" name="infoNum">
                      <option <?php if ($infoNum == 5) echo "selected='selected'" ?> value="5">5</option>
                      <option <?php if ($infoNum == 20) echo "selected='selected'" ?>value="20">20</option>
                      <option <?php if ($infoNum == 50) echo "selected='selected'" ?> value="50">50</option>
                    </select>
                    <?php if (isset($sortNum)) { ?>
                      <input type="hidden" name="sortNum" value="<?php echo $sortNum; ?>">
                    <?php } ?>
                    <?php if (isset($search)) { ?>
                      <input type="hidden" name="search" value="<?php echo $search; ?>">
                    <?php } ?>
                  </form>
                  <span>筆資料</span>
                </div>
                <form id="sortForm" action="admin-vendors.php" method="GET">
                  <?php if (isset($search)) { ?>
                    <input type="hidden" name="search" value="<?php echo $search; ?>">
                  <?php } ?>
                  <?php if (isset($sortNum)) { ?>
                    <?php if ($sortNum == '1') { ?>
                      <button disabled type="submit" class="btn btn-primary sortBtn" name="sortNum" value="1">ID<i class="fa-solid fa-arrow-up-wide-short"></i></button>
                    <?php } else { ?>
                      <button type="submit" class="btn btn-primary sortBtn" name="sortNum" value="1">ID<i class="fa-solid fa-arrow-up-wide-short"></i></button>
                    <?php } ?>

                    <?php if ($sortNum == '2') { ?>
                      <button disabled type="submit" class="btn btn-primary sortBtn" name="sortNum" value="2">ID<i class="fa-solid fa-arrow-down-wide-short"></i></button>
                    <?php } else { ?>
                      <button type="submit" class="btn btn-primary sortBtn" name="sortNum" value="2">ID<i class="fa-solid fa-arrow-down-wide-short"></i></button>
                    <?php } ?>

                    <?php if ($sortNum == '3') { ?>
                      <button disabled type="submit" class="btn btn-primary sortBtn" name="sortNum" value="3">帳號<i class="fa-solid fa-arrow-up-wide-short"></i></button>
                    <?php } else { ?>
                      <button type="submit" class="btn btn-primary sortBtn" name="sortNum" value="3">帳號<i class="fa-solid fa-arrow-up-wide-short"></i></button>
                    <?php } ?>

                    <?php if ($sortNum == '4') { ?>
                      <button disabled type="submit" class="btn btn-primary sortBtn" name="sortNum" value="4">帳號<i class="fa-solid fa-arrow-down-wide-short"></i></button>
                    <?php } else { ?>
                      <button type="submit" class="btn btn-primary sortBtn" name="sortNum" value="4">帳號<i class="fa-solid fa-arrow-down-wide-short"></i></button>
                    <?php } ?>
                  <?php } else { ?>
                    <button type="submit" class="btn btn-primary sortBtn" name="sortNum" value="1">ID<i class="fa-solid fa-arrow-up-wide-short"></i></button>
                    <button type="submit" class="btn btn-primary sortBtn" name="sortNum" value="2">ID<i class="fa-solid fa-arrow-down-wide-short"></i></button>
                    <button type="submit" class="btn btn-primary sortBtn" name="sortNum" value="3">帳號<i class="fa-solid fa-arrow-up-wide-short"></i></button>
                    <button type="submit" class="btn btn-primary sortBtn" name="sortNum" value="4">帳號<i class="fa-solid fa-arrow-down-wide-short"></i></button>
                  <?php } ?>
                  <input type="hidden" name="infoNum" value="<?php echo $infoNum; ?>">
                </form>

                <form action="admin-vendors.php" class="searchForm form-inline offset-6" method="GET">
                  <?php if (isset($sortNum)) { ?><input type="hidden" name="sortNum" value="<?php echo $sortNum; ?>"><?php } ?>
                  <?php if (isset($infoNum)) { ?><input type="hidden" name="infoNum" value="<?php echo $infoNum; ?>"><?php } ?>
                  <input class=" form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                  <button class="searchBtn btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <button type="button" class="resetBtn btn btn-primary d-none" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                  重置
                </button>

              </div>
              <div class="list-wrapper">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><input type="checkbox" onclick="toggleAllCheck()" style="margin-right: 5px;" id="allCheck" name="allCheck" class="allCheck"><label for="allCheck" class="allCheck" onclick="toggleAllCheck()">全選</label></th>
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
                      <th>選取</th>
                      <th>ID</th>
                      <th>企業商標</th>
                      <th>廠商名稱</th>
                      <th>使用者帳號</th>
                      <th>企業所在地</th>
                      <th>註冊時間</th>
                      <th>上次更新時間</th>
                    </tr>
                  </tfoot>
                  <form action="vendorDlt.php" method="GET">
                    <button class="dltBtn btn btn-dark">刪除</button>
                    <tbody>
                      <?php
                      while ($row = $result->fetch_assoc()) {
                      ?>
                        <tr>
                          <td onclick="toggleCheckbox(this)"><input type="checkbox" name="checkbox[]" value="<?php echo $row["vendor_id"]; ?>" class="checkBox"></td>
                          <td><?php echo $row["vendor_id"]; ?></td>
                          <td><img src="./vendorLogo/<?php echo $row["logo_image"]; ?>" alt="logo"></td>
                          <td><?php echo $row["name"]; ?></td>
                          <td><?php echo $row["account"]; ?></td>
                          <td><?php echo $row["company_location"]; ?></td>
                          <td><?php echo $row["created_at"]; ?></td>
                          <td><?php echo $row["updated_at"]; ?></td>
                          <?php if (isset($search)) { ?>
                            <input type="hidden" name="search" value="<?php echo $search; ?>">
                          <?php } ?>
                          <?php if (isset($infoNum)) { ?>
                            <input type="hidden" name="infoNum" value="<?php echo $infoNum; ?>">
                          <?php } ?>
                          <?php if (isset($sortNum)) { ?>
                            <input type="hidden" name="sortNum" value="<?php echo $sortNum; ?>">
                          <?php } ?>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </form>
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
                   <?php } else { ?>
                       <?php echo $page + 1; ?>
                     <?php } ?> )">
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

        <script>
          //用JS取得URL上的資料
          const urlParams = new URLSearchParams(window.location.search);
          let searchValue = urlParams.get('search');
          let sortNum = urlParams.get('sortNum');
          let infoNum = urlParams.get('infoNum');

          const searchForm = document.querySelector(".searchForm")
          const searchBtn = document.querySelector(".searchBtn")
          let searchInput = searchForm.querySelector("input");
          searchForm.addEventListener("submit", (e) => {
            if (searchInput.value.trim() == '') { //如果表單提交時為空
              e.preventDefault(); // 阻止表单的默认提交行为
              alert('請輸入搜尋內容'); // 显示错误提示
            }
          })

          let resetBtn = document.querySelector(".resetBtn")

          if (searchValue != null) {
            resetBtn.classList.remove("d-none")
            resetBtn.addEventListener("click", (e) => {
              resetBtn.classList.add("d-none")
              searchValue = null;
              resetBtn.classList.add("d-none")
              var xhr = new XMLHttpRequest();
              xhr.open("GET", "admin-vendors.php", true);
              xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                  var response = xhr.responseText;
                  var paginationContainer = document.body;
                  paginationContainer.innerHTML = response;
                }
              };
              xhr.send();
            })

          }

          function loadPage(page) {
            var xhr = new XMLHttpRequest();
            if (searchValue != null) {
              xhr.open("GET", "admin-vendors.php?page=" + page + "&search=" + searchValue + "&sortNum=" + sortNum + "&infoNum=" + infoNum, true);

            } else {
              xhr.open("GET", "admin-vendors.php?page=" + page + "&sortNum=" + sortNum + "&infoNum=" + infoNum, true);

            }
            //使用 querySelector 方法在每次调用 loadPage 函数时获取 resetBtn 元素，并在需要的时候动态地添加或移除 d-none。
            xhr.onreadystatechange = function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                var paginationContainer = document.body;
                paginationContainer.innerHTML = response;
                resetBtn = document.querySelector(".resetBtn"); // 获取重置按钮元素
                if (searchValue != null) {
                  resetBtn.classList.remove("d-none"); // 移除 d-none 类
                  resetBtn.addEventListener("click", (e) => {
                    resetBtn.classList.add("d-none")
                    searchValue = null;
                    resetBtn.classList.add("d-none")
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "admin-vendors.php", true);
                    xhr.onreadystatechange = function() {
                      if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = xhr.responseText;
                        var paginationContainer = document.body;
                        paginationContainer.innerHTML = response;
                      }
                    };
                    xhr.send();
                  })
                }
              }
            };
            xhr.send();
          }

          function toggleCheckbox(td) {
            // 获取关联的复选框
            let checkbox = td.querySelector('input[type="checkbox"]');

            // 切换复选框的选中状态
            checkbox.checked = !checkbox.checked;

            // 检查所有复选框的状态
            let allCheck = document.querySelector(".allCheck");
            let checkBoxes = document.querySelectorAll('.checkBox');
            let allChecked = true;

            checkBoxes.forEach(checkbox => {
              if (!checkbox.checked) {
                allChecked = false;
                return;
              }
            });

            // 根据所有复选框的状态，更新全选复选框的状态
            allCheck.checked = allChecked;

            //當單個 checkbox 被點擊時，程式會檢查所有的 checkbox 是否都被選中，並根據結果來更新全選的 checkbox 的狀態。如果所有的 checkbox 都被選中，則全選的 checkbox 會被勾選；否則，全選的 checkbox 不會被勾選。
          }

          function toggleAllCheck() {
            let allCheck = document.querySelector(".allCheck");
            let checkBoxes = document.querySelectorAll('.checkBox');
            console.log(checkBoxes)
            checkBoxes.forEach((checkbox) => {
              checkbox.checked = allCheck.checked;
            });

          }
        </script>
      </div>
    </div>
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