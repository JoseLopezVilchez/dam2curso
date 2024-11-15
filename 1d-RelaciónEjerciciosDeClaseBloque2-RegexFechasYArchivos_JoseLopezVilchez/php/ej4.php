<?php

/*4. Usando expresiones regulares, extraer la lista de enlaces de todas las noticias de esta url: https://escuelaestech.es/noticias/
Los enlaces que buscamos están contenidos dentro de estos titulares h3, de esta forma:  <h3 class="elementor-post__title"><a ... >titulo_de_la_noticia</a></h3>
Ejercicios con funciones de fechas*/

/*
<h3 class="elementor-post__title">
	<a href="https://escuelaestech.es/graduacion-estech-promocion-2021-2023/">
		Graduación ESTECH Promoción 2021/2023			
    </a>
</h3>
*/

$url = 'https://escuelaestech.es/noticias/';

//$html = file_get_contents($url); //No deja hacer esto
$html = file_get_contents('htmlaleer.html');

preg_match_all('/<h3 class="elementor-post__title">\s*<a href="([^"]+)"/', $html, $matches);

print 'Los links de las noticias de la pagina <span>' . $url . '</span> son los siguientes:<br/>';

foreach ($matches[1] as $match) {
	print '<span>' . $match . '</span><br>';
}

?>