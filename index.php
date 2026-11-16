<?php

include_once "config.php";
include_once "fonctions.php";

$patients=[
    ["id"=>1,"nom"=>"Benali Sara","age"=>70,"code_service"=>"CARDIO","urgence"=>"ROUGE"],
    ["id"=>2,"nom"=>"Trabelsi Ahmed","age"=>45,"code_service"=>"DERMA","urgence"=>"ORANGE"],
    ["id"=>3,"nom"=>"Jlassi Amina","age"=>8,"code_service"=>"PEDIATRIE","urgence"=>"VERT"],
    ["id"=>4,"nom"=>"Ayari Karim","age"=>68,"code_service"=>"CARDIO","urgence"=>"VERT"],

];

$urgent=filtrerUrgence($patients);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Patients</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Liste des Patients</h1>
    <div>
        <?php foreach($patients as $p):?>
            <?php
            $badge = getBadgeService($p["code_service"]);
            $libelle = getLibelleUrgence($p["urgence"]);
            $facture = calculerFacture($p["age"],TARIF_BASE_CONSULTATION);
            ?>
            <article>
                <h2><?=$p["nom"]?> (<?=$p["age"]?>)</h2>
                <span>
                    <?=$badge["libelle"]?>
                </span>
                <p><strong>Niveau d'urgence: </strong><?=$libelle?></p>
                <p><strong>Facture estimée: </strong><?=$facture?></p>
            </article>
        <?php endforeach;?>
    </div>

    <section>
        <h2>Récapitulatif</h2>
        <p><strong>Nombre total de patients: </strong><?=count($patients)?></p>
        <h3>Urgences Absolues (ROUGE)</h3>
        <ul>
        <?php foreach($urgent as $u):?>
            <?php $b=getBadgeService($u["code_service"]);?>
            <li><?=$u["nom"]?> - <?=$b["libelle"]?></li>
        <?php endforeach;?>
        </ul>
    
    </section>
    
</body>
</html>