<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formularios 5</title>
</head>

<body>

    <form method="post">

        <label for="nombre">nombre</label>
        <input type="text" id="nombre" name="nombre" required />
        <br/><br/>
        
        <label for="apellido">apellido</label>
        <input type="text" id="apellido" name="apellido" required />
        <br/><br/>

        <label for="status">status</label>
        <input type="checkbox" disabled="" checked="" name="stat[]" value="Activo"> Activo
        <br/><br/>

        <label for="carrera">carrera</label>
        <input type="text" id="carrera" name="carrera" required />
        <br/><br/>

        <button type="submit" class ="btn btn-primary" name="insertar">Insertar</button><br></br>
        <button type="submit" class ="form-check-input" name="Modificar">Modificar</button><br></br>
        <button type="submit" class ="form-check-input" name="Eliminar">Vaciar</button><br></br>


    </form>

</body>

</html>