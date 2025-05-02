# Mantenimiento

### Nombre del proyecto en la nube: gym-routine.giize.com

### Diagrama de despliegue

![DiagramaDespliegue](/doc/img/diagramaDespliegue.png)

### Diagrama de Componentes

![DiagramaComponentes](/doc/img/diagramaComponentes.png)


# Manual técnico

## Manual de puesta en produción.

La aplicación está alojada en un "droplet" de Digital Ocean, y he creado un dominio con Dynu. Para poder desplegar la aplicación en el droplet y que se ejecute, he creado tres contenedores.

El primer contenedor tendrá una imagen de MariaDB. En este, tengo el script SQL de la base de datos, por lo tanto, esta será la forma de hacer la carga inicial de datos.

En el segundo contenedor tengo un Nginx, para que se pueda abrir la aplicación en el navegador.

El último contenedor contendrá la aplicación y estará construido mediante un Dockerfile.

## Manual de entorno de desenvolvimiento.

Para que una persona pueda realizar modificaciones en el proyecto en el futuro, simplemente tendrá que clonar el proyecto del repositorio donde está guardado, y luego instalar ciertas herramientas en su ordenador. Aquí están las herramientas necesarias:

- **Php**, es un requisito fundamental para ejecutar aplicaciones Symfony.
- **Composer**, es el gestor de dependencias para PHP y es esencial para instalar bibliotecas y paquetes necesarios para proyectos Symfony. 


### Estructura final de la base de datos:

![BasedDeDatos](/doc/img/diagramaBaseDeDatos.png)

### Descripción de los directorios de la aplicación 

![Directorios1](/doc/img/directorios1.png)
![Directorios2](/doc/img/directorios2.png)
![Directorios3](/doc/img/directorios3.png)
![Directorios4](/doc/img/directorios4.png)


## Mejoras futuras

La idea inicial y el funcionamiento que tenía como objetivo conseguir con mi proyecto los he cumplido. Desde que comencé a programar, tenía en mente agregar algunas funciones extra que sabía que, con el tiempo disponible para desarrollar el proyecto, serían muy difíciles de implementar. En el futuro, tengo pensado agregar las siguientes funciones:

- **Mejorar la seguridad**
- **Implementar una serie de gráficos** para permitir a los usuarios ver de una forma gráfica y más sencilla su progreso.
- **Permitir a los usuarios agregar amigos** en la aplicación. Con lo citado anteriormente, se conseguirá que los usuarios puedan compartir su progreso con personas cercanas y motivarse mutuamente para cumplir sus objetivos.
- **La posibilidad de usar la aplicación en diferentes idiomas.**