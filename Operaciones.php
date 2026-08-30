<?php
class Operaciones {
    public static function sumar(Numero $a, Numero $b){
        $carry = "0";
        $resultado = "";
        $auxA = $a->getValor();
        $auxB = $b->getValor();
        $longitudA = strlen($a->getValor());
        $longitudB = strlen($b->getValor());

        $suma = 0;    

        if($longitudA > $longitudB){
            $auxB = Operaciones::rellenarCeros($b, $longitudA);
        }
        if($longitudA < $longitudB){
            $auxA = Operaciones::rellenarCeros($a, $longitudB);
        }
        for ($i = max($longitudA, $longitudB) - 1; $i >= 0 ; $i--) { 
            $suma = (int)$auxA[$i] + (int)$auxB[$i] + (int)$carry;
            if($suma > 9){
                $carry = "1";
                $resultado .= (string)($suma % 10);
            } else {
                $carry = "0";
                $resultado .= (string)$suma;
            }
        }
        if($carry == "1"){
            $resultado .= $carry;
        }
        return strrev($resultado);
    }     
    public static function rellenarCeros(Numero $a, int $cantidad){
        $resultado = "";
        for ($i=0; $i < $cantidad - strlen($a->getValor()); $i++) {
            $resultado .= "0";
        }
        return $resultado .= $a->getValor();
    }
    public static function comparar(Numero $a, Numero $b){
        // retorna 1 si a > b, -1 si a < b, 0 si a = b
     $signoA = $a->getSigno();
     $signoB = $b->getSigno();
     $longitudA = strlen($a->getValor());
     $longitudB = strlen($b->getValor());
     $resultado = 0;
     if ($signoA == "-" && $signoB == "+")
        return 1;
     if ($signoA == "+" && $signoB == "-")
        return -1;
     if ($longitudA > $longitudB){
        $resultado = 1;
     }elseif ($longitudA < $longitudB){
        $resultado = -1;
     } else
        $resultado = 0;
     $i = 0;
     while($i < $longitudA && $resultado == 0){
        if ($a->getValor()[$i] > $b->getValor()[$i]){
            $resultado = 1;
        }
        if ($a->getValor()[$i] < $b->getValor()[$i]){
            $resultado = -1;
        }
        $i++;
     }
     if ($signoA == "+"){
        return $resultado;
     }
     return -$resultado;
    }
    public static function restar(Numero $a, Numero $b){
        $auxA = $a->getValor();
        $auxB = $b->getValor();
        $longitudA = strlen($a->getValor());
        $longitudB = strlen($b->getValor());
        $prestamo = 0;
        $resultado = "";
        $comparacion = Operaciones::comparar($a, $b);

        if ($comparacion == -1){
            throw new Exception("Error: No puede restar un numero mas grande que A.");
        }
        if($longitudA > $longitudB){
            $auxB = Operaciones::rellenarCeros($b, strlen($a->getValor()));
        }

        for($i = $longitudA - 1; $i >= 0; $i--){
            $digitoA = (int)$auxA[$i];
            $digitoB = (int)$auxB[$i];

            $digitoA -= $prestamo;

            if($digitoA < $digitoB){
                $digitoA += 10;
                $prestamo = 1;
            } else {
                $prestamo = 0;
            }
            $diferencia = $digitoA - $digitoB;
            $resultado .= (string)$diferencia;
        }
        $resultado = strrev($resultado);
        $i = 0;
        while($i < strlen($resultado) && $resultado[$i] == "0"){
            $i++;
        }
        if($resultado == "0"){
            return "0";
        }
        $resultado = substr($resultado, $i);
        return $resultado;
    }
}