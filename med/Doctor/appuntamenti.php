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
$errorText = $_SESSION['errorText'];

$conn = new mysqli('127.0.0.1', 'root', '', 'edomed2');
    if($conn->connect_error){
        die('connessione fallita: '.$conn->connect_error);

    }


$sql = "SELECT * FROM appuntamenti where doccode = '$docCode'";
$result=mysqli_query($conn,$sql);
$conta=mysqli_num_rows($result);
if($conta!=0){

    $table = "";

    while($row = $result->fetch_assoc()){
        $table.="<tr><td>".$row['namepatient']."</td><td>".$row['cognomepatient']."</td><td>".$row['emailpatient']."</td><td>".$row['date']."</td><td>".$row['id']."</td></tr>";
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
    <script type="text/javascript" src="script.js?$$REVISION$"></script>
    <title>edoMed - Pazienti</title>
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

    <p id="errortext"><?php echo $errorText;  ?></p>
    <?php $_SESSION['errorText'] = "" ?>

    <button id="editRequest" onclick="editrequest()">gestisci un appuntamento</button>
    <div class="overlay"></div>



    <form action="checkid-app.php" method="post">
        <div class="editRequest">
        <a class="close" href="appuntamenti.php">X</a>
            <p>GESTIONE APPUNTAMENTI</p>
            <input id="idRequest" name="idRequest" class="item" type="text" required = "required" placeholder="inserisci l'id associato" >
            <input id="sendForm" type="submit" value="INVIA">

        </div>
    </form>



    <table class="center">
        <thead>
            <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Email</th>
            <th>Data</th>
            <th>id</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $table ?>
        </tbody>
    </table>

<?php 

$idRequest = $_POST['idRequest'];

$sql = "SELECT * from richieste where id = '$idRequest'";
$result=mysqli_query($conn,$sql);
$conta=mysqli_num_rows($result);
$row = $result->fetch_assoc();

$nameRequest = $row['name'];
$cognomeRequest = $row['cognome'];
$ageRequest = $row['age'];
$phoneNumberRequest = $row['phonenumber'];
$emailRequest = $row['email'];
$dateRequest = $row['date'];

$_SESSION['nameRequest'] = $nameRequest;
$_SESSION['cognomeRequest'] = $cognomeRequest;
$_SESSION['ageRequest'] = $ageRequest;
$_SESSION['phoneNumberRequest'] = $phoneNumberRequest;
$_SESSION['emailRequest'] = $emailRequest;
$_SESSION['dateRequest'] = $dateRequest;

?>

    
    
</body>
</html>