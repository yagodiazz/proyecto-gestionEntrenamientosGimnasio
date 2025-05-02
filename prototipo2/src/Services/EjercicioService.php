<?php
namespace App\Services;

class EjercicioService
{
    private $array = [];

    public function __construct()
    {
        $this->array = [
            ["nombreEjercicio" => "Sentadilla hack", "descripcion" => "Ejercicio de levantamiento de pesas que trabaja principalmente los músculos de las piernas, especialmente los cuádriceps, los glúteos y los músculos isquiotibiales.", "maquina" => 1, "grupoMuscular" => 4],
            ["nombreEjercicio" => "Prensa", "descripcion" => "Máquina que se basa en el movimiento de empuje para desarrollar la fuerza y resistencia de los cuádriceps y los gemelos", "maquina" => 2, "grupoMuscular" => 4],
            ["nombreEjercicio" => "Curl femoral sentado", "descripcion" => "Ejercicio básico de aislamiento que trabaja principalmente dos grupos musculares: los músculos de la pantorrilla y los isquiotibiales.", "maquina" => 3, "grupoMuscular" => 4],
            ["nombreEjercicio" => "Curl femoral tumbado", "descripcion" => "Ejercicio básico de aislamiento que trabaja principalmente dos grupos musculares: los músculos de la pantorrilla y los isquiotibiales.", "maquina" => 4, "grupoMuscular" => 4],
            ["nombreEjercicio" => "Elevación de gemelos", "descripcion" => "Las elevaciones de pantorrilla activan los dos músculos que se extienden por la parte posterior de la parte inferior de la pierna: el gastrocnemio y el sóleo.", "maquina" => 5, "grupoMuscular" => 4],
            ["nombreEjercicio" => "Máquina curl de bíceps", "descripcion" => "Para ejecutarlo tomamos la barra, pegamos los codos a los costados de nuestro cuerpo y tiramos los codos hacia atrás y debemos subir el peso y bajarlo lentamente hasta estirar el brazo completamente.", "maquina" => 6, "grupoMuscular" => 5],
            ["nombreEjercicio" => "Extension de tríceps", "descripcion" => "Extiende las piernas hacia delante apoyando únicamente los talones en el suelo. Empuja hacia arriba con las manos para extender los brazos y elevar tu cuerpo hacia la posición inicial.", "maquina" => 7, "grupoMuscular" => 6],
            ["nombreEjercicio" => "Jalón al pecho", "descripcion" => "Este es un ejercicio que implica múltiples músculos de la parte superior de la espalda (deltoides posterior, los romboides y el trapecio, aunque los bíceps también se ven implicados.)", "maquina" => 8, "grupoMuscular" => 3],
            ["nombreEjercicio" => "Remo gironda", "descripcion" => "El remo Gironda es un ejercicio de tracción que trabaja los músculos de la espalda en general, particularmente el dorsal ancho. También trabaja los músculos del antebrazo y los músculos de la parte superior del brazo.", "maquina" => 9, "grupoMuscular" => 3],
            ["nombreEjercicio" => "Remo sentado", "descripcion" => " Su finalidad es enfocar el desarrollo de las fibras musculares de la zona media de los dorsales realizando un movimiento de tracción, es decir, jalando un peso.", "maquina" => 10, "grupoMuscular" => 3],
            ["nombreEjercicio" => "Press Hombro con máquina", "descripcion" => "El press de hombro es un ejercicio básico de diversas rutinas para trabajar la parte superior del cuerpo incluyendo la espalda.", "maquina" => 11, "grupoMuscular" => 1],
            ["nombreEjercicio" => "Press superior con mancuerna", "descripcion" => " Es un ejercicio destinado a desarrollar tus pectorales,sobre todo la parte superior de estos. Obviamente, se realiza con dos mancuernas y para ejecutarlo bien deberías de estar en posición inclinada.", "maquina" => 22, "grupoMuscular" => 2],
            ["nombreEjercicio" => "Press plano con mancuerna", "descripcion" => " Es un ejercicio destinado a desarrollar tus pectorales. Obviamente, se realiza con dos mancuernas y para ejecutarlo bien deberías de estar en posición horizontal.", "maquina" => 23, "grupoMuscular" => 2],
            ["nombreEjercicio" => "Máquina elevaciones laterales", "descripcion" => "Las elevaciones laterales es un ejercicio para trabajar los hombros. Es muy utilizado porque permite ganar fuerza y resistencia en esta zona del cuerpo. ", "maquina" => 12, "grupoMuscular" => 1],
            ["nombreEjercicio" => "Press plano en máquina", "descripcion" => " Es un ejercicio destinado a desarrollar tus pectorales.", "maquina" => 13, "grupoMuscular" => 2],
            ["nombreEjercicio" => "Press superior en máquina", "descripcion" => " Es un ejercicio destinado a desarrollar tus pectorales, en especial la parte superior de estos", "maquina" => 14, "grupoMuscular" => 2],
            ["nombreEjercicio" => "Cinta de correr", "descripcion" => "Correr en cinta es un ejercicio muy completo para quemar calorías y perder peso. En algunos modelos de cintas se puede controlar las calorías quemadas, para poder llevar un mejor control de los ejercicios. ", "maquina" => 15, "grupoMuscular" => 8],
            ["nombreEjercicio" => "Elíptica", "descripcion" => "La elíptica tiene dos bases donde se colocarán los pies (hay espacio de sobra). Y arriba, a la altura del pecho tiene dos agarres para las manos, los cuales al igual que las bases de los pies, se mueven. De hecho, están conectados, si mueves las bases de los pies se mueven los agarres de las manos, y al revés.", "maquina" => 16, "grupoMuscular" => 8],
            ["nombreEjercicio" => "Bicicleta estática", "descripcion" => "La bicicleta estática es la opción ideal para ponerse en forma en casa o en el gimnasio en poco tiempo. Es más sencillo que correr en una cinta, cansa menos, y puedes ir al ritmo que quieras. ", "maquina" => 17, "grupoMuscular" => 8],
            ["nombreEjercicio" => "Press de banca", "descripcion" => "El levantador se tumba sobre su espalda en un banco, levantando y bajando la barra directamente por encima del pecho. Está pensado para el desarrollo de los músculos del pecho, los deltoides anterior y los serratos anteriores.", "maquina" => 18, "grupoMuscular" => 2],
            ["nombreEjercicio" => "Sentadila", "descripcion" => "Ejercicio que consiste en flexionar las piernas bajando el cuerpo recto hasta quedar en cuclillas.", "maquina" => 29, "grupoMuscular" => 4],
            ["nombreEjercicio" => "Peso muerto", "descripcion" => "La técnica peso muerto trabaja un gran número de grupos musculares. Entre ellos los del área inferior de la espalda e isquiotibiales, tonificando glúteos, gemelos y cúadriceps así como en el área superior de la espalda y los brazos además de los trapecios.", "maquina" => 30, "grupoMuscular" => 3],
            ["nombreEjercicio" => "Flexiones", "descripcion" => "Ejercicio físico realizado estando en posición inclinada, recostado hacia abajo, levantando el cuerpo únicamente con los brazos y bajando de nuevo al suelo.", "maquina" => 21, "grupoMuscular" => 2],
            ["nombreEjercicio" => "Abdominales", "descripcion" => "Consisten en pasar de una posición tumbada a una sentada al llevar el pecho hacia los muslos. Este movimiento lo podemos realizar especialmente gracias al músculo recto abdominal.", "maquina" => 28, "grupoMuscular" => 7]

        ];
    }

    public function getArray()
    {
        return $this->array;
    }
}