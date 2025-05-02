# Prototipo 1
Fecha:03/05/2024

Para este primer prototipo del proyecto, me he centrado principalmente en desarrollar la parte del servidor utilizando el framework de PHP Symfony. En esta etapa, he logrado extraer información de la base de datos para poder gestionarla es decir, agregar nueva información, eliminarla... Además, he implementado medidas de seguridad, como el cifrado de contraseñas en la base de datos y la verificación mediante tokens cada vez que un usuario intenta iniciar sesión. También he comenzado a agregar estilos con CSS y a animar ciertos elementos con JavaScript.

Durante este proceso, me he enfrentado a varios desafíos. Por ejemplo, integré algunas bibliotecas específicas de Symfony para mejorar la seguridad del inicio de sesión. Esto me ha permitido cifrar las contraseñas en la base de datos y verificarlas de manera segura, mediante tokens. Otro desafío significativo fue conseguir compartir información entre las sesiones de JavaScript y Symfony. Esta integración me ha permitido transferir información entre pantallas de manera coherente para mejorar la experiencia del usuario y agregar datos a la base de datos de forma eficiente.

Para el siguiente prototipo, mi objetivo principal es mejorar considerablemente el aspecto visual de la aplicación y optimizar la navegación para que sea lo más intuitiva posible para el usuario.


# Prototipo 2
Fecha:22/05/2024


Para este segundo prototipo, me he centrado en mejorar el aspecto visual de la aplicación, es decir, los estilos CSS y las animaciones en JavaScript. Se puede apreciar que he cambiado profundamente el aspecto de la aplicación, siendo el cambio de colores lo primero que resalta a la vista. Me he esforzado en darle un aspecto homogéneo a todas las secciones, donde se puede apreciar que gran parte del contenido se muestra dentro de unas tarjetas que dan el efecto de estar flotando sobre la pantalla.

Otro elemento importante que he tenido en cuenta es la responsividad de la aplicación, es decir, que se muestre con un formato adecuado en los diferentes tamaños de pantalla. Esto lo he logrado en su mayoría con Bootstrap, pero también he utilizado "media queries" en algunas partes.

En esta segunda versión, he realizado algunas mejoras con respecto a la funcionalidad de la aplicación. Entre ellas se encuentran:

- Visualización de los registros realizados en el último entrenamiento (peso, series y repeticiones por serie) en la pantalla donde se añade la información del ejercicio actual seleccionado. Esto permitirá añadir la información de una manera mucho más rápida sin tener que buscarla en el historial de los entrenamientos.

- Diferentes tipos de filtrado para poder buscar con facilidad la información deseada sobre el historial de los entrenamientos. Entre los tipos de filtrado se permite:
    - Buscar por fecha
    - Ejercicio
    - Máquina

- Mejoras en la gestión de usuarios, entre las cuales puedo destacar que ahora, cada vez que se borre un usuario, se eliminará toda la información relacionada con este en la base de datos (rutinas, ejercicios, detalles de rutina). Con esto, conseguiré hacer más eficiente la aplicación al no almacenar información innecesaria en la base de datos.

En conclusión, en este segundo prototipo he mejorado en profundidad el aspecto general de la aplicación y su responsividad. Además, he perfeccionado algunas funcionalidades existentes y añadido otras que facilitarán el uso de la aplicación.


# Prototipo final

Fecha:10/06/2024

Para este último prototipo, mi objetivo desde el inicio fue perfeccionar al máximo el aspecto y funcionamiento de la aplicación, y alojarla en un servidor para que cualquier persona pueda acceder a ella. Esto permitirá que algunos amigos y personas de confianza la prueben y comiencen a detectar errores y fallos. Para poder alojarla, he creado tres contenedores: uno para la base de datos, otro para nginx y el último que contiene la propia aplicación. El lugar en el que he decidido alojar la aplicación es en un "droplet" de Digital Ocean.

Entre algunas mejoras que he realizado en la aplicación se encuentran:

- **Mejorar el filtrado de las rutinas/entrenamientos**:Cambié el tipo de calendario para filtrar por días, permitiendo ahora seleccionar un rango de días en lugar de solo un día concreto.

- **Añadir animaciones**: Se han añadido animaciones a botones y otros elementos de la página para mejorar la experiencia del usuario.

- **Mejora en la accesibilidad y usabilidad**.A continuación citaré algunos ejemplos:
    - **Nuevo botón**,este se encuentra en la pantalla donde se visualizan los ejercicios de la rutina actual, y redireccionará al home de la aplicación.De esta manera se podrán añadir nuevos ejercicios mas facilmente.
    - **Menú de hamburguesa**, para tamaños pequeños de pantalla.
    - **Mensaje de error** en el login, que aparecerán al poner mal la contraseña.

- **Mejora en el aspecto general de la aplicación**: Se han añadido imágenes de fondo y se ha cambiado el diseño del encabezado y el pie de página para mejorar el aspecto visual de la aplicación.

En resumen, en este último prototipo he alojado mi aplicación, he mejorado su aspecto, corregido algunos errores detectados y finalmente he mejorado su usabilidad y accesibilidad.