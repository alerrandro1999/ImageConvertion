<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImageConvertion</title>
</head>
<body>
    
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">

    <input type="number" name="width" value="100">

    <button type="submit">Converter</button>
</form>
</body>
</html>

<?php

require __DIR__.'/../vendor/autoload.php';

use \App\File\ImageToText;

if (isset($_POST['width']) and isset($_FILES['image'])) {

    $obImageToText = new ImageToText($_FILES['image']['tmp_name']);

    $text = $obImageToText->getText($_POST['width']);
    echo '<pre>';
    print_r($text);
    echo '</pre>';

}
?>