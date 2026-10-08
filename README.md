# Tueste Norte

Este proyecto es la web de Tueste Norte que he realizado para la Semana 2 de CodeNode.

La web está hecha con WordPress en local usando XAMPP.

La ruta que he utilizado es:

C:\xampp\htdocs\tueste-norte-wp

La web se puede abrir desde:

http://localhost/tueste-norte-wp/

## ¿Qué he hecho?

He pasado la web que hice en la Semana 1 a WordPress.

He creado las páginas:

- Inicio
- Quiénes somos
- Contacto
- Blog

También he creado un menú con esas páginas y he puesto Inicio como página principal.

Además, he creado los cafés usando ACF para que los datos de cada café se puedan modificar desde WordPress sin tener que tocar el código.

## Tema

He creado un tema hijo de Twenty Twenty-One llamado:

tueste-norte

He utilizado CSS para pasar al tema la imagen y los colores que tenía en la web de la Semana 1.

También he modificado el footer para añadir un texto propio de Tueste Norte.

Los ejercicios de la Semana 2 están dentro de:

wp-content/ejercicios/

## Plugins

### WPForms

Es un plugin de formularios.

Lo he utilizado para crear el formulario de contacto de la página Contacto.

Elegí este plugin porque me permite crear el formulario desde WordPress de una forma sencilla.

### Yoast SEO

Es un plugin de SEO.

Lo he utilizado para configurar los datos básicos relacionados con el SEO de la página.

Lo elegí porque es un plugin conocido y permite hacer esta configuración desde WordPress.

### Advanced Custom Fields (ACF)

Es un plugin para crear campos personalizados.

Lo he utilizado para crear la información de los cafés.

## Cafés

He creado una categoría llamada:

Cafés

También he creado en ACF un grupo de campos llamado:

Ficha de café

Los campos que tiene son:

- Origen
- Notas de cata
- Nivel de tueste
- Precio

El nivel de tueste puede ser:

- Claro
- Medio
- Oscuro

He creado cuatro cafés:

- Etiopía
- Colombia
- Brasil
- Guatemala

Los datos de cada café se pueden rellenar desde la edición de la entrada.

En la plantilla single.php he hecho que la ficha solo aparezca en las entradas que pertenecen a la categoría Cafés.

También he puesto comprobaciones para que los campos vacíos no se muestren.

## Usuario de Marta

He creado un usuario llamado Marta con el rol Editor.

Le he puesto este rol porque puede gestionar el contenido de la web, pero no necesita tener todos los permisos de un Administrador.

## Blog

También he creado una entrada normal que no es un café:

Cómo preparar un buen café en casa

La he creado para comprobar que las entradas normales funcionan correctamente y no muestran la ficha de café.

## Formulario de contacto

En la página Contacto he añadido un formulario con:

- Nombre
- Correo electrónico
- Comentario o mensaje

## Configuración de WordPress

La base de datos utilizada es:

tueste_norte

El cotejamiento utilizado es:

utf8mb4_unicode_ci

Los enlaces permanentes están configurados como:

Nombre de la entrada

También he dejado WP_DEBUG activado porque la tarea lo pide.

La página Inicio está configurada como portada y Blog como página de entradas.

## Archivos que se suben al repositorio

En el repositorio se suben principalmente los archivos que he creado o modificado para el proyecto.

La carpeta más importante es:

wp-content/

Ahí están el tema, los plugins y los ejercicios.

También se incluye:

db/tueste-norte.sql

Este archivo es la exportación de la base de datos.

## Archivos que no se suben

No se sube el núcleo de WordPress porque se puede descargar de nuevo cuando se quiera instalar el proyecto.

Tampoco se sube:

wp-config.php

porque contiene la configuración de la instalación y los datos de conexión con la base de datos.

Por eso he utilizado el archivo .gitignore para excluir estos archivos.

## Restaurar el proyecto

Para volver a instalar el proyecto en otro ordenador haría lo siguiente:

1. Instalar XAMPP y activar Apache y MySQL.
2. Descargar WordPress.
3. Colocar WordPress dentro de la carpeta htdocs.
4. Copiar la carpeta wp-content de este proyecto.
5. Crear una base de datos llamada tueste_norte desde phpMyAdmin.
6. Importar el archivo db/tueste-norte.sql.
7. Crear el archivo wp-config.php con los datos de la nueva base de datos.
8. Comprobar que la dirección de la web coincide con la nueva dirección local.
9. Entrar en WordPress y comprobar que las páginas, entradas, tema y plugins funcionan correctamente.

Si la URL cambia, habría que revisar las direcciones guardadas en WordPress para adaptarlas a la nueva instalación.

## Documentación

En la carpeta docs estarán las capturas de la entrega.

Las capturas mostrarán:

- Las páginas y el menú.
- El grupo de campos de ACF.
- La edición de un café.
- El resultado del café en la web.