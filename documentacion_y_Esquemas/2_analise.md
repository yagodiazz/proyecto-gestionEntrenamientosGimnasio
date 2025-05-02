## Descripción general del proyecto

Aplicación web para almacenar las diferentes rutinas de entrenamiento realizadas a diario por sus usuarios en el gimnasio. Lo que se almacenará en la tabla rutina de la base de datos será una tabla intermedia que hay entre los ejercicios y las rutinas. La tabla intermedia contendrá los ejercicios y la información al respecto de estos, que será lo que puedan modificar los usuarios, es decir, el peso, series, etc. Cada entrenamiento podrá registrar los diferentes grupos musculares, número de series, peso y repeticiones por cada ejercicio trabajado cada día. Todos estos datos se mostrarán a modo de calendario.

## Funcionalidades
Las funcionalidades de la aplicación serán las siguientes:
- **Login:** Permitirá a los usuarios iniciar sesión en la aplicación. El propio login también contentrá un apartado donde se puedan dar de alta los usuarios que aún no lo hayan hecho.
- **Registrar los entrenamientos:** Cada usuario de la aplicación podrá crear sus propios entrenaminetos. Cada entrenamiento contendrá un conjunto de ejercicios(con sus respectiva información), y cada uno de estos sus propias series, repeticiones, peso movido por serie y el grupo muscular que trabajan.
- **Añadir nuevas máquinas:** Los usuarios de tipo administrador tendrán la posibilidad de registrar nuevas máquinas.
- **Añadir nuevos ejercicios:** Los usuarios de tipo administrador tendrán la posibilidad de registrar nuevos ejercicios.
- **Modificar ejercicios:** Los usuarios de tipo administrador tendrán la posibilidad de modificar ejercicios.
- **Eliminar usuarios:** Los usuarios de tipo administrador tendrán la posibilidad de eliminar usuarios.
- **Mostrar las diversas rutinas:** Una vez que un usuario inicia sesión en la aplicación, podrá visualizar las rutinas ya completadas a modo de calendario.

## Tipos de usuarios

Existirán dos tipos de usuarios: administradores y no administradores.

## Entorno operacional

La aplicación estará programada con el framework de PHP Symfony (para la parte de backend) y JavaScript (para la parte del frontend). Para desplegar la aplicación, utilizaré 000webhost (una aplicación gratuita que, dentro de ella, también me ofrecerá la posibilidad de crear una base de datos MySQL).

## Interfaces externos

La aplicación se podrá usar tanto desde el móvil como desde el ordenador. El diseño responsivo para cada tamaño de pantalla lo llevaré a cabo con el uso de media queries y Bootstrap.

## Mejoras futuras

Para mejoras futuras en la aplicación, o en el caso de que me lleve menos tiempo del que pienso, se podrían añadir:

- Traducción de la página al inglés.
- Posibilidad del usuario de seleccionar ciertos ejercicios como favoritos.
- Posibilidad de agregar a amigos que usen la aplicación para poder ir comparando el progreso.
- Mejorar la seguridad y optimización de la aplicación.