# Tueste Norte

Este proyecto es la web de Tueste Norte, realizada con WordPress para las prácticas de CodeNode.

La web está desarrollada en local utilizando XAMPP.

La ruta del proyecto es:

`C:\xampp\htdocs\tueste-norte-wp`

La web se puede abrir desde:

`http://localhost/tueste-norte-wp/`

## ¿Qué he hecho?

He pasado la web que hice en la Semana 1 a WordPress y he continuado desarrollándola en las siguientes semanas.

He creado las páginas:

- Inicio
- Quiénes somos
- Contacto
- Blog

También he creado un menú de navegación y he configurado Inicio como página principal y Blog como página de entradas.

En la Semana 3 he creado un tema propio, un plugin para gestionar el catálogo de cafés y la funcionalidad del café de la semana.

## Tema propio

El tema se encuentra en:

`wp-content/themes/tueste-norte/`

He creado un tema propio llamado **Tueste Norte**, sin utilizar un tema hijo ni una plantilla de terceros como base.

El tema incluye los siguientes archivos:

- `style.css`: contiene la información del tema y los estilos.
- `functions.php`: carga los estilos y configura el menú principal.
- `header.php`: contiene la cabecera y la navegación.
- `footer.php`: contiene el pie de página.
- `index.php`: muestra las entradas generales.
- `single.php`: muestra las entradas individuales.
- `archive-cafe.php`: muestra el catálogo de cafés.
- `single-cafe.php`: muestra la ficha individual de cada café.

En la cabecera se utiliza `wp_head()` y en el pie de página se utiliza `wp_footer()`.

Los estilos se cargan desde `functions.php` mediante `wp_enqueue_style()`.

Para activar el tema, hay que entrar en **Apariencia → Temas** y activar Tueste Norte.

## Plugins

### TN Cafés

El plugin se encuentra en:

`wp-content/plugins/tn-cafes/tn-cafes.php`

Lo he creado para registrar el tipo de contenido personalizado Café y gestionar el catálogo.

También permite elegir qué café se quiere destacar como café de la semana desde el panel de administración, sin modificar el código.

Para elegirlo, hay que entrar en:

**Ajustes → Café de la semana**

Se selecciona un café publicado y se pulsa el botón para guardar los cambios.

En la página Inicio he añadido el shortcode:

`[tn_cafe_semana]`

Este shortcode muestra el café seleccionado, su imagen y los datos disponibles de su ficha.

El plugin registra el tipo de contenido `cafe` y utiliza `cafes` como base de su ruta pública y de la API REST.

### TN Ejercicios

El plugin se encuentra en:

`wp-content/plugins/tn-ejercicios/tn-ejercicios.php`

Lo he creado para realizar los ejercicios de WordPress. Incluye un filtro que modifica la longitud de los extractos y una acción que añade un comentario HTML con la fecha en el pie de página.

### Advanced Custom Fields (ACF)

Es un plugin que permite crear campos personalizados.

Lo he utilizado para añadir información específica a cada café y permitir que se pueda editar desde WordPress.

### WPForms

Lo he utilizado para crear el formulario de contacto de la página Contacto.

El formulario incluye los campos de nombre, correo electrónico y mensaje.

### Yoast SEO

Lo he utilizado para configurar aspectos básicos relacionados con el posicionamiento de la web.

## Catálogo de cafés

He creado un tipo de contenido personalizado llamado `cafe`, registrado desde el plugin TN Cafés.

El catálogo incluye cuatro cafés:

- Etiopía
- Colombia
- Brasil
- Guatemala

Cada café tiene título, descripción, imagen destacada y una ficha con los campos personalizados de ACF:

- `origen`
- `notas_cata`
- `nivel_tueste`
- `precio`

El nivel de tueste puede ser claro, medio u oscuro.

La plantilla `archive-cafe.php` muestra el catálogo completo y `single-cafe.php` muestra la ficha individual de cada café.

Los datos se pueden modificar desde WordPress sin tener que cambiar las plantillas.

## Café de la semana

He añadido una opción de configuración para seleccionar el café que se quiere destacar.

La selección se guarda en las opciones de WordPress y solo permite elegir un café publicado.

He elegido esta solución porque permite cambiar el café destacado desde el panel de administración sin modificar el código ni tener que editar la página Inicio cada semana.

El shortcode `[tn_cafe_semana]` muestra el café elegido, su imagen, su descripción y los campos personalizados disponibles.

## API REST

El tipo de contenido `cafe` tiene activada la opción `show_in_rest` y utiliza `cafes` como base de la API.

La dirección para consultar los cafés es:

`http://localhost/tueste-norte-wp/wp-json/wp/v2/cafes`

También se puede consultar un café concreto mediante su slug. Por ejemplo, para Etiopía:

`http://localhost/tueste-norte-wp/wp-json/wp/v2/cafes?slug=etiopia`

La respuesta incluye información como el título, el contenido, la imagen destacada y los campos personalizados de ACF.

Un fragmento de la respuesta real de Etiopía es:

```json
[
  {
    "id": 76,
    "slug": "etiopia",
    "title": {
      "rendered": "Etiopía"
    },
    "featured_media": 82,
    "acf": {
      "origen": "Etiopía",
      "notas_cata": "Frutos rojos, jazmín y cítricos.",
      "nivel_tueste": "claro",
      "precio": 12.5
    }
  }
]
```

## Usuario y permisos

He creado un usuario llamado Marta con el rol Editor.

He elegido este rol porque permite gestionar el contenido de la web sin conceder todos los permisos de un administrador.

## Blog

También he creado una entrada normal llamada:

**Cómo preparar un buen café en casa**

La he utilizado para comprobar que las entradas normales funcionan de forma independiente del catálogo de cafés.

## Configuración de WordPress

La base de datos utilizada es:

`tueste_norte`

El cotejamiento es:

`utf8mb4_unicode_ci`

Los enlaces permanentes están configurados como **Nombre de la entrada**.

La página Inicio está configurada como portada y Blog como página de entradas.

## Archivos del repositorio

En el repositorio se incluyen principalmente los archivos creados o modificados para el proyecto.

Entre ellos se encuentran:

- El tema propio.
- Los plugins desarrollados.
- Los ejercicios y la documentación.
- La exportación de la base de datos: `db/tueste-norte.sql`.

No se incluye el núcleo de WordPress ni el archivo `wp-config.php`, que contiene la configuración de la instalación y los datos de conexión con la base de datos.

Se utiliza `.gitignore` para excluir los archivos que no deben formar parte del repositorio.

## Restaurar el proyecto

Para instalar el proyecto en otro ordenador:

1. Instalar XAMPP y activar Apache y MySQL.
2. Descargar WordPress y colocarlo en la carpeta `htdocs`.
3. Copiar los archivos del proyecto respetando su estructura.
4. Crear una base de datos llamada `tueste_norte` desde phpMyAdmin.
5. Importar `db/tueste-norte.sql`.
6. Crear `wp-config.php` con los datos de conexión de la nueva instalación.
7. Comprobar la dirección de la web y adaptarla si es necesario.
8. Entrar en WordPress y comprobar que el tema y los plugins están instalados y activados.
9. Guardar los cambios en **Ajustes → Enlaces permanentes** para actualizar las rutas.
10. Comprobar las páginas, el catálogo, el café de la semana y la API REST.

## Documentación

La carpeta `docs` se utiliza para guardar las capturas de la entrega.

La carpeta `ejercicios` contiene la documentación de los ejercicios realizados.
