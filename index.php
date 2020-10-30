<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-widt, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <title>Formularios</title>
</head>

<body>

    <?php
    session_start();
    $stat = 'Activo';
    if (!isset($_SESSION['alumnos'])) {
        $_SESSION['alumnos'] = array();
    }

    if(isset($_POST['stat'])){
    	$stat = $_POST['stat'];

    }

    if (isset($_POST['insertar'])) {

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $carrera = $_POST['carrera'];

        if (empty($nombre) || empty($apellido) ||  empty($carrera)) {
            echo "Rellena todos los valores";
        } else {

            $alumno = array(
                "nombre" => $nombre,
                "apellido" => $apellido,
                "stat" => $stat,
                "carrera" => $carrera
            );

            if (isset($_SESSION['alumno'][$nombre])) {
                echo "Se insertado el nuevo alumno";
            } 
      
            if(isset($_POST['Modificar'])){

            	if(!isset($_POST['nombre'])){
            		echo"No hay alumnos seleccionados";
            	}else{

            		$nombres = $_POST['nombre'];
            		print_r($nombre);

            		foreach ($_SESSION['alumnos'] as $key => $value) {
            			if(in_array($key, $nombres)){

            				post($_SESSION['alumnos'][$nombres]);

            			}
            		}
            	}
           }
      }

            $_SESSION['alumnos'][$nombre] = $alumno;

            print_r($_SESSION['alumnos']);
        }
     if (isset($_POST['vaciar'])){

        if(!isset($_POST['nombres'])){
            echo "No hay alumnos seleccionados";
        }else{

            $nombres = $_POST['nombres'];
            print_r($nombres);

            foreach ($_SESSION['alumnos'] as $key => $value) {
                
                if(in_array($key, $nombres)){
                    unset($_SESSION['alumnos'][$key]);
                }

            }

            echo "Alumnos borrados";

        }

    }


    ?>


    <form method="post">
    	<div class="form-group">
        <label for="nombre">Nombre: </label>
        <input type="text" class="form-control" id="nombre" name="nombre" />
        <br /><br />
</div>	
		<div class="form-group">
        <label for="apellido">Apellido: </label>
        <input type="text" class="form-control" id="apellido" name="apellido" />
        <br /><br />
</div>
		<div class="form-check">    
        <input class="form-check-input" type="checkbox" value="" id="stat" disabled checked="" name="stat[]" value="Activo"> 
        <label class="form-check-label" for="stat">
        Estado:
        Activo
    </label>
      
</div>
<div class="form-group">

        <label for="carrera">Carrera: </label>
        <input type="text" class= "form-control"id="carrera" name="carrera">
        <button type="submit" class = "btn btn-primary" name="insertar">Insertar</button>

        <button type="submit" class = "btn btn-primary" disabled name="Modificar">Modificar</button>
        <button type="submit" class = "btn btn-primary" name="vaciar">Eliminar</button>
    

</form>
        <?php

            if (count($_SESSION['alumnos']) === 0) {
                echo "<p>No hay alumnos</p>";
            } else {


                echo "<table class='table'>";
                echo "<thead class= 'thead-dark'>";
                echo "<tr>";
                echo "<th scope='col'></th>";
                echo "<th scope='col'>Nombre</th>";
                echo "<th scope='col'>Apellido</th>";
                echo "<th scope='col'>Estado</th>";
                echo "<th scope='col'>Carrera</th>";
                echo "</tr>";

                foreach ($_SESSION['alumnos'] as $key => $value) {
                    ?>
                    <tr>
                        <td><input type="checkbox" name="nombres[]" value="<?php echo $key; ?>"></td>
                        <td><?php echo $value['nombre']; ?></td>
                        <td><?php echo $value['apellido']; ?></td>
                        <td><?php print_r($stat); ?></td>
                        <td><?php echo $value['carrera']; ?></td>
                        
                    </tr>
        <?php
                }

                echo "</table>";
            }
        

        ?>


    
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>