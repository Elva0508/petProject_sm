<?php
session_start();
require_once('connect.php');
$account = $_POST['account'];
$password = $_POST['password'];

// 使用預處理語句來處理資料，並通過 bind_param 方法將 $account 和 $password 綁定到查詢中的佔位符。這樣可以避免 SQL 注入攻擊。
$stmt = $conn->prepare("SELECT * FROM vendor WHERE account = ? AND password = ? LIMIT 1");
$stmt->bind_param("ss", $account, $password);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) { ?>
    <?php $_SESSION['account'] = $account ?>
    <?php $_SESSION['password'] = $password ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>


        <style>
            dialog {
                width: 400px;
                height: 250px;
                margin-top: 5rem;
                box-shadow: 1px 1px 10px gray;
            }
        </style>
    </head>

    <body>

        <dialog>
            <h1>登入成功，跳轉中</h1>
        </dialog>

        <script>
            const dialog = document.querySelector("dialog");
            const open = document.querySelector(".open");
            const close = document.querySelector(".close");
            dialog.showModal();

            close.addEventListener("click", (e) => {
                dialog.close();
            });
        </script>
    </body>


    </html>
<?php echo '<script>setTimeout(function() { window.location = "vendorHomepage.php"; }, 1500);</script>';
} else {
    // 登入失敗
    echo "<span class='text-danger'>帳號或密碼輸入錯誤，請重新確認</span>";
} ?>