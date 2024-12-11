<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            height: 100vh;
            width: 100vw;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table {
            margin: 20px;

            thead {
                background-color: AliceBlue;
            }

            th, td {
                border-style: ridge;
            }
        }
        
    </style>
</head>
<body>
    <table id="tabla">
        <thead>
            <tr>
                <th>Título</th>
                <th>Año de lanzamiento</th>
                <th>Género</th>
                <th>Duración</th>
                <th>Puntuación</th>
                <th>Director</th>
            </tr>
        </thead>
        <tbody>
        <?php
            /*
            3 - Crear una tabla que muestre las películas de la tabla "movies" base de datos
                Aparecerá el encabezado y los datos de las películas en las diferentes columnas:
                    nombre de la película, año de lanzamiento, género, duración y puntuación (20 pts*)

                Mostrar en una columna adicional el nombre del director de cada película (10 pts)

                Mostrar únicamente las películas que el usuario que ha iniciado sesión tiene alquiladas
                (aquellas en las que el campo "user_rented" de la tabla "movies" coincide con el "id" de la tabla "users" (10 pts)

                Cuando el usuario no tenga películas, aparecerá únicamente el texto "No se han encontrado películas". (10 pts)

            */

            session_start();
            
            try {
                $conn = new mysqli('127.0.0.1', 'root', '', 'examen');
    
                $consulta = "SELECT movies.title, movies.release_year, movies.genre, movies.runtime_minutes, movies.rating, directors.name FROM movies JOIN directors ON movies.director_id=directors.id WHERE movies.user_rented=" . $_SESSION['id'] . ";";
                $resultado = $conn->query($consulta);
    
                if ($conn->connect_error || $conn->error) {
                    print '<div><h2>Error durante la ejecucion de la consulta: ' . ($conn->connect_error ? ($conn->connect_error . ($conn->error ? (' / ' . $conn->error) : '')) : ($conn->error ? $conn->error : '')) . '</h2></div>';
                } else if ($resultado->num_rows > 0) {
                    
                    while($linea = $resultado->fetch_assoc()) {
                        print '<tr><td>' . $linea['title'] . '</td><td>' . $linea['release_year'] . '</td><td>' . $linea['genre'] . '</td><td>' . $linea['runtime_minutes'] . '</td><td>' . $linea['rating'] . '</td><td>' . $linea['name'] . '</td></tr>';
                    }

                } else { //Si hay 0 líneas
                    print '<script>document.getElementById("tabla").remove()</script>'; //JS - elimina la tabla
                    print '<h2>No se han encontrado películas</h2>';
                }
    
                $conn->close();

            } catch(Exception $e) {
                print '<div><h2>Error: ' .$e->getMessage() . '</h2></div>';
            }

        ?>
        </tbody>
    </table>
</body>
</html>