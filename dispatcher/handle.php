<?php
 session_start();
 if($_SERVER['REQUEST_URI'] == '/dashboard.html'){
    if(!$_SESSION['logged']){
        header("Location: /login.html");
    }
 }

 if($_SERVER['REQUEST_METHOD'] === "POST"){
     if(function_exists($_GET['operation'])) {
        $_GET['operation']();
     }
 }
 function login(){
    if(isset($_POST['login'])) 
    { 
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(($username != "" && $password != "") && ($username == "adminshd" && $password == "SABER@amal123")){
            $_SESSION['logged'] = true;
            header("Location: /dashboard.html");
        }else {
            header("Location: /login.html");
        }
    }
 }
 function logout(){
    if(isset($_POST['logout'])){
        
        session_unset();
        session_destroy();
        header("Location: /login.html");
    }
 }
 

?>
<?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] != '/login.html' && $_SERVER['REQUEST_URI'] != '/dashboard.html'):?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaberHosneyDev's Blog</title>
    <link rel="stylesheet" href="/media/css/output.css">
</head>
<body>
    <?php include("layouts/header.html");include("pages/404.html");include("layouts/footer.html");?>
</body>
</html>
<?php endif; ?>
