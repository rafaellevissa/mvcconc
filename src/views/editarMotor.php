<!DOCTYPE HTML>
<html>
    <?php include("head.php") ?>
    <body>
        <?php include("menu.php") ?>
        <?php require_once("../controllers/controllerUpdateMotor.php"); ?>

        <div class="row">
            <form method="post" action="../controllers/controllerUpdateMotor.php" id="form" name="form" class="col-10">
                <div class="form-group">
                    <input class="form-control" type="text" id="potencia" name="potencia" placeholder="potencia do motor" value="<?php echo $editar->getPotencia(); ?>" required autofocus>
                    <input class="form-control" type="text" id="cilindro" name="cilindro" placeholder="quantidade de cilindros do motor" value="<?php echo $editar->getCilindro(); ?>" required>
                    <input class="form-control" type="text" id="chassi" name="chassi" placeholder="carro" value="<?php echo $editar->getChassi(); ?>" required readonly>   
                </div>
                <div class="form-group">
                <input type="hidden" id="MotorId" name="MotorId" value="<?php echo $editar->getMotorID(); ?>">                                       
                    <button type="submit" class="btn btn-sucess" id="editar" name="submit" value="editar">Editar Motor</button> 
                </div>            
            </form>   
        </div>
        
    </body>
</html>