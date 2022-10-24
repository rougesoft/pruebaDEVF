<?php
error_reporting(E_ALL);
class Conexion{
    private $driver;
    private $direccion;
    public $dataBase;
    private $user;
    private $password;
    private $cadena;
    public $conexion;

    public function __construct($dr,$di,$db,$us,$pd){
        $this->driver = $dr;
        $this->direccion = $di;
        $this->dataBase = $db;
        $this->user=$us;
        $this->password = $pd;
        
    }

    public function conectarDB(){
        try {
            $this->conexion = new PDO ("sqlsrv:Server=localhost,57186;Database=$this->dataBase",
            $this->user,
            $this->password);
            return true;

        } catch (Exception $e) {
            
            die("Error: " . $e->getMessage());
            return $e->getMessage();
        }finally{
            $this->connexion = null;
        }
    }

    public function ejecutarConsulta($sql="",$valores=array()){
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute($valores);
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $resultados;
    }

    
       
    
}
$conexion = new Conexion("sqlsrv","localhost","AdventureWorks2017","rougesoft","123456");
   
?>

