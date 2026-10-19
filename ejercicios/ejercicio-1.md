# Ejercicio 1 — Leer la template hierarchy

## 1. Ficha de una entrada del blog

WordPress utilizaría `single.php`, porque es una entrada normal del blog y el tema no tiene una plantilla más específica para ella.

## 2. Ficha de un café

WordPress utilizaría `single.php`, porque el tema no tiene `single-cafe.php`. Al tratarse de un tipo de contenido personalizado, buscaría primero esa plantilla y, al no encontrarla, utilizaría `single.php`.

## 3. Listado de todos los cafés

WordPress utilizaría `archive-cafe.php`, porque es la plantilla específica para mostrar el listado de elementos del tipo de contenido `cafe`.

## 4. Página estática «Quiénes somos»

WordPress utilizaría `index.php`, porque el tema no tiene `page.php` ni otra plantilla específica para páginas. Al no encontrar una plantilla más adecuada, utiliza `index.php`.

## 5. Portada del sitio

WordPress utilizaría `index.php`, porque el tema no tiene `front-page.php`. Si la portada muestra las últimas entradas, tampoco existe `home.php`, así que termina utilizando `index.php`.

## 6. Diseño distinto para «Quiénes somos»

Crearía el archivo `page-quienes-somos.php`. WordPress lo utilizaría para la página cuyo slug es `quienes-somos`, sin cambiar el diseño de las demás páginas.