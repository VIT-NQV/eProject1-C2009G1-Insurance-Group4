<?php
require_once('../session/initialize.php');
require_once('../database/database1.php');
$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

function checkForm(){
    global $errors;
    $username = $_POST['username'];
    $password = sha1($_POST['pwd']);
    if(empty($_POST['username'])){
        $errors[] = 'Bạn cần nhập tài khoản';
    }

    if(empty($_POST['pwd'])){
        $errors[] = 'Bạn cần nhập mật khẩu';
    }

    if(!empty($_POST['username']) &&  !empty($_POST['pwd'])){
        if(!check_login($username, $password)){
            $errors[] = 'Tài khoản hoặc mật khẩu của bạn không chính xác';
        }
    }
}
if($_SERVER["REQUEST_METHOD"] == 'POST') {
    checkForm();
    if (isFormValidated()){
        //save username to session
        $username = isset($_POST['username'])? $_POST['username']: '';

        $_SESSION['username'] = $username;
        
        redirect_to('index1.php');
    }
} else { //form load
    
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/error.css">
    <style>
        .form{
            padding: 10% 25%;
            width: 80%;
        }
        .form2{
            padding: 1% 5%;
            text-align:center;
        }
        .navbar{
            background-color: rgb(107, 194, 107);
        }
    </style>
</head>
<body>
<div class="container form">

    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isFormValidated()): ?> 
        <div class="error">
            <span> Hãy sửa các lỗi sau: </span>
            <ul>
                <?php
                foreach ($errors as $key => $value){
                    if (!empty($value)){
                        echo '<li>', $value, '</li>';
                    }
                }
                ?>
            </ul>
        </div><br><br>
    <?php endif; ?>
    
    <nav class="navbar">
        <form  action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <h1 style="text-align: center;">Login</h1><br>
            <div class="input-group form2">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" name="username" 
                value="<?php echo isFormValidated()? '': $_POST['username'] ?>"
                placeholder="Tài khoản">
            </div>

            <div class="input-group form2">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" name="pwd" 
                value="<?php echo isFormValidated()? '': $_POST['pwd'] ?>"
                placeholder="Mật khẩu">
            </div>
            <div class="form2">
                <input type="submit" class="btn btn-info" value="Đăng nhập">
            </div>

        </form>
    </nav>
</div>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>