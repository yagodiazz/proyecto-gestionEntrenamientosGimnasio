<?php
namespace App\Services;

class GrupoMuscularService
{
    private $array = [];

    public function __construct()
    {
        $this->array = [
            ["nombre" => "hombro", "descripcion" => "El hombro extiende desde el borde inferior de la clavícula hasta la apófisis coracoides de la escápula.", "imagen" => "hombro.png"],
            ["nombre" => "pecho", "descripcion" => "El pecho​ se sitúa en la parte frontal del cuerpo humano, en oposición a la espalda y comprende la región desde la base del cuello y los hombros hasta el abdomen. ", "imagen" => "pecho.png"],
            ["nombre" => "espalda", "descripcion" => "La espalda es la parte posterior del cuerpo humano que va de la base del cuello y hombros hasta la cintura.", "imagen" => "espalda.png"],
            ["nombre" => "pierna", "descripcion" => "La pierna es todo aquello que se encuentra entre la rodilla y la articulación del tobillo.", "imagen" => "pierna.png"],
            ["nombre" => "bíceps", "descripcion" => "El bíceps  se ubica superficial a los músculos braquial y coracobraquial, y básicamente forma el lado anterior del brazo.", "imagen" => "biceps.png"],
            ["nombre" => "tríceps", "descripcion" => "El tríceps es un músculo grande que ocupa aproximadamente dos tercios de la parte superior del brazo, extendiéndose por la parte posterior del húmero, el hueso del brazo.", "imagen" => "triceps.png"],
            ["nombre" => "abdominal", "descripcion" => " El abdominal encuentra situada entre el tórax, hacia arriba, y la pelvis, hacia abajo.", "imagen" => "abdominal.png"],
            ["nombre" => "cardio", "descripcion" => "Se trabajan todos los músculos del cuerpo.", "imagen" => "cardio.png"],
        ];
    }

    public function getArray()
    {
        return $this->array;
    }
}