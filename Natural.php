<?php

class Natural extends entero{

    public function __construct(string $string){
        parent::__construct($string);
        if(!$this->esValido()){
            throw new Exception("Error: dominio no valido");
        }

    }
    protected function esValido(){
        return $this->getSigno() == "+" && $this->getValor() != "0";
    }
}