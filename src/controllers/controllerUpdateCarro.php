<?php
require_once("../models/carroDb.php");
class ControllerUpdateCarro{
    private $marca;
    private $modelo;
    private $cor;
    private $chassi;
    private $carroDb;
    
    public function __construct($chassi){
        $this->carroDb = new CarroDb();
        $this->chassi = $chassi;
        $this->criarFormulario($chassi);
    }
    public function getChassi(){
        return $this->chassi;
    }
    public function criarFormulario($chassi){
        $row = $this->carroDb->getCarroByChassi($chassi);
        $this->marca = $row['marca'];
        $this->modelo = $row['modelo'];
        $this->cor = $row['cor'];
    }
    
    public function editarFormulario($marca, $modelo, $cor, $chassi){
        if($this->carroDb->updateCarro($chassi,$marca, $modelo, $cor)){
            echo("<script>alert('Carro editado com sucesso!');document.location='../views/index.php'</script>");            
        }else{
            echo("<script>alert('Infelizmente não foi possível editar');history.back()</script>");
        }
    }
}

$chassi = filter_input(INPUT_GET, 'chassi');
$editar = new ControllerUpdateCarro($chassi);
echo($chassi)
if(isset($_POST['submit'])){
    $editar->editarFormulario($_POST['marca'],$_POST['modelo'],$_POST['cor'],$_POST['chassi'],);
}