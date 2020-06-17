<?php
require_once '../models/motor.php';
class ControllerCreateMotor{
    private $oMotor;
    public function __construct(){
        $this->oMotor = new Motor();
        $this->cadastrar();
    }

    public function cadastrar(){
        $this->oMotor->setMarca($_POST['potencia']);
        $this->oMotor->setModelo($_POST['qntCilindros']);
        $this->oMotor->setCor($_POST['chassi']);

        $resultado = $this->oMotor->incluir();
        if($resultado>=1){
            echo("<script>alert('Motor cadastrado com sucesso!');document.location='../views/cadastroMotor.php'</script>");
        }else{
            echo("<script>alert('Infelizmente não foi possível cadastrar');history.back()</script>");
        }
    }
}
new ControllerCreateMotor();