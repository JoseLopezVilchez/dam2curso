<?php

class Nombre {
    private $propiedad;
    protected $blah = "";
    public int $atributo;

    public function metodo(string $bleh) : Void {

    }

    public function __construct($name) { //metodos precedidos de __ son 'mágicos' - en este caso es el constructor
        $this->propiedad = $name; //this se hace falta a la instancia de la clase, -> propiedad hace referencia al atributo propiedad
    }

    public function __destruct() { //Metodo que se ejecuta cuando una instancia se elimina

    }

    public function __call(string $nombre, array $argumentos) { //Metodo que se ejecuta siempre que se intente ejecutar otro método que no exista (en sustitución, por así decirlo)
        print 'Oye, que han llamado a ' . $nombre . ' con los argumentos ' . implode(', ', $argumentos) . ', ¡pero no existe!';
    }

    public function __get(string $nombre) { //Metodo que se ejecuta cuando se llama a un atributo que no existe o no es accesible
        print 'Oye, que han llamado a ' . $nombre . ', ¡pero no existe o no es accesible! Venga, que te voy a echar un cable.';

        if (property_exists($this, $nombre)) { //Si la propiedad existen en X instancia con un cierto nombre, da true
            return $this->$nombre;
        }

        throw new Exception("Oops, no he podido ayudar ni aun queriendo.");
    }
}

//La sintaxis en php no es objeto.metodo(), sino objeto->metodo() u objeto->atributo

interface Interfaz { //Las interfaces no permiten albergar atributos - y los metodos de su interior siempre seran publicos
    public function move($direccion);
    public function attack($oponente);

    const WORBLE = 'worble'; //las interfaces también pueden contener constantes
}

trait Ave {
    public function chirp () {
        print 'peep peep!';
    }
}

trait Bicho {
    public function chirp () {
        print 'cri cri';
    }
}

abstract class Unit implements Interfaz { //Clases abstractas no permiten crear objetos de si mismas, son para que se hereden

    use Ave, Bicho {
        Bicho::chirp insteadOf Ave; //esto es para resolver conflictos por solapamiento
        Ave::chirp as beep; //Esto le da un pseudonimo a un metodo, tambien vale para resolver conflictos por solapamiento
    } //así se implementan traits

    protected $alive = true;
    protected $nombre;
    const CONSTANTE = 'Unidad Generica';
    static $ejercito = 0; //Los atributos y funciones static son de la propia clase y se usan con ::

    public function __construct($nombre) {
        $this->nombre = $nombre;
        self::$ejercito++; //self se usa para referirse a la clase, no la instancia (como haria $this)
    }

    function move($direccion) {
        print '<p>' . $this->nombre . ' camina hacia ' . $direccion . '</p>';
    }

    abstract public function attack($oponente); //metodos abstractos obligan a la herencia y que se sobreescriban

    static function nepe() {
        return 'Mi moto alpina derrapante';
    }
}

final class Soldier extends Unit { //Las clases 'final' no permiten que se herede de ellas

    const CONSTANTE = 'Soldado Generico';

    protected string $arma;
    protected $nombre = 'Soldado NPC';

    public function __construct(string $nombre, string $arma) {
        parent::__construct($nombre);
        $this->arma = $arma;
    }

    public function attack($oponente) {
        print '<p>' . $this->nombre . ' golpea a ' . $oponente . ' con su ' . $this->arma . '</p>';
    }

    static function nepe() {
        print parent::nepe();
    }
}

class Archer extends Unit {
    public function attack($oponente) {
        print '<p>' . $this->nombre . ' dispara a ' . $oponente . '</p>';
    }
}

$silencioso = new Archer('El Silenciador');

$silencioso->move('el burdel');
$silencioso->attack('Cthulhu');

$manguera = new Soldier('El Jardinero', 'Chorrimanguera');
$manguera->attack('Rosa');

print Soldier::CONSTANTE . '</br>';
print Unit::CONSTANTE . '</br>';
print Soldier::WORBLE . '</br>';

Soldier::nepe();

$manguera->chirp();
$manguera->beep();

$claseAnonima = new class('blorble') { //Tambien puedes hacer clases anónimas! Como clojures, pero para clases! :D
    public $baba;

    public function __construct ($baba) {
        $this->baba = $baba;
    }

    public function bawbaw () {
        print 'baba es ' . $this->baba;
    }
};

$claseAnonima->bawbaw();

?>