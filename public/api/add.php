<?php
// if($_SERVER['REQUEST_METHOD'] != 'POST') return;


require_once('../db.php');

$dane = json_decode(file_get_contents('php://input'));

$sku = isset($dane->sku) ? $dane->sku : null;
$nrkatalog = isset($dane->nrkatalog) ? $dane->nrkatalog : null;
$obraz = isset($dane->obraz) ? $dane->obraz : null;
$title = isset($dane->title) ? $dane->title : null;
$opis = isset($dane->opis) ? $dane->opis : null;
$producent = isset($dane->producent) ? $dane->producent : null;
$kategoria = isset($dane->kategoria) ? $dane->kategoria : null;
$podkategoria = isset($dane->podkategoria) ? $dane->podkategoria : null;
$barkody = isset($dane->barkody) ? $dane->barkody : null;
$quality = isset($dane->quality) ? $dane->quality : null;
$cena = isset($dane->cena) ? $dane->cena : 0;
$cena = $cena == '' ? 0 : $cena;
$cenapromo = isset($dane->cenapromo) ? $dane->cenapromo : 0;
$quantitystore = isset($dane->quantitystore) ? $dane->quantitystore : 0;


$query = "INSERT INTO `produkty` (`id`, `sku`, `nrkatalog`, `obraz`, `title`, `opis`, `producent`, `kategoria`, `podkategoria`, `barkody`, `quality`, `cena`, `cenapromo`, `quantitystore`) VALUES (NULL, '$sku', '$nrkatalog', '$obraz', '$title', '$opis', '$producent', '$kategoria', '$podkategoria', '$barkody', '$quality', $cena, $cenapromo, $quantitystore)";

echo $query;

echo "<br>";
echo "<br>";
echo "<br>";


$sth = $dbh->prepare($query);
if ($sth->execute() == false) {
    echo 'error';
}
?>



