<?php
class Menu {
    public static function menuInicial(){
        echo "Sistema Numerico \n";
        echo "1. Sumar\n";
        echo "2. Restar\n";
        echo "3. Multiplicar\n";
        echo "4. Dividir\n";
        echo "0. Exit\n";
        $input = readline("Ingrese una opcion: \n");
        return $input;
    }

    public static function menuInput(){
        echo "Ingrese digito A \n";
        $natA = new Natural(readline());
        echo "Ingrese digito B \n";
        $natB = new Natural(readline());

        $output = [$natA, $natB];
        return $output;
    }
}