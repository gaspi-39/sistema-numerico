<?php
/*
La clase entero no deberia tener ningun tipo de validacion por ahora
ya que todo valor que provenga de la clase Numero, es un numero entero.

(esto va a cambiar cuando agreguemos numeros racionales)

*/
class Entero extends Numero{

    public function __construct(string $valor){
        parent::__construct($valor);
    }
    protected function esValido(){
        return true;
    }

}