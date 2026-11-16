<?php

function calculerFacture(int $age, float $tarif): float{
    if($age<65){
        $tarifFinal=$tarif;
    }else{
        $tarifFinal = $tarif + $tarif*20/100;
    }
    return $tarifFinal;
}

function getBadgeService(string $code): array{
    switch ($code){
        case "CARDIO":
            return ["libelle"=>"Cardiologie", "classe"=>"badge-CARDIO"];
        case "DERMA":
            return ["libelle"=>"Dermatologie", "classe"=>"badge-Derma"];
        case "PEDIATRIE":
            return ["libelle"=>"Pédiatrie", "classe"=>"badge-PEDIATRIE"];
    }
}

function filtrerUrgence(array $patients):array{
    return array_values(
        array_filter(
            $patients, fn(array $p): bool => $p["urgence"]==="ROUGE"
        )
    );
}

function getLibelleUrgence(string $code):string{
    switch($code){
        case "ROUGE":
            return "Urgence absolue";
        case "ORANGE":
            return "Urgence relative";
        case "VERT":
            return "Consultation standard";
    }
}

?>