<?php

//Creo conexion con la BD
  $mysqli = new mysqli("localhost:3308","root","javi1234","PIZZERIA");
  //A la variable pedidoId le asigno el valor del id que obtengo al dar al icono de la papelera
  $pedidoId=$_GET['ID'];
  //Hago las dos consultas para borrar los datos que tengan la misma id de pedidoId.
  $sql = "DELETE FROM COMANDA WHERE ID=$pedidoId";
  $sql2 = "DELETE FROM INGREDIENT WHERE CODI=$pedidoId";
  //En estas dos variables guardo las consultas sqls.
  $eliminar = $mysqli->query($sql);
  $eliminar2 = $mysqli->query($sql2);
  
  include("index.php");
 ?>
