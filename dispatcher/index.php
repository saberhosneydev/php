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
        $data = false;
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
            $data = scandir("articles");
        }
        function getFile($filename){
            $file = file_get_contents("articles/$filename");
            return json_decode($file, true);
        }
    ?>
    <?php if($data): ?>
        <div class="w-8/12 m-auto text-center lg:text-left">
        <?php for($i=2; $i < count($data); $i++): ?>
    <div class="article mt-5 mb-5 grid gap-4 grid-cols-3 lg:grid-cols-4">
        <img src="../assets/images/<?php echo getFile($data[$i])['image']; ?>" alt="" class="hover:opacity-75 rounded col-span-1 hidden lg:block">
        <div class="input-form  col-span-4 lg:col-span-3">
            <a href="/<?php echo getFile($data[$i])['slug']; ?>.html" class="text-xl text-blue-600"><?php echo getFile($data[$i])['title']; ?></a>
            <p class="text-sm text-blue-900">created at: <span><?php echo getFile($data[$i])['date']; ?></span> - Category: <span><?php echo getFile($data[$i])['category']; ?></span></p>
            <p class="text-md truncate"><?php echo getFile($data[$i])['content']; ?></p>
        </div>
    </div>
        <?php endfor; ?>
    </div>
        
    <?php endif; ?>

<?php include("layouts/footer.html");?>
</body>
</html>