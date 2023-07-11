

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
    <div class="container">
        <h1 class="mt-5">廠商會員註冊</h1>
        <form onsubmit="noSubmit(event)" action="do-sign-up.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label"><span style="color:red">*</span>公司名稱</label>
                <input type="text" class=" form-control" id="name" name="name" placeholder="請輸入公司名稱">
                <div class=" m-1"><span class="nameAlert text-danger"></span></div>
            </div>
            <div class="mb-3">
                <label for="account" class="form-label"><span style="color:red">*</span>使用者帳號</label>

                <input type=" text" class=" form-control mb-1" id="account" name="account" placeholder=" 請輸入使用者帳號">
                <button type="button" class="checkBtn btn btn-primary">檢查</button>
                <span class="check"></span>


            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><span style="color:red">*</span>密碼</label>
                <input type="password" class=" form-control" id="password" name="password" placeholder="請輸入密碼">
            </div>
            <div class="mb-3">
                <label for="rePassword" name="rePassword" class="form-label"><span style="color:red">*</span>再次輸入密碼</label>
                <input type="password" class=" form-control" id="rePassword" placeholder="請再次輸入密碼">
                <div class=" m-1"><span class="submitAlert text-danger"></span></div>
            </div>

            <button type="submit" class="btn btn-primary">註冊</button>
            <button type="button" class="btn btn-primary">重設</button>
        </form>


    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <Script>
        console.log(document.querySelector(".check").innerHTML == "")

        function checkUser() {
            var account = document.getElementById('account').value;
            if (account == '') {
                document.querySelector(".check").innerHTML = "請輸入使用者帳號"

            } else {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "checkUser.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = xhr.responseText;
                        var checkTextContainer = document.querySelector(".check");
                        checkTextContainer.innerHTML = response;
                    }
                };
                var data = "account=" + encodeURIComponent(account);
                xhr.send(data)
            }
        }
        const checkBtn = document.querySelector(".checkBtn");
        checkBtn.addEventListener("click", checkUser)

        function checkPassword() {
            const password = document.getElementById("password").value;
            const rePassword = document.getElementById("rePassword").value;
            if (password !== rePassword) {
                const submitAlert = document.querySelector(".submitAlert");
                submitAlert.innerHTML = "輸入的密碼不一致";
                return false;
            } else {
                const submitAlert = document.querySelector(".submitAlert");
                submitAlert.innerHTML = "";
                return true;
            }
        }



        function noSubmit(event) {

            event.preventDefault();
            const name = document.getElementById("name").value

            if (name == '') {
                document.querySelector(".nameAlert").innerHTML = "公司名稱不可為空"
                return false;
            } else if (document.getElementById("password").value == '' || document.getElementById("rePassword").value == '') {
                document.querySelector(".submitAlert").innerHTML = "密碼欄不可為空"
                return false;
            }
            if (document.querySelector(".checkText") != null) {
                const checkText = document.querySelector(".checkText")
                if (checkText.textContent == "使用者帳號已存在") {
                    alert("請輸入其他使用者帳號");
                    return false;
                }
            }
            if (document.querySelector(".check").innerHTML == "") {
                alert("請先檢查帳號是否重複");
                return false;
            }
            if (document.querySelector(".check").innerHTML == "請輸入使用者帳號") {
                alert("請輸入使用者帳號");
                return false;
            }
            if (!checkPassword()) {
                return false;
            }
            document.forms[0].submit(); // 手動提交表單
        }
    </Script>
</body>

</html>