<?php 
$filename = "";
 if(isset($_GET['date']) && isset($_GET['slug'])){
    $filename = $_GET['date']."_".$_GET['slug'].".json";
    $temp = scandir("articles");
    if(array_search($filename, $temp)){
        $data = file_get_contents("articles/$filename");
        $data = json_decode($data, true);
        foreach($data as $key => $value){
            echo $value;
        }
    }else {
        include("pages/404.html");
    }
 }else {
     include("pages/404.html");
 }
?>