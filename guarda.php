<?php
    require'DataBase.php';

    // Traemos los valores
    // $autor = $_POST['autor'];
    // $ano = $_POST['ano'];
    // $titulo = $_POST['titulo'];

    // if(isset($_POST['enviame'])){
    //     echo $autor;
    // }else{
    //     echo "error";
    // }

    $db = new DataBase();

    $connection = $db->connect();
    $bandera = false;
//     $consulta = $connection->prepare("INSERT IGNORE INTO libros (Autor,Año,Titulo) VALUES(:autor, :ano, :titulo)");
    
//     $result = $consulta->execute([
//         'autor'=>$autor,
//         'ano'=>$ano,
//         'titulo'=>$titulo
//     ]);
// // 
// if($result){
//     $bandera = true;
// }


//_______________________________________--
if(isset($_POST['id'])){
           $id = $_POST['id'];
         $autor = $_POST['autor'];
           $ano = $_POST['ano'];
    $titulo = $_POST['titulo'];
       
           $consulta = $connection->prepare("UPDATE libros SET Titulo=:titulo, Autor=:autor, Año=:ano WHERE idLibro=:id");
           $resultado = $consulta->execute(['id'=>$id,
                                          'autor'=>$autor,
                                            'ano'=>$ano,
                                            'titulo'=>$titulo
                                          ]);
       
           if($resultado) {
               $bandera = true;
           }
       }
       else
       {

              $titulo = $_POST["titulo"];
              $autor = $_POST["autor"];
              $ano = $_POST["ano"];

              $consulta = $connection->prepare("INSERT INTO libros (Autor,Año,Titulo) VALUES (:autor, :ano, :titulo)");

              $resultado = $consulta->execute(
                     ['titulo'=>$titulo,
                     'autor'=>$autor,
                     'ano'=>$ano]
              );

              if ($resultado){
                     $bandera=true;
              }
       }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <?php if($bandera){?>
    El registro fue guardado correctamente SIUUU    
    <?php } else{ ?>    
    Ocurrió un error a guardar el registro
    <?php }  ?>

    <a href="index.php">Volver</a>
</body>
</html>