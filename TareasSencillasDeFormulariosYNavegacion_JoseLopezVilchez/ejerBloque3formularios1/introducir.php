<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducir</title>
    <style>
        body {
            height: 100vh;
            width: 100vw;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        article {
            text-align: left;
            padding-top: 5px;
            padding-bottom: 10px;
            padding-left: 10px;
            padding-right: 10px;
            border: 2px solid black;

            h2 {
                margin: 0px;
                margin-bottom: 4px;
            }

            form {
                display: flex;
                flex-direction: column;
                
                div {
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;

                    label {
                        margin-right: 5px;
                    }

                    input {
                        width: 300px;
                    }
                }

                #guardar {
                    width: 80px;
                    height: 30px;
                    margin-top: 10px;
                }
            }
        }
    </style>
</head>
<body>

<?php
/*Ejercicio 2 Bloque 3: Recuperar los datos introducidos en un formulario
Etapa 1
Vamos a empezar escribiendo un script PHP que muestre un formulario que permita introducir
el apellido y el nombre de un autor.
Indicaciones:
 En un nuevo directorio, crea un nuevo script PHP introducir.php
 En este nuevo script, introduce el código HTML que permite mostrar una página HTML
llamada “Introducir” conteniendo un formulario.

 Los campos "Apellido" y "Nombre" son de tipo texto, de tamaño 40, y se llaman
respectivamente apellido y nombre (atributo name). El botón "Guardar" se llama ok
(atributo name). La alineación de los campos se obtiene gracias a la utilización de
código CSS aplicado a las etiquetas <label>.
 Este formulario se tratará por el script PHP introducir.php.
 Por el momento, este script no contiene código PHP.*/
?>

<article>
    <h2>Apellido y nombre del nuevo autor:</h2>

    <form action="">
        <div>
            <label for="apellido">Apellido</label><input id="apellido" name="apellido" type="text"/>
        </div>
        <div>
            <label for="nombre">Nombre</label><input id="nombre" name="nombre" type="text"/>
        </div>
        
        <input id="guardar" name="ok" type="submit" value="Guardar"/>
    </form>
    </article>

<?php
/*Etapa 2
Ahora vamos a añadir el código PHP que permite tratar el formulario y recuperar la
información introducida en los dos campos.
Indicaciones:
 Al inicio del script, inserta una sección de código PHP que verifique si el script se llama
durante el tratamiento del formulario, y, si es el caso, recupere el contenido de los
campos “Apellido” y “Nombre” en dos variables $apellido y $nombre. Define otra
variable $autor conteniendo la concatenación de las dos variables anteriores, separadas
por un espacio.
 En la página HTML, bajo el formulario, muestra el valor de la variable $autor si está
definida.*/
?>



</body>
</html>