<?php 

session_start();
ini_set('log_errors', 0);
error_reporting(0);

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


$sql = "SELECT name, cognome, age, date, numberphone, email, id FROM pazienti WHERE doccode = '$docCode'";
$result=mysqli_query($conn,$sql);
$conta=mysqli_num_rows($result);
if($conta>0){

    $table = "";

    while($row = $result->fetch_assoc()){
        $table.="<tr><td>".$row['name']."</td><td>".$row['cognome']."</td><td>".$row['age']."</td><td>".$row['date']."</td><td>".$row['numberphone']."</td><td>".$row['email']."</td><td>".$row['id']."</td></tr>";
    }

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
    <script src="script.js"></script>
    <title>edoMed - Pazienti</title>
</head>
<body>

<div class="Navbar">
    <h1><a id="mainpageEdomed" href="../index/index.php">EdoMed</a></h1>
        <nav id="nav">
            <br>
            <br>
            <a id="varstyle" href="./DocDashboard.php">Home</a>
            <a id="navitem" style="color:rgb(0, 94, 78); text-decoration: none;" href="#pazienti">I miei pazienti</a>
            <a id="navitem" href="./richieste.php">Nuove richieste</a>
            <a id="navitem" href="./appuntamenti.php">Appuntamenti</a>
            <p id="docName">Dr. <?php echo $cognome; ?></p>
        </nav>
    </div>


    <h2 id="h2pazienti">i miei pazienti</h2>

    <div class="richieste" id="richiesteTamponi">Richieste tamponi: 0</div>
    
    <div class="richieste" id="richiesteRicette">Richieste ricette: 0</div>

    <table  class = "top-left" >
        <thead>

        
            <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>età</th>
            <th>data</th>
            <th>N.di telefono</th>
            <th>email</th>
            <th>N. identificativo</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $table ?>
        </tbody>
    </table>
    
    
</body>
</html>