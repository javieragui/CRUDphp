<?php
require_once("altas.php");
//Creo conexion con la BD y que herede del archivo altas.php
  $mysqli = new mysqli("localhost:3308","root","javi1234","PIZZERIA");

//Si se envia el formulario y se cumplen las condiciones(variables $resultat = a true) que se muestre el resultado del formulario.
  if(isset($_POST['submit']) && $resultat == true){

    //Creo la consulta para insertar los valores en la BD con las condiciones para el precio.
    //Creo las condiciones con los ifs, si escoge una pizza que cambie el valor de la variable preu
    //Si el checkbox de ingredientes no esta vacio que haga esta consulta.
    if(!empty($_POST['ingredients'])){
      if ($_POST['pizza']=='EST') {
        if($_POST['mida']=='M'){
        $preu = 10.50+count($_POST['ingredients'])*0.50;
        }
        if($_POST['mida']=='L'){
          $preu = 10.50+count($_POST['ingredients'])*0.50+2.50;
        }
        if($_POST['mida']=='XL'){
          $preu = 10.50+count($_POST['ingredients'])*0.50+5;
        }
        if($_POST['mida']=='XXL'){
          $preu = 10.50+count($_POST['ingredients'])*0.50+9;
        }
        //Despues de hacer cada condicion hago la consulta para insertas los datos en la tabla
          $sql = "INSERT INTO COMANDA (DATA,NOM,LLINATGES,DNI,EMAIL,PIZZA,MIDA,PREU) VALUES (NOW(),'$_POST[nom]','$_POST[llinatge]','$_POST[dni]','$_POST[email]',
          '$_POST[pizza]','$_POST[mida]',$preu)";
          //En la variable $insertar guardo la consulta sql.
          $insertar = $mysqli->query($sql);
          //En la variable last_id guardo el ultimo id asignado al hacer submit.
          $last_id = mysqli_insert_id($mysqli);

      }else if ($_POST['pizza']=='NAP') {
        if($_POST['mida']=='M'){
        $preu = 9.00+count($_POST['ingredients'])*0.50;
        }
        if($_POST['mida']=='L'){
        $preu = 9.00+count($_POST['ingredients'])*0.50+2.50;
        }
        if($_POST['mida']=='XL'){
          $preu = 9.00+count($_POST['ingredients'])*0.50+5;
        }
        if($_POST['mida']=='XXL'){
          $preu = 9.00+count($_POST['ingredients'])*0.50+9;
        }
        $sql = "INSERT INTO COMANDA (DATA,NOM,LLINATGES,DNI,EMAIL,PIZZA,MIDA,PREU) VALUES (NOW(),'$_POST[nom]','$_POST[llinatge]','$_POST[dni]','$_POST[email]',
        '$_POST[pizza]','$_POST[mida]',$preu)";
        $insertar = $mysqli->query($sql);
        $last_id = mysqli_insert_id($mysqli);

      }else if ($_POST['pizza']=='MAR') {
        if($_POST['mida']=='M'){
          $preu = 8.00+count($_POST['ingredients'])*0.50;
        }
        if($_POST['mida']=='L'){
          $preu = 8.00+count($_POST['ingredients'])*0.50+2.50;
        }
        if($_POST['mida']=='XL'){
          $preu = 8.00+count($_POST['ingredients'])*0.50+5;
        }
        if($_POST['mida']=='XXL'){
          $preu = 8.00+count($_POST['ingredients'])*0.50+9;
        }
        $sql = "INSERT INTO COMANDA (DATA,NOM,LLINATGES,DNI,EMAIL,PIZZA,MIDA,PREU) VALUES (NOW(),'$_POST[nom]','$_POST[llinatge]','$_POST[dni]','$_POST[email]',
        '$_POST[pizza]','$_POST[mida]',$preu)";
        $insertar = $mysqli->query($sql);
        $last_id = mysqli_insert_id($mysqli);

      }else if ($_POST['pizza']=='QUE') {
        if($_POST['mida']=='M'){
          $preu = 11.25+count($_POST['ingredients'])*0.50;
        }
        if($_POST['mida']=='L'){
          $preu = 11.25+count($_POST['ingredients'])*0.50+2.50;
        }
        if($_POST['mida']=='XL'){
          $preu = 11.25+count($_POST['ingredients'])*0.50+5;
        }
        if($_POST['mida']=='XXL'){
          $preu = 11.25+count($_POST['ingredients'])*0.50+9;
        }

        $sql = "INSERT INTO COMANDA (DATA,NOM,LLINATGES,DNI,EMAIL,PIZZA,MIDA,PREU) VALUES (NOW(),'$_POST[nom]','$_POST[llinatge]','$_POST[dni]','$_POST[email]',
        '$_POST[pizza]','$_POST[mida]',$preu)";
        $insertar = $mysqli->query($sql);
        $last_id = mysqli_insert_id($mysqli);
      }
    }else if(empty($_POST['ingredients'])){
      $_POST['ingredients'] = "";
      if ($_POST['pizza']=='EST') {
        if($_POST['mida']=='M'){
        $preu = 10.50;
        }
        if($_POST['mida']=='L'){
          $preu = 10.50+2.50;
        }
        if($_POST['mida']=='XL'){
          $preu = 10.50+5;
        }
        if($_POST['mida']=='XXL'){
          $preu = 10.50+9;
        }
          $sql = "INSERT INTO COMANDA (DATA,NOM,LLINATGES,DNI,EMAIL,PIZZA,MIDA,PREU) VALUES (NOW(),'$_POST[nom]','$_POST[llinatge]','$_POST[dni]','$_POST[email]',
          '$_POST[pizza]','$_POST[mida]',$preu)";
          $insertar = $mysqli->query($sql);
          $last_id = mysqli_insert_id($mysqli);

      }else if ($_POST['pizza']=='NAP') {
        if($_POST['mida']=='M'){
        $preu = 9.00+count($_POST['ingredients'])*0.50;
        }
        if($_POST['mida']=='L'){
        $preu = 9.00+count($_POST['ingredients'])*0.50+2.50;
        }
        if($_POST['mida']=='XL'){
          $preu = 9.00+count($_POST['ingredients'])*0.50+5;
        }
        if($_POST['mida']=='XXL'){
          $preu = 9.00+count($_POST['ingredients'])*0.50+9;
        }
        $sql = "INSERT INTO COMANDA (DATA,NOM,LLINATGES,DNI,EMAIL,PIZZA,MIDA,PREU) VALUES (NOW(),'$_POST[nom]','$_POST[llinatge]','$_POST[dni]','$_POST[email]',
        '$_POST[pizza]','$_POST[mida]',$preu)";
        $insertar = $mysqli->query($sql);
        $last_id = mysqli_insert_id($mysqli);

      }else if ($_POST['pizza']=='MAR') {
        if($_POST['mida']=='M'){
          $preu = 8.00+count($_POST['ingredients'])*0.50;
        }
        if($_POST['mida']=='L'){
          $preu = 8.00+count($_POST['ingredients'])*0.50+2.50;
        }
        if($_POST['mida']=='XL'){
          $preu = 8.00+count($_POST['ingredients'])*0.50+5;
        }
        if($_POST['mida']=='XXL'){
          $preu = 8.00+count($_POST['ingredients'])*0.50+9;
        }
        $sql = "INSERT INTO COMANDA (DATA,NOM,LLINATGES,DNI,EMAIL,PIZZA,MIDA,PREU) VALUES (NOW(),'$_POST[nom]','$_POST[llinatge]','$_POST[dni]','$_POST[email]',
        '$_POST[pizza]','$_POST[mida]',$preu)";
        $insertar = $mysqli->query($sql);
        $last_id = mysqli_insert_id($mysqli);

      }else if ($_POST['pizza']=='QUE') {
        if($_POST['mida']=='M'){
          $preu = 11.25+count($_POST['ingredients'])*0.50;
        }
        if($_POST['mida']=='L'){
          $preu = 11.25+count($_POST['ingredients'])*0.50+2.50;
        }
        if($_POST['mida']=='XL'){
          $preu = 11.25+count($_POST['ingredients'])*0.50+5;
        }
        if($_POST['mida']=='XXL'){
          $preu = 11.25+count($_POST['ingredients'])*0.50+9;
        }

        $sql = "INSERT INTO COMANDA (DATA,NOM,LLINATGES,DNI,EMAIL,PIZZA,MIDA,PREU) VALUES (NOW(),'$_POST[nom]','$_POST[llinatge]','$_POST[dni]','$_POST[email]',
        '$_POST[pizza]','$_POST[mida]',$preu)";
        $insertar = $mysqli->query($sql);
        $last_id = mysqli_insert_id($mysqli);
      }
    }
    if(!empty($_POST['ingredients'])){
    //La funcion implode la utilizo para guardar los checkbox de 'ingredients' en el mismo campo, si no utilizo el implode
    //Se me guardaría en diferente campo y por lo tanto en diferente fila y la guardo en una variable '$ingredients'.
    $ingredients = implode(", ",$_POST['ingredients']);
    //hago la consulta y la guardo en la variable sql2 y el last_id lo utilizo para guardar el ultimo id asignado que se asigna al
    //hacer submit.
    $sql2 = "INSERT INTO INGREDIENT (CODI,NOM) VALUES ($last_id,'$ingredients')";
    $insertar2 = $mysqli->query($sql2);

    }
    if(empty($_POST['ingredients'])){
      $ingredients = $_POST['ingredients'];
      //hago la consulta y la guardo en la variable sql2 y el last_id lo utilizo para guardar el ultimo id asignado que se asigna al
      //hacer submit.
      $sql2 = "INSERT INTO INGREDIENT (CODI,NOM) VALUES ($last_id,'$ingredients')";
      $insertar2 = $mysqli->query($sql2);

    }

    include("index.php");
    }
?>
