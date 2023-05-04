<?php
// error_reporting(E_ALL);
// ini_set("display_errors","Off");
require __DIR__ . '/../vendor/autoload.php';

use \App\File\ImageToText;

if (isset($_FILES['image']) && !empty($_FILES['image'])) {

    if ($_FILES['image']['type'] == 'video/mp4') {
        $erro = '<div class="erro">
                    <p>Apenas Imagens</p>
                 </div>';
    } else {
        $obImageToText = new ImageToText($_FILES['image']['tmp_name']);
        $text = $obImageToText->getText(100);
        $textarea = '<div>
                        <textarea name="" id="" cols="150" rows="30" style="width: 100%; height: 100%; font-family: monospace; text-align: center;">' . $text . '</textarea>
                    </div>';
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100&display=swap" rel="stylesheet">
    <title>ImageConvertion</title>
</head>

<body>
    <main>
        <div class="container-imagem">
            <img src="imagem/git.png" alt="git hub" width="250">
        </div>
        <p>Preferencialmente imagens de tom cinza.</p>
        <div class="container-form">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <input id="image" onsubmit="Checkfiles(this)" type="file" name="image" accept="image/*" required>
                </div>
                <button type="submit">Converter</button>
                <?= $textarea ?? ''  ?>
            </form>
        </div>
        <?= $erro ?? '' ?>

    </main>
</body>

</html>