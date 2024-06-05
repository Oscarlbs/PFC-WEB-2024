
Proyecto de Sitio Web de MOTORSPORT CLUB


## Tabla de Contenidos

- [Introducción](#introducción)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Base de Datos](#base-de-datos)
- [Tabla](#tabla)
- [Página de Listado de Autos](#página-de-listado-de-autos)
- [Historia de Usuario](#historia-de-usuario)
- [Página de Administrador](#página-de-administrador)

## Introducción

- Este es un proyecto de sitio web de alquiler de autos.
- El propósito de este proyecto es crear un sitio web de alquiler de autos.
- El sitio web tendrá una página de inicio de sesión, una página de listado de autos, una página de reserva de autos y una página de devolución de autos.
- La página de inicio de sesión tendrá campos de entrada de nombre de usuario y contraseña.
- La página de listado de autos tendrá una barra de búsqueda y una tabla de listado de autos.
- La página de reserva de autos tendrá una tabla de reserva de autos.

## Requisitos

- Se requiere XAMPP para ejecutar el proyecto.
- El proyecto se alojará en un servidor localhost.

## Instalación

- Instalar XAMPP.
- Abrir XAMPP y hacer clic en el botón de inicio.
- Clonar el proyecto en la raíz del servidor XAMPP.
- Abrir el proyecto en XAMPP.
- Importar el archivo SQL desde la carpeta de base de datos al servidor XAMPP.
- Abrir el navegador e ir a [localhost:8080](localhost:8080).
- ¡Hurra! El proyecto ahora está en funcionamiento.

## Base de Datos

- La base de datos se almacena en una carpeta llamada base de datos.
- La base de datos se llama carproject.sql.
- La base de datos se almacena en la raíz del servidor XAMPP.
- La base de datos se importa al servidor XAMPP.
- Se utiliza MySQL para la base de datos.
- La página de conexión a la base de datos se llama [connection.php](/connection.php).

## Tabla

- La tabla se llama car.
- La tabla tiene las siguientes columnas:
    - car_id: ENTERO CLAVE PRIMARIA AUTO_INCREMENT
    - car_make: VARCHAR(255)
    - car_model: VARCHAR(255)
    - car_year: ENTERO
    - car_color: VARCHAR(255)
    - car_price: ENTERO
    - car_available: BOOLEAN
    - car_image: VARCHAR(255)
    - car_description: VARCHAR(255)

## Página de Listado de Autos

- La página de listado de autos tendrá una barra de búsqueda y una tabla de listado de autos.
- La barra de búsqueda tendrá un botón de búsqueda.
- El botón de búsqueda buscará el auto según la entrada de la barra de búsqueda.
- El auto mostrado solo en la página de listado de autos será el auto disponible.

## Historia de Usuario

- Como usuario, quiero poder buscar un auto.
- Como usuario, quiero poder ver el auto disponible.
- Como usuario, quiero poder reservar un auto.
- Como usuario, quiero poder devolver un auto.
- Como usuario, quiero poder ver el auto que he reservado.
- Como usuario, quiero proporcionar comentarios al sitio web de alquiler de autos.
- Como usuario, debería poder hacer el pago por el alquiler del auto.

## Página de Administrador

- La página de administrador tendrá una tabla de listado de autos.
- Tiene un botón para agregar un nuevo auto.
- El botón abrirá una nueva página donde el administrador puede agregar un nuevo auto.
- El administrador puede agregar un nuevo auto completando el formulario.
- El administrador también puede eliminar un auto haciendo clic en el botón de eliminar.
- El administrador puede ver la reserva del usuario haciendo clic en el botón de ver.
- El administrador puede ver el retorno del usuario haciendo clic en el botón de ver.
- El administrador puede aceptar o rechazar una reserva haciendo clic en el botón de aceptar o rechazar.
- El administrador puede devolver un auto haciendo clic en el botón de devolución.
- El administrador puede eliminar una reserva haciendo clic en el botón de eliminar.
- El administrador puede ver los comentarios haciendo clic en el botón de ver.






