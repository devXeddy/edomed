<?php 

session_start();
ini_set('log_errors', 0);
error_reporting(0);

$nameRequest = $_SESSION['namepatient'];
$cognomeRequest = $_SESSION['cognomepatient'];
$emailRequest = $_SESSION['emailpatient'];
$date = $_SESSION['date'];
$idApp = $_SESSION['idApp'];
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
            <a id="navitem" href="richieste.php">Nuove richieste</a>
            <a id="navitem" style="color: white; text-decoration: none;" href="./appuntamenti.php">Appuntamenti</a>
            <p id="docName">Dr. <?php echo $cognome; ?></p>
        </nav>
    </div>

    <form action="appupdated.php" method="post">
        <div class="updateRequest">
        <a class="close" href="appuntamenti.php">X</a>
            <p>GESTIONE RICHIESTE</p>
            <p>nome: <?php echo $nameRequest; ?></p>
            <p>cognome: <?php echo $cognomeRequest; ?></p>
            <p>email: <?php echo $emailRequest; ?></p>
            <p>data: <?php echo $date; ?></p>
            <p>id: <?php echo $idApp; ?></p>
            <br>
            <p>inserisci una nuova data:</p>
            <input id="updatedData" name="updatedData" type="date" required = "required">
            <br>
            <input id="sendForm" type="submit" value="CONFERMA">
            <p id="decline2" onclick="deleteApp()">ELIMINA</p>
    
        </div>
    </form>
    
</body>
</html>