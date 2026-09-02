<?php
require_once "./Utils.php";
class Operaciones
{
    public static function suma(Numero $a, Numero $b)
    {
        $carry = "0";
        $resultado = "";
        $auxA = $a->getValor();
        $auxB = $b->getValor();
        $longitudA = strlen($a->getValor());
        $longitudB = strlen($b->getValor());
        $signoA = $a->getSigno();
        $signoB = $b->getSigno();
        $suma = 0;

        if ($signoA == $signoB) {
            if ($longitudA > $longitudB) {
                $auxB = Utils::rellenarCeros($b, $longitudA);
            }
            if ($longitudA < $longitudB) {
                $auxA = Utils::rellenarCeros($a, $longitudB);
            }
            for ($i = max($longitudA, $longitudB) - 1; $i >= 0; $i--) {
                $suma = (int) $auxA[$i] + (int) $auxB[$i] + (int) $carry;
                if ($suma > 9) {
                    $carry = "1";
                    $resultado .= (string) ($suma % 10);
                } else {
                    $carry = "0";
                    $resultado .= (string) $suma;
                }
            }
            if ($carry == "1") {
                $resultado .= $carry;
            }
            $resultado .= $signoA;
            return strrev($resultado);
        } else{
            $resultadoValorAbsoluto = Utils::compararValorAbsoluto($a, $b);
            switch ($resultadoValorAbsoluto) {
                case 1:
                    $resultado .= $signoA;
                    $resultado .= Operaciones::resta($a, $b);
                    break;
                case -1:
                    $resultado .= $signoB;
                    $resultado .= Operaciones::resta($b, $a);
                    break;
                default:
                $resultado .= "+";
                    $resultado = "0";
            }
            return $resultado;
        }
    }
    public static function resta(Numero $a, Numero $b)
    {
        $auxA = $a->getValor();
        $auxB = $b->getValor();
        $longitudA = strlen($a->getValor());
        $longitudB = strlen($b->getValor());
        $signoA = $a->getSigno();
        $signoB = $b->getSigno();
        $prestamo = 0;
        $resultado = "";
        if($signoA == $signoB){
            if($signoA == "+"){
                $resultadoValorAbsoluto = Utils::compararValorAbsoluto($a,$b);
                switch ($resultadoValorAbsoluto) {
                    case 1:
                        //llamar a resta
                        break;
                    case -1:
                        # code...
                    break;
                    default:
                        # code...
                        break;
                }
            } else{
                //resta y signo del num de mayor magnitud inverso
            }
        } else{
            if($signoA == "+"){
                //llamo a suma y signo = signoA
            } else{
                //llamo a suma y signo = signoA
            }
        }
        if ($longitudA > $longitudB) {
            $auxB = Utils::rellenarCeros($b, strlen($a->getValor()));
        }
        for ($i = $longitudA - 1; $i >= 0; $i--) {
            $digitoA = (int) $auxA[$i];
            $digitoB = (int) $auxB[$i];

            $digitoA -= $prestamo;

            if ($digitoA < $digitoB) {
                $digitoA += 10;
                $prestamo = 1;
            } else {
                $prestamo = 0;
            }
            $diferencia = $digitoA - $digitoB;
            $resultado .= (string) $diferencia;
        }
        $resultado = strrev($resultado);
        $i = 0;
        while ($i < strlen($resultado) && $resultado[$i] == "0") {
            $i++;
        }
        if ($resultado == "0") {
            return "0";
        }
        $resultado = substr($resultado, $i);
        return $resultado;
    }
}