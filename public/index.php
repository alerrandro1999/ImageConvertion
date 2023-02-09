<?php
require __DIR__ . '/../vendor/autoload.php';

use \App\File\ImageToText;
?>
<!DOCTYPE html>
<html lang="en">

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
    <header>
        <div class="container-texto">
            <h1>ImageConvertion</h1>
            <h2>Convertar imagem para textos</h2>
            <p>Nossa conversão e ilimitada, recomendamos imagens com uma cor mais cinza, imagens coloridas não ficam satisfatoria, cada pixel da imagem e mudado conforme a sua intensidade. Sendo os caracteres que compoem as imagens depois de convertidas '#', '=', '%', '*'. E um espaço em branco " ". </p>
            <img src="imagem/git.png" alt="" width="80">
            <img src="imagem/php.png" alt="" width="150">

        </div>
    </header>
    <main>
        <div class="container-form">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <div>
                        <label for="">Imagem:</label>
                    </div>
                    <input type="file" name="image">
                </div>

                <div>
                    <div>
                        <label for="">Quantidade de linhas:</label>
                    </div>
                    <input type="number" name="width" value="100">
                </div>

                <button type="submit">Converter</button>

                <div>
                    <textarea name="" id="" cols="150" rows="30" style="width: 100%; height: 100%; font-family: monospace; text-align: center;"><?php
                                                                                                                                                if (isset($_POST['width']) and isset($_FILES['image'])) {
                                                                                                                                                    $obImageToText = new ImageToText($_FILES['image']['tmp_name']);
                                                                                                                                                    echo $text = $obImageToText->getText($_POST['width']);
                                                                                                                                                } ?></textarea>
                </div>
            </form>
        </div>
    </main>
</body>

</html>