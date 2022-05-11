<?php 

session_start();
ini_set('log_errors', 0);
error_reporting(0);

$nameRequest = $_SESSION['nameRequest'];
$cognomeRequest = $_SESSION['cognomeRequest'];
$ageRequest = $_SESSION['ageRequest'];
$phoneNumberRequest = $_SESSION['phoneNumberRequest'];
$emailRequest = $_SESSION['emailRequest'];
$dateRequest = $_SESSION['dateRequest'];
$idRequest = $_SESSION['idRequest'];

$docCode = $_SESSION['docCode'];

if($docCode == NULL){
    header("location: ../index/index.php");
}

$name = ucwords($_SESSION['name']);
$cognome = ucwords($_SESSION['cognome']);




$conn = new mysqli('127.0.0.1', 'root', '', 'edomed2');
    if($conn->connect_error){
        die('connessione fallita: '.$conn->connect_error);

    }

?>




<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (max-width: 2000px)" href="../css/main.css">
    <link rel="stylesheet" media="screen and (max-width: 1250px)" href="../css/style2.css">
    <script type="text/javascript" src="script.js?$$REVISION$"></script>
    <title>edoMed - Gestione <?php echo $cognomeRequest; ?></title>
</head>
<body>

<div class="Navbar">
    <h1><a id="mainpageEdomed" href="../index/index.php">EdoMed</a></h1>
        <nav id="nav">
            <br>
            <br>
            <a id="varstyle" href="./DocDashboard.php">Home</a>
            <a id="navitem" href="pazienti.php">I miei pazienti</a>
            <a id="navitem" style="color: white; text-decoration: none;" href="richieste.php">Nuove richieste</a>
            <a id="navitem" href="./appuntamenti.php">Appuntamenti</a>
            <p id="docName">Dr. <?php echo $cognome; ?></p>
        </nav>
    </div>

    <form action="requestupdated.php" method="post">
        <div class="updateRequest">
        <a class="close" href="richieste.php">X</a>
            <p>GESTIONE RICHIESTE</p>
            <p>nome: <?php echo $nameRequest; ?></p>
            <p>cognome: <?php echo $cognomeRequest; ?></p>
            <p>età: <?php echo $ageRequest; ?></p>
            <p>N. di telefono: <?php echo $phoneNumberRequest; ?></p>
            <p>email: <?php echo $emailRequest; ?></p>
            <p>data: <?php echo $dateRequest; ?></p>
            <p>id: <?php echo $idRequest; ?></p>
            <br>
            <p>seleziona una data:</p>
            <input id="date" name="date" type="date" required = "required">
            <br>
            <input id="sendForm" type="submit" value="CONFERMA">
            <p id="decline" onclick="deleteRequest()">RIFIUTA</p>
    
        </div>
    </form>
    
</body>
</html>