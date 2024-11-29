<?php

/*Desarrolla un sistema que gestione libros y usuarios de una biblioteca. El sistema debe cumplir los siguientes requisitos:

- Clase Base:

  Crea una clase ItemBiblioteca que tenga:
   · Una propiedad titulo.
   · Un método __construct($titulo) para inicializar el título.
   · Un método getTitulo() para obtener el título.*/

   class ItemBiblioteca {

    var $titulo;

    function __construct(string $titulo) {
        $this->titulo = $titulo;
    }

    function getTitulo() {
        return $this->titulo;
    }
   }

/*- Trait (Reutilización de Código):

  Crea un trait Prestamo que incluya:
   · Una propiedad enPrestamo (booleano) para indicar si el ítem está en préstamo.
   · Un método prestar() que cambie el estado a true.
   · Un método devolver() que cambie el estado a false.
   · Un método getEstadoPrestamo() que devuelva "Prestado" o "Disponible".*/

   /*- Uso de Trait:

  Haz que las clases Libro y Revista usen el trait Prestamo para gestionar el estado de préstamo.*/

  /*- Atributo Estático:

   · Añade un atributo estático contadorPrestamos en el trait Prestamo para llevar la cuenta de cuántos préstamos se han realizado.
   · Incrementa este contador cada vez que un ítem se presta.*/

   trait Prestamo {

    var bool $enPrestamo = false;

    static int $contadorPrestamos = 0;

    function prestar () {
        $this->enPrestamo = true;
        Prestamo::$contadorPrestamos++;
    }

    function devolver () {
        $this->enPrestamo = false;
    }

    function getEstadoPrestamo () {
        return $this->enPrestamo;
    }
   }

/*- Clases Hijas (Herencia):

  Crea dos clases que heredan de ItemBiblioteca:
   · Libro: Añade una propiedad autor y un método getAutor().
   · Revista: Añade una propiedad numeroEdicion y un método getNumeroEdicion().*/

   class Libro extends ItemBiblioteca {

    use Prestamo;

    var $autor;

    function getAutor () {
        return $this->autor;
    }
   }

   class Revista extends ItemBiblioteca {

    use Prestamo;

    var $numeroEdicion;

    function getNumeroEdicion () {
        return $this->numeroEdicion;
    }
   }

/*- Clase Principal:

  Crea una clase Biblioteca con un método agregarItem(ItemBiblioteca $item) que permita registrar libros o revistas.
   · Agrega un método mostrarEstado(ItemBiblioteca $item) que muestre el título, el tipo (libro o revista), y si está prestado o disponible.*/

   class Biblioteca {

    var array $registro;

    function agregarItem (ItemBiblioteca $item) {
        $this->registro[] = $item;
    }

    function mostrarEstado (ItemBiblioteca $item) {
        if (in_array($item, $this->registro)) {
            print 'Titulo: ' . $item->getTitulo() . ' / Tipo: ' . get_class($item) . ' / Estado: ' . ($item->getEstadoPrestamo() ? 'Prestado' : 'Disponible') . "\n";
        }
    }
   }

/*Ejemplo de Uso:*/

$libro1 = new Libro("El Quijote", "Miguel de Cervantes");
$revista1 = new Revista("National Geographic", 300);

$libro1->prestar();
$revista1->prestar();

$biblioteca = new Biblioteca();
$biblioteca->agregarItem($libro1);
$biblioteca->agregarItem($revista1);

$biblioteca->mostrarEstado($libro1);  // Salida: El Quijote (Libro) - Prestado
$biblioteca->mostrarEstado($revista1);  // Salida: National Geographic (Revista) - Prestado

$libro1->devolver();
$biblioteca->mostrarEstado($libro1);  // Salida: El Quijote (Libro) - Disponible

echo "Préstamos totales: " . Prestamo::$contadorPrestamos . "\n";  // Salida: Préstamos totales: 2

/*Notas:
Uso de Herencia:
Usa ItemBiblioteca como clase base y herédala en Libro y Revista.

Uso de Traits:
Implementa el trait Prestamo en ambas clases hijas.

Métodos y Propiedades Estáticas:
Usa un atributo estático en el trait Prestamo para contar los préstamos.

Uso de Clases e Instancias:
Crea instancias de Libro y Revista y agrégalas a la clase Biblioteca.*/

?>