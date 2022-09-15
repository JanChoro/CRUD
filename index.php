<?php

    require'DataBase.php';

$db = new DataBase();

$con = $db->connect();

$query = $con->prepare("SELECT * FROM libros");

$query->execute();

$libros = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Libreria</title>
</head>
<body>
    <a href="formulario.php">Nuevo libro</a>
    <table border="1">
        <th>Id</th>
        <th>Autor</th>
        <th>Año</th>
        <th>Título</th>
        <tbody>

    <?php foreach ($libros as $key => $libro) {?>
        <tr>

            <td><?php echo $key+1; ?></td>
            <td><?php echo $libro["Autor"]; ?></td>
            <td><?php echo $libro["Año"]; ?></td>
            <td><?php echo $libro["Titulo"]; ?></td>
            <td><a href="editar.php?id=<?php echo $libro['idLibro']?>">Editar</a></td>
            <td><a href="eliminar.php?id=<?php echo $libro['idLibro']?>">Eliminar</a></td>
        
        </tr>
    <?php } ?>
        </tbody>
    </table>
</body>
</html>