<?php

session_start();
ini_set('log_errors', 0);
error_reporting(0);

$name = ucwords($_SESSION['name']);

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (max-width: 2000px)" href="../css/main.css">
    <link rel="stylesheet" media="screen and (max-width: 1250px)" href="../css/style2.css">
    <script src="script.js"></script>
    <title>Richiesta inviata</title>
</head>
<body>





    <h1><a id="mainpageEdomed" href="./index.php">EdoMed</a></h1>
    <h2 id="requestSent"> Grazie <?php echo "$name"; ?>, Hai inviato correttamente la tua richiesta!</h2>
    <p id="maintextSent">l'appuntamento verrà confermato tramite email</p>



    <div class="endbar2">
    <nav>
  
      <br>
      <br>
      <a id="endbar" href="#">termini e condizioni</a>
      <a id="endbar" href="#">contattaci</a>
      <a id="endbar" href="#">chi siamo</a>
      <a id="endbar" href="#">informazioni</a>
      <a id="endbar" href="#">sviluppatori</a>
      <a id="endbar" href="#">assunzioni</a>



    </nav>
  </div>



</body>
</html>