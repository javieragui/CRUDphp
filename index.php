<!DOCTYPE html>
<html>
  <head>
    <title>index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- Creo la conexion con la Base de datos -->
    <?php include 'db/conexion.php'; ?>
    <h1>PIZZERIA 'SONFE'</h1>

    <h2>Llistat de Comandes disponibles</h2>
      <div class="container">
        <?php
        //Creo la conexion con la Base de datos
          $mysqli = new mysqli("localhost:3308","root","javi1234","pizzeria");
          //Hago las consultas para que muestren los datos que me pide el ejercicio ordenadas por fecha del pedido.
          $sql = "SELECT ID,DATE_FORMAT(DATA, '%Y-%m-%d') Fecha, DATE_FORMAT(DATA, '%H:%i') Hora, NOM, LLINATGES, EMAIL, PIZZA, MIDA, PREU FROM COMANDA ORDER BY DATA";
          $sql2 = "SELECT CODI,NOM FROM INGREDIENT ";
          //En estas dos variables guardo las consultas sqls.
          $mostrar = $mysqli->query($sql);
          $mostrar2 = $mysqli->query($sql2);

         ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Dia</th>
              <th>Hora</th>
              <th>Nom complet</th>
              <th>Correu electrònic</th>
              <th>Pizza</th>
              <th>Mida</th>
              <th>Ingredients</th>
              <th>Total</th>
            </tr>
          </thead>
          <?php foreach ($mostrar as $muestra){
            //Muestro los datos de la tabla COMANDA con el foreach?>
            <tr>

              <td> <?php echo $muestra['Fecha'] ?></td>
              <td> <?php echo $muestra['Hora'] ?></td>
              <td> <?php echo $muestra['NOM']." ".$muestra['LLINATGES'] ?></td>
              <td><?php echo $muestra['EMAIL'] ?></td>
              <!-- Creo un switch para crear las condiciones para que salga como en el ejercicio me pide -->
              <td><?php switch ($muestra['PIZZA']) {
                          case 'MAR':
                              echo "Margarita";
                              break;
                          case 'EST':
                              echo "4 Estacions";
                              break;
                          case 'NAP':
                              echo "Napolitana";
                              break;
                          case 'QUE':
                              echo "4 Formatges";
                              break; } ?></td>
              <!-- Creo un switch para crear las condiciones para que salga como en el ejercicio me pide -->

              <td><?php switch ($muestra['MIDA']) {
                          case 'M':
                              echo "Petita";
                              break;
                          case 'L':
                              echo "Normal";
                              break;
                          case 'XL':
                              echo "Gran";
                              break;
                          case 'XXL':
                              echo "Extra-gran";
                              break; } ?></td>

              <?php foreach ($mostrar2 as $muestra2){
                //Muestro los datos de la tabla INGREDIENT con la condicion que si coinciden los ID y CODI
                //Que se muestre asi saldra el correspondiente a cada pedido
                    if ($muestra['ID']==$muestra2['CODI']) {?>
              <td><?php echo $muestra2['NOM'] ?></td>
              <?php } }?>

              <td><?php echo $muestra['PREU']. " €" ?></td>
              <!-- Hago un link al archivo eliminarCita.php enviando el id de la fila que se ha seleccionado y asi se borrara la fila -->
              <td><a href="eliminarCita.php?ID=<?php echo $muestra['ID']?>"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
          <?php } ?>

        </table>
    </div>
<!-- Creo un link al archivo altas.php como me dice en el ejercicio-->
    <a href="altas.php">Fer una comanda</a>
  </body>
</html>
