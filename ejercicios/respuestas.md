# Respuestas Semana 2

## Ejercicio 1

### ¿Por qué al cliente se le da un usuario Editor y no Administrador?

Porque Marta solo necesita poder cambiar y gestionar el contenido de la web. No necesita tener acceso a toda la parte de administración de WordPress.

Por eso es mejor darle el usuario Editor, porque tiene los permisos que necesita sin darle permisos que no le hacen falta.

## Ejercicio 2

### ¿Por qué el functions.php del hijo no sustituye al del padre, pero el footer.php sí?

El `functions.php` del hijo no sustituye al del padre porque se cargan los dos. Así podemos añadir nuestras propias funciones sin quitar las que ya tiene el tema padre.

En cambio, el `footer.php` sí lo podemos sustituir porque si ponemos una copia en el tema hijo, WordPress utiliza esa copia en vez de la del tema padre.

## Ejercicio 3

### ¿Cuál es la diferencia entre get_field() y the_field()?

`get_field()` sirve para coger el valor de un campo de ACF y poder utilizarlo en el código.

`the_field()` sirve para mostrar directamente ese valor.

En mi caso he usado `get_field()` porque necesito comprobar primero si el campo tiene contenido y si está activado antes de mostrarlo.