<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/uikit.min.css">

    <title>Hello, world!</title>
    <style>
        html {
            background-color: #eee;
        }

    </style>
</head>

<body>
    <!--
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" class="form-control-file" name="file">
    <button class="button" type="submit" name="submit">Upload</button>
</form>
-->

    <div class="uk-margin" uk-margin>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div uk-form-custom="target: true">
                <input type="file" name="file">
                <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
            </div>
            <button class="uk-button uk-button-default" type="submit" name="submit">Upload</button>
        </form>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script>
        function notifs() {
            UIkit.notification({
                message: 'Uploaded Successfully !',
                status: 'success',
                pos: 'top-right',
                timeout: 5000
            });
        }

        function notiff() {
            UIkit.notification({
                message: 'Upload Failed !',
                status: 'danger',
                pos: 'top-right',
                timeout: 5000
            });
        }

    </script>
    <?php
        
            if($_GET['msg']=="0"){
                echo "<script>notifs()</script>";
            }elseif ($_GET['msg']=="1"){
                 echo "<script>notiff()</script>";
            }
        
        ?>
</body>

</html>
