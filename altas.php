<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>altas</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
  <style media="screen">
    span{
      color:red;
    }
    div{
      border: 1px solid black;
      padding: 2%;
      margin-top: 2%;
      width: 60%;
    }
  </style>
  <body>
    <?php

    //Creo conexion con la BD
      $mysqli = new mysqli("localhost:3308","root","javi1234","PIZZERIA");

    //Inicializo variables
      $nom = "";
      $llinatge = "";
      $dni = "";
      $email = "";
      $ingredients = "";
      // Variables booleanas
      $nom_buid = false;
      $nom_numeric = false;
      $llinatge_buid = false;
      $llinatge_numeric = false;
      $email_buid = false;
      $email_error = false;
      $dni_buid = false;
      $dni_incorrecte = false;
      $dni_error= false;
      $ingredients_error = false;
      $resultat = false;
      //Si envio el formulario
      if(isset($_POST['submit'])){
        //Doy valor a la varible
        if(isset ($_POST["nom"])){
          $nom = $_POST["nom"];
        //Si esta vacia la variable que sea true y en el span le doy un echo con el error
        }if(empty($nom)){
          $nom_buid = true;
        //Si es numerico que sea true la variable y en el span del formulario
        //le doy un echo con el erro
        }if(is_numeric($nom)){
          $nom_numeric = true;
        }
        //Doy valor a la variable
        if (isset($_POST['llinatge'])) {
          $llinatge = $_POST['llinatge'];
        //Si esta vacia la variable que sea true y en el span le doy un echo con el error
        }if(empty($llinatge)){
          $llinatge_buid = true;
        //Si es numerico que sea true la variable y en el span del formulario
        //le doy un echo con el erro
        }if(is_numeric($llinatge)){
          $llinatge_numeric = true;
        }
        //Doy valor a la variable
        if(isset($_POST['email'])){
          $email = $_POST['email'];
        //Si esta vacia la variable que sea true y en el span le doy un echo con el error
        }if(empty($email)){
          $email_buid = true;
        //Para comprobar si un valor introducido es un email correcto si no lo es
        // que la variable sea = a true y que de un error.
        }if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $email_error =true;
        }
        /*Comprueba que los 8 primeros numeros sean numeros con dniNumeros y con dniLetra
        comprueba si es una letra al final y por ultimo mira si la variable
        dni esta vacio o es diferente de 9 o si dniNumeros no es numerico y si dniLetra es numerico
        que dni_incorrecte sea true*/
        if(isset($_POST['dni'])){
          $dni = $_POST['dni'];
          $dniNum = strlen($dni);
          $dniLetra = substr($dni, -1);
          $dniNumeros = substr($dni, 0,7);
          //Variables para saber si el dni es no es inventado
          $letras = array("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E","F");
          $resto = $dni % 23;
          $letra = $letras[$resto];
        //Comprueba si esta vacia la variable
        }if(empty($dni)){
          $dni_buid = true;

        }if($dniNum !==9 || !is_numeric($dniNumeros) || is_numeric($dniLetra)) {
          $dni_incorrecte = true;
        //Si la variable letra(es la variable que contiene el caracter con la letra
        //que deberia de salir despues de los numeros del dni del usuario)
        //si es diferente a dniLetra que sera el caracter que
        //escriba el usuario, dni_error sera = a true y dara el error.
        }if($letra !== $dniLetra){
          $dni_error = true;
        }
        //Si no esta vacio el checkbox que me cuente el numero de checkbox que
        //se han checkeado si son mayores de 6 da un error en el span del formulario
        //si no se checkea da un echo diciendo que no se ha seleccionado ninguno en el
        //resultado.
        if(!empty($_POST['ingredients'])){
          if(count($_POST['ingredients']) > 6){
            $ingredients_error = true;
          }
        }
        //Si se cumplen todas la condiciones del formulario que la variables resultado sea = a true y asi muestro el resultado mas adelante.
        if($nom_buid == false && $nom_numeric == false && $llinatge_buid == false && $llinatge_numeric == false && $email_buid == false && $email_error == false
          && $dni_buid == false && $dni_incorrecte == false && $dni_error == false && $ingredients_error == false){
            $resultat = true;
          }

      }
      //Si el resultado es = a false que muestre el formulario y si es = a true que muestre el resultado del formulario
      // más abajo.
     ?>
     <?php if( $resultat==false){ ?>
     <div>

      <h1>PIZZERIA 'SONFE'</h1>
      <h3>Formulari de Comanda de Pizzes</h3>
      <p style=color:red>* Camp Obligatori</p>
      <form method="post" action="insertarCita.php">

        Nom: <input maxlength="25" type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom'];?>">
                                                            <?php if($nom_buid){ echo "<span>* Aquest camp no es pot deixar buid.</span>";}?>
                                                            <?php if($nom_numeric){ echo "<span>* Només es permeten lletres y espais en blanc.</span>"; } ?>
        <br><br>Linatges: <input maxlength="50" type="text" name="llinatge" value="<?php if(isset($_POST['llinatge'])) echo $_POST['llinatge'];?>">
                                                                        <?php if($llinatge_buid){ echo "<span>* Aquest camp no es pot deixar buid.</span>"; } ?>
                                                                        <?php if($llinatge_numeric){ echo "<span>* Només es permeten lletres y espais en blanc.</span>"; } ?>
        <br><br>DNI: <input maxlength="9" type="text" name="dni" value="<?php if(isset($_POST['dni'])) echo $_POST['dni'];?>">
                                                                <?php if($dni_buid){ echo "<span>* Es obligatori introduir el DNI.</span>";} ?>
                                                                <?php if($dni_incorrecte){ echo "<span>* No s'han introduït 8 numeros i una lletra en el camp DNI.</span>";} ?>
                                                                <?php if($dni_error){ echo "<span>* El DNI introduït és incorrecte.</span>";} ?>
        <br><br>E-mail: <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
                                                        <?php if($email_buid){ echo "<span>* Aquest camp no es pot deixar buid.</span>";} ?>
                                                        <?php if($email_error){ echo "<span>* El format del email introduït és incorrecte.</span>";} ?>
        <br><br>Tria la teva pizza: <select name="pizza">
          <option value="EST">4 Estacions - 10,50€</option>
          <option value="NAP">Napolitana - 9€</option>
          <option value="MAR">Margarita - 8€</option>
          <option value="QUE">4 Formatges - 11,25€</option>
        </select>

        <p>Mida de la pizza:</p>
        <input type="radio" name="mida" value="M">M (preu base)
        <input type="radio" name="mida" value="L" checked>L (+2,5€)
        <input type="radio" name="mida" value="XL">XL (+5€)
        <input type="radio" name="mida" value="XXL">XXL (+9€)


        <p>Ingredient (0,50 per ingredient):</p>
        <input type="checkbox" name="ingredients[]" value="formatge">Formatge
        <input type="checkbox" name="ingredients[]" value="pepperoni">Pepperoni
        <input type="checkbox" name="ingredients[]" value="xampiyons">Xampiyons
        <input type="checkbox" name="ingredients[]" value="bacon">Bacon
        <input type="checkbox" name="ingredients[]" value="extraFormatge">Extra Formatge
        <input type="checkbox" name="ingredients[]" value="Pepperoni">Pepperoni
        <input type="checkbox" name="ingredients[]" value="gambes">Gambes
        <input type="checkbox" name="ingredients[]" value="saltxitxa">Saltxitxa
        <?php if($ingredients_error){ echo "<span>* Nomes es permet 6 ingredients extres.</span>";} ?>

        <br><br>
        <input type="submit" name="submit" value="Submit">
      </form>
      <a href="index.php">Torna al llistat de comandes</a>

    </div>
    <?php } ?>
  </body>
</html>
