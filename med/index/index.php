<?php 
session_start();
$_SESSION['docCode'] = NULL;
$_SESSION['username'] = NULL;

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
  <title>EdOMed Mainpage</title>
</head>


<body>

  

  <p class="overlay"></p>

  <h1> <a id="mainpageEdomed" href="./index.php">EdoMed</a></h1>

  <img id="docpic" src="https://www.atheneumsrl.it/wp-content/uploads/2013/11/slider2-image.png" alt="">
  
  <p id="maintextMainpage"> <span id="stay">Stay</span> Safe, <span id="stay">Stay</span> Healty.</p>
  

  <div class="doctorLogin">
    <a class="doctorpic" href="../Doctor/doctorlogin.php">SEI UN MEDICO? <br> accedi qui</a>
    <a href="../Doctor/doctorlogin.php"><img class="doctorpic2" src="../includes/docpic.png" alt=""></a>
    
  </div>

  <div class="userLogin">
    <a onclick="PatientLogin()" href="#" class="userpic">SEI UN PAZIENTE? <br> accedi qui</a>
    <a href="#"><img onclick="PatientLogin()" class="userpic2" src="../includes/userpic.png" alt=""></a>
    
  </div>

  <button id="mainButton" onclick="appuntamento()">richiedi un appuntamento ora!</button>
 
  <div class="overlay"></div>

  <form action="./appuntamento.php" method="post">

      <div class="formAppuntamento">
        <a class="close" href="index.php">X</a>
        <p id="edomedForm">richiesta appuntamento</p>
        <input class="item" id="name" name="name" type="text" placeholder="Nome" required = "required">
        <input class="item" id="cognome" name="cognome" type="text" placeholder="Cognome" required = "required">
        <br>
        <input class="item" id="age" name="age" type="number" placeholder="Età" required = "required">
        <input class="item" id="phoneNumber" name="phoneNumber" type="tel" maxlength="10" placeholder="Numero di telefono" required = "required">
        <br>
        <input class="item" id="email" name="email" type="email" placeholder="email" required = "required">
        <br>
        <input id="sendForm" type="submit" value="INVIA">

      </div>

  </form>


  <form action="../patient/patientlogin.php" method="POST">
    <div class="patientform">
      <p onclick="ClosePatForm()" id="closePatForm" class="close">x</p>
    <h2 id="MainPatForm">edoMed</h2>
    <hr>
    <br>
    <input class="formItem" type="text" id="username" name="username" placeholder="Username" required = "required">
    <input class="formItem" type="password" id="password" name="password" placeholder="Password123" required = "required">
    <br>
    <br>
    <p id="pwdlost" onclick="passwordlost()">password dimenticata?</p>
    <br>
    <input id="LoginButtonPat" type="submit" value="ACCEDI">
    </div>
  </form>


  <div class="endbar">
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