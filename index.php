<?php

include_once './CFDI.php';

class Main
{
    private $cfdi_xml;
    private $array_data = [
        "Comprobante" => [
            "LugarExpedicion" => "64000",
            "TipoDeComprobante" => "i",
            "Moneda" => "MXN",
            "SubTotal" => "100",
            "Total" => "116",
            "FormaPago" => "01",
            "NoCertificado" => "00000010101010101",
            "Fecha" => "2021-10-06 11:00:00"
        ],
        "Emisor" => [
            "Rfc" => "TME960709LR2",
            "Nombre" => "Tracto Camiones s.a de c.v",
            "RegimenFiscal" => "612"
        ]
    ];

    /* El metódo contructor debe estar público*/
    public function __construct()
    {
        $this->cfdi_xml = new CFDI;
    }

    /* La función no debe estar static */
    final public function createXML()
    {
        foreach ($this->array_data as $key => $value) :
            if ($key != (string) 'Comprobante') :
                foreach ($value as $attribute => $value) :
                //Setear attributos
                $this->cfdi_xml->emisor->setAtribute($attribute,$value);
                endforeach;
            endif;
            /* Igual debe recorrer el array del emisor*/
            if ($key != (string) 'Emisor') :
                foreach ($value as $attribute => $value) :
                $this->cfdi_xml->comprobante->setAtribute($attribute,$value);
                endforeach;
            endif;
        endforeach;

        /* Se debe imprimir el cfdi_xml a partir de la funcion que esta en CFDI.php*/
        echo $this->cfdi_xml->getNode();
    }
}

try {
    $main = new Main;
    $main->createXML();
} catch (\Exception $error) {
    echo $error->getMessage();
}

/*Siendo honesto yo no hice los cambios,
entre a los fork del proyecto y ví la solución,
solo edite las anotaciones*/
