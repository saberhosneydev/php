<?php 
$json = "";
 if(isset($_GET['date']) && isset($_GET['slug'])){
    $filename = $_GET['date']."_".$_GET['slug'].".json";
    $temp = scandir("articles");
    if(array_search($filename, $temp)){
        $data = file_get_contents("articles/$filename");
        $json = json_decode($data, true);
    }else {
        include("pages/404.html");
    }
 }else {
     include("pages/404.html");
 }
?>
<div class="blog-post w-8/12 m-auto mt-5">
    <img src="/assets/images/<?php echo $json['image'] ?>" style="height:400px;width:100%;" alt="">
    <div class="text-center mt-2 mb-2">
    <h1 class="text-2xl text-purple-800"><?php echo $json['title'] ?></h1>
    <p class="text-md text-blue-900">created at: <span><?php echo $json['date'] ?></span> - Category: <span><?php echo $json['category'] ?></span> - by: <span><?php echo $json['author'] ?></span></p>
    </div>
    <p class="text-gray-700 p-2 pb-5">
    <?php echo str_replace("\n", "<br>", $json['content']) ?>
    </p>
</div>