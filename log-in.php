<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <h1 class="mt-5">廠商後臺登入</h1>
    <form onsubmit="checkSubmit(event)" method="POST" action="do-log-in.php">
        <div class="mb-3">
            <label for="account" class="form-label">使用者帳號</label>
            <input type="text" name="account" class="account form-control" id="account" placeholder="請輸入使用者帳號">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">密碼</label>
            <input type="password" name="password" class="password form-control" id="password" placeholder="請輸入密碼">
        </div>
        <div class="submitAlert"></div>
        <button type="submit" class="submitBtn btn btn-primary">登入</button>

        <a type="submit" class="btn btn-primary" href="sign-up.php">註冊</a>
    </form>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script>
        console.log(account, password)

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