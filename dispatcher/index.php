<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/output.css">
    <link rel="stylesheet" href="/assets/css/icons.css">
</head>
<body>
    <?php include("layouts/header.html");?>
    <?php 
        if(isset($_GET['page'])){
            switch ($_GET['page']) {
                case 'about':
                    include("pages/about.html");
                    break;
                case 'article':
                    require("article.php");
                    break;
                default:
                    include("pages/404.html");
                    break;
            }
        }else {
            include("layouts/body.html");
        }
    ?>
<?php include("layouts/footer.html");?>
</body>
</html>