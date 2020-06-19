<?php
require_once("../models/motorDb.php");
class ControllerUpdateMotor{
    private $potencia;
    private $cilindro;
    private $MotorID;
    private $chassi;
    private $motorDb;
    
    public function __construct($MotorID){
        $this->motorDb = new MotorDb();
        $this->MotorID = $MotorID;
        $this->criarFormulario($MotorID);
    }
    
    public function getChassi(){
        return $this->chassi;
    }

    public function getPotencia(){
        return $this->potencia;
    }

    public function getCilindro(){
        return $this->cilindro;
    }

    public function getMotorID(){
        return $this->MotorID;
    }

    public function criarFormulario($MotorID){        
        $row = $this->motorDb->getMotorById($MotorID);        
        $this->potencia = $row['potencia'];
        $this->cilindro = $row['qntCilindros'];
        $this->chassi = $row['chassi'];
    }
    
    public function editarFormulario($potencia, $cilindro, $chassi, $MotorID){
        if($this->motorDb->updateMotor($potencia, $cilindro, $chassi, $MotorID)==TRUE){
            echo("<script>alert('Motor editado com sucesso!');document.location='../views/index.php'</script>");            
        }else{
            echo("<script>alert('Infelizmente não foi possível editar');history.back()</script>");
        }
    }
}

$MotorID = filter_input(INPUT_GET, 'MotorID');
$editar = new ControllerUpdateMotor($MotorID);
if(isset($_POST['submit'])){
    $editar->editarFormulario($_POST['potencia'],$_POST['cilindro'],$_POST['chassi'],$_POST['MotorId']);
}