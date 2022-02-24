<?php

class Emisor extends XML
{

    /* Se elimina public $regimenFiscal; ya que no se usa*/

    /*El método contructor debe estar publico*/
    public function __construct()
    {
        $this->atributos = [];
        $this->atributos['Nombre'] = '';
        $this->atributos['RegimenFiscal'] = '';
        $this->rules = [];
        $this->rules['Nombre'] = 'R';
        $this->rules['RegimenFiscal'] = 'R';
        /*Se deben agregar los atributos y reglas que faltan*/
        $this->atributos['Rfc'] = '';
        $this->rules['Rfc'] = 'R';
    }

    public function getNode()
    {
        $xml = '<cfdi:Emisor ' . $this->getAtributes() . ' />';
        return $xml;
    }
}
