<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
//    $allowed = array('jpg', 'jpeg', 'mp4', 'png');
//    
//    if (in_array($fileActualExt, $allowed)){
//        if ($fileError === 0) {
//            $fileNameNew = uniqid('', true).".".$fileActualExt;
//            $fileDest = 'uploads/'.$fileNameNew;
//            move_uploaded_file($fileTmpName, $fileDest);
//            header("Location: index.php?success=1");
//        }else {
//            echo "error in fileErrror";
//        }
//    }else {
//        echo "Error in EXT";
//    }
// ABOVE code is used to upload a filtered extensions ^^
    
        if ($fileError === 0) {
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDest = 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDest);
            header("Location: index.php?msg=0");
        }else {
            header("Location: index.php?successmsg=1");
        }
}

?>
