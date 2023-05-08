<?php
error_reporting(E_ALL);
ini_set("display_errors", "Off");
require __DIR__ . '/../vendor/autoload.php';

use \App\File\ImageToText;

$textarea = '';
if (isset($_FILES['image']) && !empty($_FILES['image'])) {

    if ($_FILES['image']['type'] == 'video/mp4') {
        $erro = '<div class="erro">
                    <p>Apenas Imagens</p>
                 </div>';
    } else {
        $obImageToText = new ImageToText($_FILES['image']['tmp_name']);
        $text = $obImageToText->getText(100);
        $textarea = '<div>
                        <textarea id="textarea" cols="120" rows="25" style="width: 100%; height: 100%; font-family: monospace; text-align: center;">' . $text . '</textarea>
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
    <link rel="icon" type="image/png" href="imagem/ascii.png" />
    <meta name="author" content="Alerrandro Borges de Almeida">
    <meta name="description" content="site para converter imagens para ascii">
    <meta name="keywords" content="imagens, conversor, ascii, arte ASCII, arte de texto">
    <meta name="copyright" content="© 2023 Alerrandro Borges de Almeida" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1251593574340280" crossorigin="anonymous"></script>
    <title>Image Converter</title>
</head>

<body>
    <main>
        <div class="container-imagem">
            <img src="imagem/git.png" alt="git hub" width="250">
        </div>
        <p class="texto-longo">Se você está procurando uma maneira de transformar suas imagens favoritas em algo novo e único, você veio ao lugar certo. Com nossa ferramenta, você pode converter qualquer imagem em uma obra de arte ASCII impressionante em apenas alguns cliques.</p>
        <p class="texto-curto">Preferencialmente imagens de tom cinza.</p>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container-form">
                <div class="container-input">
                    <input id="image" onsubmit="Checkfiles(this)" type="file" name="image" accept="image/*" aria-label="imagem" required>
                </div>
                <div class="container-button">
                    <button type="submit">Converter</button>
                    <!-- <button type="button" id="copiar">Copiar ASCII</button> -->
                    <?= $textarea === '' ? '' : '<button type="button" id="copiar">Copiar ASCII</button>' ?>
                </div>
            </div>
            <?= $textarea ?? ''  ?>
        </form>
        <?= $erro ?? '' ?>
    </main>
</body>

<script>
    document.getElementById("copiar").addEventListener("click", function() {
        var textarea = document.getElementById("textarea");
        textarea.select();
        document.execCommand("copy");
    });
</script>

</html>