<?php
require_once "./Operaciones.php";
abstract class Numero {
    private string $valor;
    private string $signo;

    public function __construct(String $string){
        // validar y extraer signo (si no hay, +)

    }

    public function sumar(Numero $numero){
        return Operaciones::sumar($this, $numero);
    }
    public function getValor(){
        return $this->valor;
    }
    public function getSigno(){
        return $this->signo;
    }
    abstract public function restar($string);
    abstract public function multiplicar($string);
    abstract public function dividir($string);
}
