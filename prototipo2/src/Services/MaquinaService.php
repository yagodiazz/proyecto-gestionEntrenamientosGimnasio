<?php
namespace App\Services;

class MaquinaService
{
    private $array = [];

    public function __construct()
    {
        $this->array = [
            ["nombre" => "Máquina Sentadilla hack", "marca" => "Cibex", "imagen" => "hacka.jpg"],
            ["nombre" => "Máquina Prensa", "marca" => "Nautilus", "imagen" => "prensa.jpg"],
            ["nombre" => "Máquina Curl femoral sentado", "marca" => "Prime USA", "imagen" => "femoralSentado.jpg"],
            ["nombre" => "Máquina Curl femoral tumbado", "marca" => "Hammer Strength", "imagen" => "femoralTumbado.jpg"],
            ["nombre" => "Máquina Elevación de gemelos", "marca" => "Force USA", "imagen" => "elevacionGemelo.jpg"],
            ["nombre" => "Máquina curl de bíceps", "marca" => "ProGym", "imagen" => "curlBicepsMaquina.jpg"],
            ["nombre" => "Máquina Extension de tríceps", "marca" => "ProGym", "imagen" => "extensionTricepsMaquina.jpg"],
            ["nombre" => "Máquina Jalón al pecho", "marca" => "TechnoGym", "imagen" => "jalon.jpg"],
            ["nombre" => "Máquina Remo gironda", "marca" => "TechnoGym", "imagen" => "remoGironda.jpg"],
            ["nombre" => "Máquina Remo sentado", "marca" => "Prime USA", "imagen" => "remoSentado.jpg"],
            ["nombre" => "Máquina Press Hombro", "marca" => "Prime USA", "imagen" => "pressHombro.jpg"],
            ["nombre" => "Máquina elevaciones laterales", "marca" => "ProGym", "imagen" => "lateralesMaquina.jpg"],
            ["nombre" => "Máquina press plano", "marca" => "Titanium Strngth", "imagen" => "maquinaPlano.jpg"],
            ["nombre" => "Máquina press superior", "marca" => "Prime Usa", "imagen" => "maquinaSuperior.jpg"],
            ["nombre" => "Cinta de correr", "marca" => "Technogym", "imagen" => "cinta.jpg"],
            ["nombre" => "Elíptica", "marca" => "Cecotec", "imagen" => "eliptica.jpg"],
            ["nombre" => "Bicicleta estática", "marca" => "Technogym", "imagen" => "cinta.jpg"],
            ["nombre" => "Rag Press de banca", "marca" => "ATX", "imagen" => "pressBanca.jpg"],
            ["nombre" => "Barra", "marca" => "Ruster fitness", "imagen" => "barra.jpg"],
            ["nombre" => "Mancuernas", "marca" => "Etenon", "imagen" => "mancuernas.jpg"],
            ["nombre" => "Cuerpo", "marca" => "", "imagen" => "libre.jpg"],
            ["nombre" => "Press superior mancuernas", "marca" => "Prime Usa", "imagen" => "pressSuperiorMancuerna.jpg"],
            ["nombre" => "Press plano mancuernas", "marca" => "Prime Usa", "imagen" => "pressPlanoMancuerna.jpg"],
            ["nombre" => "Press hombro con mancuernas", "marca" => "ProGym", "imagen" => "pressHombroMancuerna.jpg"],
            ["nombre" => "Curl de bíceps con mancuernas", "marca" => "ProGym", "imagen" => "curlBicepsMancuerna.jpg"],
            ["nombre" => "Extensión de tríceps con mancuernas", "marca" => "ProGym", "imagen" => "extensionTricepsMancuerna.jpg"],
            ["nombre" => "Elevaciones laterales con mancuernas", "marca" => "ProGym", "imagen" => "lateralesMancuerna.jpg"],
            ["nombre" => "Máquina abdominales", "marca" => "TechnoGym", "imagen" => "abdominales.jpg"],
            ["nombre" => "Barra Sentadilla", "marca" => "Force USA", "imagen" => "sentadilla.jpg"],
            ["nombre" => "Barra Peso Muerto", "marca" => "TechnoGym", "imagen" => "pesoMuerto.jpg"],
        ];
    }

    public function getArray()
    {
        return $this->array;
    }
}