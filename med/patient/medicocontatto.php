<?php


session_start();
ini_set('log_errors', 0);
error_reporting(0);

$username = $_SESSION['username'];
$name = ucwords($_SESSION['name']);

if($username == NULL){
    header("location: index.php");
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (max-width: 2000px)" href="../css/patient.css">
    <link rel="stylesheet" media="screen and (max-width: 1250px)" href="../css/patient2.css">
    <script src="script.js"></script>
    <title>edoMed - Dashboard</title>
</head>
<body>

<div class="Navbar">
    <h1><a id="mainpageEdomed" href="../index/index.php">EdoMed</a></h1>
        <nav id="nav">
            <br>
            <br>
            
            <a style="color: green; text-decoration: none;" href="dashboard.php?<?php echo $name; ?>">Home</a>
            <a id="navitem" href="./patappuntamenti.php?appuntamenti?<?php echo $name;?>">I miei appuntamenti</a>
            <a id="navitem" href="./patmedico.php?Medico+di?<?php echo $name;?>">Il mio medico</a>
            <a id="navitem" href="./patcontatti.php?edoMed">Contatti</a>
           
        </nav>
    </div>

    <h2 id="h2PatDashboard">Contatta il tuo medico.</h2>


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