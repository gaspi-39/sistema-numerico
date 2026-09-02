<?php

require_once "./Numero.php";
require_once "./Operaciones_Auxiliares.php";
require_once "./Operaciones.php";
require_once "./Entero.php";

$in = "";
while($in != "0"){
    $in = Menu::menuInicial();
    switch ($variable) {
        case '1':
            [$natA, $natB] = Menu::menuInput();
            $c = $natA->suma($natB);
            break;
        case "2":
            // restar
            break;
                    
        default:
            # code...
            break;
    }



}

