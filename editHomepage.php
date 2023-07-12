<?php
session_start();
require_once('connect.php');
$account = $_SESSION['account'];
$password = $_SESSION['password'];
$stmt = $conn->prepare("SELECT * FROM vendor WHERE account = ? AND password = ? LIMIT 1");
$stmt->bind_param("ss", $account, $password);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


$vendorInfo = array(
    "商家編號" => $row['vendor_id'],
    "商家名稱" => $row['name'],
    "使用者帳號" => $row['account'],
    "商家地址" => $row['company_location'],
    "註冊時間" => $row['created_at'],
    "上次更新時間" => $row['updated_at']
);
?>

<head>
    <title>HTML樣式</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .header-img {
            width: 300px;
            height: 300px;
            margin: 0 auto;
            display: block;
            text-align: center;
        }

        .container-frame {
            border: 2px solid #ddd;
            border-radius: 20px;
            padding: 20px;
            margin-top: 30px;
            width: 70%;
        }

        .page-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .name {
            font-size: 40px;
        }
    </style>
</head>
<div class="container d-flex justify-content-center align-content-center">
    <div class="container-frame row">
        <h2 class="page-title col-12">歡迎廠商 <?php echo "<span class='name'>" . $vendorInfo['商家名稱'] . "</span>" ?>，登入後台管理系統</h2>
        <img src="./vendorLogo/vendorIcon18.png" alt="vendorImage" class="header-img col-6">
        <div class="row mt-5 col-12 offset-2">
            <div class="col-8">
                <table class="table">
                    <tbody>
                        <form action="">
                            <tr>
                                <th><?php echo  "商家編號" ?></th>
                                <td><?php echo $vendorInfo["商家編號"]; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo "<span class='text-danger'>*</span>" . "商家名稱" ?></th>
                                <td><input type="text" name="name" value="<?php echo $vendorInfo["商家名稱"]; ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo "<span class='text-danger'>*</span>" . "使用者帳號" ?></th>
                                <td><input type="text" value="<?php echo $vendorInfo["使用者帳號"]; ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo "商家地址" ?></th>
                                <td><input type="text" value="<?php echo $vendorInfo["商家地址"]; ?>"></td>
                            </tr>
                            <tr>
                                <th><?php echo "註冊時間" ?></th>
                                <td><?php echo $vendorInfo["註冊時間"]; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo "上次更新時間" ?></th>
                                <td><?php echo $vendorInfo["上次更新時間"]; ?></td>
                            </tr>
                        </form>


                    </tbody>
                </table>

            </div>
        </div>
        <div class="m-auto ">
            <button class=" btn  btn-dark editBtn mr-2">儲存</button>
            <button class="btn  btn-dark editBtn ml-2">取消</button>
        </div>

    </div>
</div>