<?php
require_once "./Operaciones.php";
// Clase Numero se va a encargar de validar y normalizar los valores ingresados
// Las reglas que debe seguir estan en el archivo "Reglas_Sist_Numerico.txt"
class Numero
{
    private string $valor;
    private string $signo;

    public function __construct(string $string)
    {
        // validar y extraer signo (si no hay, +)
        $this->validar($string);
        $this->normalizar($string);
    }
     private function validar(string $string)
    {
        if(empty($string)){
            throw new Exception("Error: el numero ingresado no puede estar vacio.");
        }
        if(($string[0] == "+" || $string [0] == "-") && strlen($string) == 1){
            throw new Exception("Error: el valor ingresado no puede estar formado unicamente por un signo.");
        }

        if($string[0] == "+" || $string [0] == "-"){
            $indice = 1;
        } else {
            $indice = 0;
        }
        for($i = $indice; $i < strlen($string); $i++){
            if($string[$i] < "0" || $string[$i] > "9"){
                throw new Exception("Error: caracter invalido.");
            }
        }
        
    }
    private function normalizar(string $string)
    {
        if ($string[0] == "-" || $string[0] == "+") {
            $this->signo = $string[0];
            $string = substr($string, 1);
        } else {
            $this->signo = "+";
        }
        $numero = $string;
        $i = 0;
        while ($i < strlen($numero) && $numero[$i] == "0") {
            $i++;
        }
        if ($i == strlen($numero)) {
            $this->signo = "+";
            $this->valor = "0";
        } else {
            $this->valor = substr($numero, $i);
        }
    }
    public function sumar(Numero $numero)
    {
        return Operaciones::suma($this, $numero);
    }
    public function restar(Numero $numero){
        return Operaciones::resta($this, $numero);
    }
    public function multiplicar(Numero $numero){
        //return Operaciones::multiplicacion($this, $numero);
    }
    public function getValor(): string
    {
        return $this->valor;
    }
    public function getSigno(): string
    {
        return $this->signo;
    }
}