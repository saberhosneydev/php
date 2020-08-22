<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaberHosneyDev's Blog</title>
    <link rel="stylesheet" href="/assets/css/output.css">
    <link rel="stylesheet" href="/assets/css/icons.css">
    <meta name="title" content="Saber Hosney - About">
<meta name="description" content="SaberHosneyDev personal website, you can find information, tips, articles, and more !">

<meta property="og:type" content="website">
<meta property="og:url" content="https://shdev.codes/">
<meta property="og:title" content="Saber Hosney - About">
<meta property="og:description" content="SaberHosneyDev personal website, you can find information, tips, articles, and more !">
<meta property="og:image" content="https://shdev.codes/images/debuger.png">

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://shdev.codes/">
<meta property="twitter:title" content="Saber Hosney - About">
<meta property="twitter:description" content="SaberHosneyDev personal website, you can find information, tips, articles, and more !">
<meta property="twitter:image" content="https://shdev.codes/images/debuger.png">
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
                    include("article.php");
                    break;
                case 'home':
                    include("home.php");
                    break;
                default:
                    include("pages/404.html");
                    break;
            }
        }else {
            $data = scandir("articles");
        }
    ?>

<?php include("layouts/footer.html");?>
</body>
</html>