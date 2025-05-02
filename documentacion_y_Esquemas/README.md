# Gym Route App

## Breve descripción del funcionamiento

La aplicación web tiene como función registrar los entrenamientos de fuerza de una manera sencilla. Esta permite elegir el grupo muscular que se quiere entrenar, pudiendo seleccionar dentro de este entre diferentes ejercicios. Posteriormente, se puede añadir el peso, las repeticiones por serie y las series realizadas para cada ejercicio seleccionado. Es posible agregar el número de ejercicios que se desee a cada entrenamiento/rutina, y se podrán visualizar con diferentes filtros los entrenamientos que ya se hayan completado en el pasado.


## Funcionalidades principales

- **Selección de Grupo Muscular:** Elige el grupo muscular que quieres entrenar.
- **Selección de Ejercicios:** Selecciona entre una variedad de ejercicios específicos para el grupo muscular elegido.
- **Registro de Detalles del Entrenamiento:** Añade el peso, las repeticiones por serie y el número de series para cada ejercicio. 
-**Personalización de Rutinas:** Agrega la cantidad de ejercicios que se desee a cada rutina de entrenamiento.
- **Visualización del historial de Entrenamientos:** Visualiza los entrenamientos completados anteriormente utilizando diferentes filtros para facilitar la búsqueda.
-**Agregar nuevas máquinas y ejercicios:** Permite a los usuarios de tipo administrador agregar nuevas máquinas y ejercicios.
-**Administrar usuarios:** Permite a los usuarios de tipo administrador eliminar usuarios y modificar otros, pudiendo cambiarles la contraseña y el rol que desempeñan.


## Estado del proyecto

La primera versión del proyecto se encuentra finalizada, pero se esperan actualizaciones para el futuro.


## Instalación 

Para poder instalar el proyecto, simplemente se debe clonar el siguiente repositorio: https://github.com/YagoDiazJusto/gymApp

- Para clonar el repositorio habreáque ejecutar el comando **'git clone (url)'**.
- Cuando se realicen modificaciones en el proyecto, será necesario ejecutar los siguientes comandos para actualizar el repositorio:
    - **git add .**
    - **git commit -m "mensaje"** 
    - **git push**
- Para desplegar el proyecto, se utilizan contenedores Docker. Por lo tanto, al querer desplegar el proyecto, se deberá ejecutar **docker compose up**.
- La carga inicial de datos se relizará mediante un script sql, que se debe incluir dentro de la carpeta **sql** del repositorio.


## Version de las dependencias clave

- **PHP**: `>=8.2`
- **Doctrine**:
  - `doctrine/dbal`: `^3`
  - `doctrine/doctrine-bundle`: `^2.12`
  - `doctrine/doctrine-migrations-bundle`: `^3.3`
  - `doctrine/orm`: `^3.1`
- **Symfony**:
  - `symfony/console`: `7.0.*`
  - `symfony/dotenv`: `7.0.*`
  - `symfony/flex`: `^2`
  - `symfony/form`: `7.0.*`
  - `symfony/framework-bundle`: `7.0.*`
  - `symfony/mime`: `7.0.*`
  - `symfony/monolog-bundle`: `^3.0`
  - `symfony/password-hasher`: `7.0.*`
  - `symfony/runtime`: `7.0.*`
  - `symfony/security-bundle`: `7.0.*`
  - `symfony/security-core`: `7.0.*`
  - `symfony/twig-bundle`: `7.0.*`
  - `symfony/validator`: `7.0.*`
  - `symfony/webpack-encore-bundle`: `^2.1`
  - `symfony/yaml`: `7.0.*`
- **Twig**:
  - `twig/extra-bundle`: `^2.12|^3.0`
  - `twig/twig`: `^2.12|^3.0`


## Uso

El funcionamiento de la aplicación es sencillo. Una vez que un usuario se loguea, accederá al home de la aplicación. Aquí podrá seleccionar el grupo muscular que quiere entrenar.
![Uso1](/doc/img/uso1.png)

Una vez seleccionado el grupo muscular, deberá seleccionar el ejercicio que desee realizar.
![Uso2](/doc/img/uso2.png)

Una vez seleccionado el ejercicio, se deberá agregar la información correspondiente al ejercicio realizado.
![Uso3](/doc/img/uso3.png)

Una vez agregada la información, se accederá a la pantalla de la rutina/entrenamiento actual. Aquí se visualizarán los ejercicios que se vayan completando en el entrenamiento actual. Una vez que se considere completado el entrenamiento, se deberá pulsar el botón de finalizar.
![Uso4](/doc/img/uso4.png)

Finalmente, una vez completado el entrenamiento/rutina, se accederá automáticamente a la pantalla donde se pueden visualizar todos los entrenamientos del historial, lo que permite al usuario aplicar diferentes filtros.
![Uso5](/doc/img/uso5.png)
![Uso6](/doc/img/uso6.png)



### Proyecto desarrollado por Yago Díaz Justo 