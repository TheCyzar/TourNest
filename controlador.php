<?PHP
class db
{
    private $Conector;
    private $BaseDatos;
    private $Servidor;
    private $Usuario;
    private $Clave;

    public function __construct()
    {
        $this->Servidor="localhost";
        $this->Usuario="root";
        $this->Clave="";
        $this->BaseDatos="dbpro";
    }

    function conectar()
    {
        $this->Conector=new mysqli($this->Servidor,$this->Usuario,$this->Clave,$this->BaseDatos);
        if ($this->Conector->connect_error) {
            return 0;
        }
        else
        {
            $this->Conector->set_charset("utf8");
            return 1;
        }
    }

    function Registra($nombre,$apellido,$usuario,$direccion,$pais)
    {
        $SQL="INSERT INTO `registros` (`id`, `nombre`, `apellido`, `usuario`, `direccion`, `pais`) VALUES (NULL, '$nombre', '$apellido', '$usuario', '$direccion', '$pais');";
        return $this->Conector->query($SQL);
    }
    
}
?>