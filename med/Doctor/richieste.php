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
$checkid = $_SESSION['checkid'];
$errorText = $_SESSION['errorText'];

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


$sql = "SELECT * FROM richieste";
$result=mysqli_query($conn,$sql);
$conta=mysqli_num_rows($result);
if($conta!=0){

    $table = "";

    while($row = $result->fetch_assoc()){
        $table.="<tr><td>".$row['name']."</td><td>".$row['cognome']."</td><td>".$row['age']."</td><td>".$row['phonenumber']."</td><td>".$row['email']."</td><td>".$row['id']."</td><td>".$row['date']."</td></tr>";
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
            <a id="navitem" style="color:rgb(0, 94, 78); text-decoration: none;" href="#">Nuove richieste</a>
            <a id="navitem" href="./appuntamenti.php">Appuntamenti</a>
            <p id="docName">Dr. <?php echo $cognome; ?></p>
        </nav>
    </div>

    <p id="errortext"><?php echo $errorText;  ?></p>
    <?php $_SESSION['errorText'] = "" ?>

    <button id="editRequest" onclick="editrequest()">premi qui per gestire una richiesta</button>
    <div class="overlay"></div>



    <form action="checkid.php" method="post">
        <div class="editRequest">
        <a class="close" href="richieste.php">X</a>
            <p>GESTIONE RICHIESTE</p>
            <input id="idRequest" name="idRequest" class="item" type="text" required = "required" placeholder="inserisci l'id associato" >
            <input id="sendForm" type="submit" value="INVIA">

        </div>
    </form>



    <table class="center">
        <thead>
            <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>età</th>
            <th>N.di telefono</th>
            <th>email</th>
            <th>id</th>
            <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $table ?>
        </tbody>
    </table>

<?php 
session_unset($_SESSION['errorText']);
?>

    
    
</body>
</html>