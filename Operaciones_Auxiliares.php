<?php
class Operaciones_Auxiliares
{
    public static function rellenarCeros(Numero $a, int $cantidad)
    {
        $resultado = "";
        for ($i = 0; $i < $cantidad - strlen($a->getValor()); $i++) {
            $resultado .= "0";
        }
        return $resultado .= $a->getValor();
    }
    public static function comparar(Numero $a, Numero $b)
    {
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
        if ($longitudA > $longitudB) {
            $resultado = 1;
        } elseif ($longitudA < $longitudB) {
            $resultado = -1;
        } else
            $resultado = 0;
        $i = 0;
        while ($i < $longitudA && $resultado == 0) {
            if ($a->getValor()[$i] > $b->getValor()[$i]) {
                $resultado = 1;
            }
            if ($a->getValor()[$i] < $b->getValor()[$i]) {
                $resultado = -1;
            }
            $i++;
        }
        if ($signoA == "+") {
            return $resultado;
        }
        return -$resultado;
    }
}