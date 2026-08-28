<?php

// Clase Numero se va a encargar de validar y normalizar los valores ingresados
// Las reglas que debe seguir estan en el archivo "Reglas_Sist_Numerico.txt"
class Numero {
    private string $valor;
    private string $signo;

    public function __construct(String $string){
        // validar y extraer signo (si no hay, +)

    }
    public function sumar(Numero $numero){
        return Operaciones::sumar($this, $numero);
    }
    public function getValor(): string{
        return $this->valor;
    }
    public function getSigno(): string{
        return $this->signo;
    }
}