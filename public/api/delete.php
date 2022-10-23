<?php
require_once './db.php';

$data = json_decode(file_get_contents("php://input"));

$sth = $dbh->prepare("DELETE FROM produkty WHERE id=$data");
$sth->execute();




 ?>
