<?php
$arquivo = 'imagemTeste2.png';
$width = 300;
$heigth = 300;
list($originalWidth, $originalHeight) = getimagesize($arquivo);
$ratio = $originalWidth / $originalHeight;
$ratioDest = $width / $heigth;
$finalWidth = 0;
$finalHeigth = 0;
$finalX = 0;
$finalY = 0;
if ($ratioDest > $ratio) {
    $finalWidth = $heigth * $ratio;
    $finalHeigth = $heigth;
} else {
    $finalHeigth = $width / $ratio;
    $finalWidth = $width;
}
if ($finalWidth < $width) {
    $finalWidth = $width;
    $finalHeigth = $width / $ratio;
    $finalY = - (($finalHeigth - $heigth) / 2);
} else {
    $finalHeigth = $heigth;
    $finalWidth = $heigth * $ratio;
    $finalX = - (($finalWidth - $width) / 2);
}
$imagem = imagecreatetruecolor($width, $heigth);
$originalImage = imagecreatefrompng($arquivo);
imagecopyresampled(
    $imagem,
    $originalImage,
    $finalX,
    $finalY,
    0,
    0,
    $finalWidth,
    $finalHeigth,
    $originalWidth,
    $originalHeight
);
imagejpeg($imagem, 'nova_imagem.jpg', 100);