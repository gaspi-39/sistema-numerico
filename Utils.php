<?php
class Utils
{
    public static function rellenarCeros(Numero $a, int $cantidad)
    {
        $resultado = "";
        for ($i = 0; $i < $cantidad - strlen($a->getValor()); $i++) {
            $resultado .= "0";
        }
        return $resultado .= $a->getValor();
    }
    public static function compararSigno(Numero $a, Numero $b)
    {
        $signoA = $a->getSigno();
        $signoB = $b->getSigno();
        $resultado = 0;
        if ($signoA == "+" && $signoB == "-") {
            return 1;
        }
        if ($signoA == "-" && $signoB == "+")
            return -1;
        return $resultado;
    }
    public static function compararValorAbsoluto(Numero $a, Numero $b)
    {
        // retorna 1 si a > b, -1 si a < b, 0 si a = b
        $longitudA = strlen($a->getValor());
        $longitudB = strlen($b->getValor());
        $resultado = 0;
        if ($longitudA > $longitudB) {
            return 1;
        } elseif ($longitudA < $longitudB) {
            return -1;
        } else{
        $i = 0;
        }
        while ($i < $longitudA && $resultado == 0) {
            if ($a->getValor()[$i] > $b->getValor()[$i]) {
                $resultado = 1;
            }
            if ($a->getValor()[$i] < $b->getValor()[$i]) {
                $resultado = -1;
            }
            $i++;
        }
        return $resultado;
    }
    public static function comparar(Numero $a, Numero $b){
        $resultadoSignos = Utils::compararSigno($a,$b);

        if ($resultadoSignos != 0){
            return $resultadoSignos;
        }
        $resultadoValorAbsoluto = Utils::compararValorAbsoluto($a, $b);

        if ($a->getSigno() == "+"){
            return $resultadoValorAbsoluto;
        } else {
            return -$resultadoValorAbsoluto;
        }
    }
}