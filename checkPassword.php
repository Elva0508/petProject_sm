<?php
require_once('connect.php');
if (isset($_POST['password']) && isset($_POST['rePassword'])) {
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];
    if($password != $rePassword){
        echo "<span class='alertPassword text-danger'>*輸入的密碼不一致</span>";
    }
    
}
?>