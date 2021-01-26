<?php

$pdo = new PDO('mysql:dbname=tutoriel;host=localhost;port=5432','root','tiger',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE tutoriels');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

for($i=1; $i<=10; $i++){
    $titre = "Titre numero $i";
    $contenu = "le contenu numero $i";
    $pdo->exec("INSERT INTO tutoriels SET titre='$titre', contenu='$contenu'");
}

?>