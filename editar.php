<?php  

	require 'DataBase.php';

	$db = new DataBase();
	$connection = $db->connect();

	$id = $_GET["id"];

	$consulta = $connection->prepare("SELECT * FROM libros WHERE idLibro=:id");
	$consulta->execute(['id'=>$id]);
	$result = $consulta->fetch(PDO::FETCH_ASSOC);

  ?>

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<!-- Autor,Año,Titulo -->
<form action="guarda.php" method="post">
        <label for="id">Id</label>
        <input type="number" name="id" value="<?php echo $result['idLibro'] ?>"><br> 

		<label for="autor">Autor</label>
        <input type="text" name="autor" value="<?php echo $result['Autor'] ?>"><br>  

        <label for="ano">Año</label>
        <input type="text" name="ano" value="<?php echo $result['Año'] ?>"><br>

        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" value="<?php echo $result['Titulo'] ?>"><br>
        
        <button type="submit">Editar</button>
        <a href="index.php" >Regresar</a><br>      
    </form>
</body>
</html>