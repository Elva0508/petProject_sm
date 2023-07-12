<?php
session_start();
require_once('connect.php');
$account = $_SESSION['account'];
$password = $_SESSION['password'];
$currentDateTime = date('Y-m-d H:i:s');
$stmt = $conn->prepare("SELECT * FROM vendor WHERE account = ? AND password = ? LIMIT 1");
$stmt->bind_param("ss", $account, $password);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!empty($_POST)) {
    $name = $_POST['name'];
    $account = $_POST['account'];
    $location = $_POST['location'];
    $vendor_id = $row['vendor_id'];
    $image = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    echo $fileName;
    // 檢查上傳錯誤
    if ($_FILES['image']['error'] === 0) {
        $targetDir = "C:/xampp/htdocs/petProject_sm/vendorLogo/";

        // 檢查目標資料夾是否存在，若不存在則建立之
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFile = $targetDir . $fileName;

        // 移動檔案到目標資料夾
        if (move_uploaded_file($tmp_name, $targetFile)) {
            // 更新資料庫
            $stmt = $conn->prepare("UPDATE pet.vendor SET name = ?, account = ?, company_location = ?, logo_image = ?, updated_at = NOW() WHERE vendor_id = ?");
            $stmt->bind_param("ssssi", $name, $account, $location, $fileName, $vendor_id);
            $stmt->execute();
            $stmt->close();
            header("location: vendorHomepage.php");
            exit;
        } else {
            echo "無法移動檔案至目標資料夾。";
        }
    } else {
        echo "檔案上傳錯誤：" . $_FILES['image']['error'];
    }

    $stmt = $conn->prepare("UPDATE pet.vendor SET name = ?, account = ?, company_location = ?, logo_image = ?, updated_at = NOW() WHERE vendor_id = ?");
    $stmt->bind_param("ssssi", $name, $account, $location, $fileName, $vendor_id);
    $stmt->execute();
    $stmt->close();
    header("location: vendorHomepage.php");
}

$vendorInfo = array(
    "商家編號" => $row['vendor_id'],
    "商家名稱" => $row['name'],
    "使用者帳號" => $row['account'],
    "商家地址" => $row['company_location'],
    "註冊時間" => $row['created_at'],
    "上次更新時間" => $row['updated_at']
);
?>
<!doctype html>
<html lang="en">

<head>
    <title>HTML樣式</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./homepage.css">
    <style>
        .container-frame {
            margin: 30px auto;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-content-center">
        <form method="POST" action="editHomepage.php" class="editForm" onsubmit="nosubmit(event)" enctype="multipart/form-data">
            <div class="container-frame row">
                <h2 class="page-title col-12">歡迎廠商 <?php echo "<span class='name'>" . $vendorInfo['商家名稱'] . "</span>" ?>，進入資料修改頁面</h2>
                <div class="circle">
                    <img src="./vendorLogo/<?php echo  $row['logo_image'] ?>" alt="vendorImage" class="header-img">
                    <input type="file" name="image">
                </div>
                <div class="row mt-5 col-12 offset-2">
                    <div class="col-8">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th><?php echo  "商家編號" ?></th>
                                    <td><?php echo $vendorInfo["商家編號"]; ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo "<span class='text-danger'>*</span>" . "商家名稱" ?></th>
                                    <td><input type="text" id="name" name="name" value="<?php echo $vendorInfo["商家名稱"]; ?>"></td>
                                </tr>
                                <tr>
                                    <th><?php echo "<span class='text-danger'>*</span>" . "使用者帳號" ?></th>
                                    <td><input type="text" id="account" name="account" value="<?php echo $vendorInfo["使用者帳號"]; ?>"></td>
                                </tr>
                                <tr>
                                    <th><?php echo "商家地址" ?></th>
                                    <td><input type="text" name="location" value="<?php echo $vendorInfo["商家地址"]; ?>"></td>
                                </tr>
                                <tr>
                                    <th><?php echo "註冊時間" ?></th>
                                    <td><?php echo $vendorInfo["註冊時間"]; ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo "上次更新時間" ?></th>
                                    <td><?php echo $vendorInfo["上次更新時間"]; ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="m-auto ">
                    <button type="submit" class="btn btn-dark editBtn mr-2">儲存</button>
                    <a type="button" href="vendorHomepage.php" class="cancelBtn btn btn-dark ml-2">取消</a>
                </div>
            </div>
        </form>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <script>
        const name = document.getElementById("name").value;
        const account = document.getElementById("account").value;
        console.log(name)

        function nosubmit(event) {
            event.preventDefault();
            const name = document.getElementById("name").value;
            const account = document.getElementById("account").value;
            console.log(name, account)
            if (name == '' || account == '') {
                alert("廠商名稱及使用者帳號禁止空白");
                return false;
            }
            document.querySelector(".editForm").submit();
        }
    </script>
</body>

</html>