<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .card {
            width: 400px;
            height: 400px;
            /* background-color:antiquewhite; */
            margin: 0 auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }

        input {
            width: 200px;
            height: 50px;
        }
        .btns{
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="card mt-5">
        <div class="card-body d-flex flex-column ">
            <h1 class="card-title text-center">廠商後臺登入</h1>
            <form onsubmit="checkSubmit(event)" method="POST" action="vendor-do-login.php">
                <div class="my-3">
                    <label for="account" class="form-label">使用者帳號</label>
                    <input type="text" name="account" class="account form-control" id="account" placeholder="請輸入使用者帳號">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">密碼</label>
                    <input type="password" name="password" class="password form-control" id="password" placeholder="請輸入密碼">
                    <div class="submitAlert mb-3">
                        <?php
                        session_start();

                        // 检查是否有错误消息
                        if (isset($_SESSION['login_error'])) {
                            $error_message = $_SESSION['login_error'];
                            // 输出错误消息
                            echo "<span class='text-danger'>$error_message</span>";
                            // 清除错误消息
                            unset($_SESSION['login_error']);
                        }
                        ?>
                    </div>
                </div>
                <div class="btns">
                    <button type="submit" class="submitBtn btn btn-lg btn-primary ">登入</button>

                    <a type="submit" class="btn btn-primary btn-lg  ms-2" href="vendor-signup.php">註冊</a>
                </div>

            </form>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script>
        function checkSubmit(event) {
            event.preventDefault();
            const account = document.querySelector(".account").value
            const password = document.querySelector(".password").value
            if (account == '' || password == '') {
                let submitAlert = document.querySelector(".submitAlert")
                submitAlert.innerHTML = "<span class='text-danger'>請輸入帳號及密碼</span>"
                return false
            }
            document.forms[0].submit();
        }
    </script>
</body>

</html>