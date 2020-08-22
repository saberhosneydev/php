<?php
$data = scandir("articles");
function getFile($filename){
    $file = file_get_contents("articles/$filename");
    return json_decode($file, true);
}

?>
<?php if(count($data) > 2): ?>
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
        <?php else: ?>
            <div class="w-8/12 m-auto text-center">
                <p class="text-xl text-purple-900">Haven't posted anything yet; check back later, plz?</p>
            </div>
    <?php endif; ?>