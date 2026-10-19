# Ejercicio 3 — Consultas a la API REST de WordPress

## 1. Listar las entradas

**URL consultada:**

`http://localhost/tueste-norte-wp/wp-json/wp/v2/posts?_fields=id,slug,title`

La consulta devuelve las entradas publicadas con los campos `id`, `slug` y `title`.

En mi instalación aparecen cinco entradas:

| ID | Slug | Título |
|---:|---|---|
| 53 | `como-preparar-un-buen-cafe-en-casa` | Cómo preparar un buen café en casa |
| 50 | `guatemala` | Guatemala |
| 47 | `brasil` | Brasil |
| 45 | `colombia` | Colombia |
| 42 | `etiopia` | Etiopía |

## 2. Consultar una entrada por su slug

**URL consultada:**

`http://localhost/tueste-norte-wp/wp-json/wp/v2/posts?slug=como-preparar-un-buen-cafe-en-casa&_fields=id,slug,title,content`

La consulta encuentra la entrada «Cómo preparar un buen café en casa», con ID `53`.

La respuesta incluye su identificador, slug, título y contenido. El contenido se devuelve en el campo `content.rendered`, que contiene el HTML de la entrada.

## 3. Listar las páginas

**URL consultada:**

`http://localhost/tueste-norte-wp/wp-json/wp/v2/pages?_fields=id,slug,title`

La consulta devuelve las cuatro páginas de mi instalación:

| ID | Slug | Título |
|---:|---|---|
| 22 | `blog` | Blog |
| 20 | `contacto` | Contacto |
| 18 | `quienes-somos` | Quiénes somos |
| 14 | `inicio` | Inicio |

## 4. Consultar una ruta inexistente

**URL consultada:**

`http://localhost/tueste-norte-wp/wp-json/wp/v2/tazas`

WordPress devuelve un error con estos datos:

- Código: `rest_no_route`.
- Estado HTTP: `404`.
- Mensaje: «No se ha encontrado ninguna ruta que coincida con la URL y el método de la solicitud».

Esto ocurre porque la ruta `/wp/v2/tazas` no está registrada en la API REST de mi instalación.

## Conclusión

La API REST permite consultar las entradas y páginas de WordPress mediante peticiones HTTP y obtener los resultados en formato JSON. También permite consultar una entrada utilizando su slug. Si se solicita una ruta que no existe, WordPress devuelve un error `404`.