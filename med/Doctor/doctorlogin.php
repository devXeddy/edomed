<?php

session_start();


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
    <title>edoMed - Doctor Login</title>
</head>
<body>
    <h1><a id="mainpageEdomed" href="../index/index.php">EdoMed</a></h1>

    <h2></h2>
    

    <form class="docLogin" action="./logincheck_doctor.php" method="post">
        <p class="docLogin2" id="logindoctor">accedi a <span id="greencolor">EdoMed</span></p>
        <input class="docLogin2" type="text" id="docCode" name="docCode" placeholder="Codice Personale" required = "required">
        <input class="docLogin2" type="password" name="docPassword" id="docPassword" placeholder="Password" required = "required">
        <br>
        <input id="submitDoctor" type="submit" value="Accedi all'area personale">
    </form>


    <img id="docpicLogin" src="https://www.dottoressagaiacastiglioni.it/wp-content/uploads/2015/12/doctor-writing.png" alt="">


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