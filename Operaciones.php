<?php

class Operaciones {
    static function sumar(Numero $a, Numero $b){
        $carry = "0"; $result = ""; $auxA = $a->getValor(); $auxB = $b->getValor(); $suma = 0;    
        if(Operaciones::mayor($a, $b)){
            $auxB = Operaciones::rellenarCeros($b, strlen($a-getValor()));
        }
        if(Operaciones::mayor($b, $a)){
            $auxA = Operaciones::rellenarCeros($a, strlen($b-getValor()));
        }
        for ($i = max(strlen($a->getValor()), strlen($b->getValor())) - 1; $i > 0 ; $i--) { 
            $suma = (int)$auxA[$i] + (int)$auxB[$i] + (int)$carry;
            if($suma > 9){
                $carry = "1";
                $resultado += (string)($suma % 10);
            } else {
                $carry = "0";
                $resultado += (string)$suma;
            }
        }
        if($carry == "1") $resultado += $carry;
        return strrev($resultado);
    }

    static function rellenarCeros(Numero $a, $cantidad){
        $resultado = "";
        for ($i=0; $i < $cantidad - strlen($a->getValor()); $i++) { 
            $resultado += "0";
        }
        return $resultado += $a->getValor();
    }

    static function mayor(Numero $a, Numero $b){
        return strlen($a->getValor()) > strlen($b->getValor());  
    }
}