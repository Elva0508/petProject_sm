<?php include("do_mainVendor.php") ?>

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
                <option selected value="5">5</option>
                <option value="20">20</option>
                <option value="50">50</option>
              </select>
              <span>筆資料</span>
            </div>
            <button type="button" class="btn btn-primary sortBtn" value="1" onclick="updateSql()">ID<i class="fa-solid fa-arrow-up-wide-short"></i></button>
            <button type="button" class="btn btn-primary sortBtn" value="2">ID<i class="fa-solid fa-arrow-down-wide-short"></i></button>


            <form action="test.php" class="form-inline offset-6" method="get">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

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

                <?php
                // 從表單 POST 提交的資料中擷取數據
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                // 執行相應的操作，例如將資料存入資料庫或進行驗證
                if (!empty($search)) {
                  $sql = "SELECT * FROM vendor WHERE account LIKE '%$search%' OR name LIKE '%$search%'";
                  $result2 = $conn->query($sql);
                  $data_num = $result2->num_rows;
                  if (!isset($_GET["page"])) { //假如$_GET["page"]未設置
                    $page = 1; //則在此設定起始頁數
                  } else {
                    $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
                  }
                  $pages = ceil($data_num / $per);
                  $start = ($page - 1) * $per; //每一頁開始的資料序號
                  $result2 = $conn->query($sql . ' LIMIT ' . $start . ', ' . $per) or die("Error");
                  while ($row = $result2->fetch_assoc()) {
                ?>
                    <tr>
                      <td><?php echo $row["vendor_id"]; ?></td>
                      <td><img src="./vendorLogo/<?php echo $row["logo_image"]; ?>.png" alt="logo"></td>
                      <td><?php echo $row["name"]; ?></td>
                      <td><?php echo $row["account"]; ?></td>
                      <td><?php echo $row["company_location"]; ?></td>
                      <td><?php echo $row["created_at"]; ?></td>
                      <td><?php echo $row["updated_at"]; ?></td>
                    </tr>
                  <?php
                  }
                } else {
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <tr>
                      <td><?php echo $row["vendor_id"]; ?></td>
                      <td><img src="./vendorLogo/<?php echo $row["logo_image"]; ?>.png" alt="logo"></td>
                      <td><?php echo $row["name"]; ?></td>
                      <td><?php echo $row["account"]; ?></td>
                      <td><?php echo $row["company_location"]; ?></td>
                      <td><?php echo $row["created_at"]; ?></td>
                      <td><?php echo $row["updated_at"]; ?></td>
                    </tr>
                <?php
                  }
                }
                ?>

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

      const sortBtn = document.querySelectorAll(".sortBtn");
      sortBtn.forEach((element) => {
        element.addEventListener("click", async function(e) {
          try {
            if (this.value == 1) {
              const response = await fetch("mainVendors.php");
              const content = await response.text();
              const targetElement = document.body;
              targetElement.innerHTML = content;
              console.log("test")
            } else if (this.value == 2) {
              const response = await fetch("sortId_desc.php"); // 替換為您的 PHP 檔案路徑
              const content = await response.text();
              // 更新指定的 HTML 元素內容
              const targetElement = document.getElementById("content"); // 替換為您要更新內容的元素 ID
              targetElement.innerHTML = content;
            }

          } catch (error) {
            console.error(error);
          }
        });
      });
    </script>
  </div>
  <!-- /.container-fluid -->
</div>

</html>