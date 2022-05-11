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


$sql = "SELECT * FROM archivio";
$result=mysqli_query($conn,$sql);
$conta=mysqli_num_rows($result);
if($conta!=0){

    $table = "";

    while($row = $result->fetch_assoc()){
        $table.="<tr><td>".$row['namePatient']."</td><td>".$row['cognomePatient']."</td><td>".$row['agePatient']."</td><td>".$row['archivedata']."</td><td>".$row['phonenumber']."</td><td>".$row['email']."</td><td>".$row['archiveid']."</td></tr>";
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
    <title>edoMed - Archivio</title>
</head>
<body>

<div class="Navbar">
    <h1><a id="mainpageEdomed" href="../index/index.php">EdoMed</a></h1>
        <nav id="nav">
            <br>
            <br>
            <a id="varstyle" href="./DocDashboard.php">Home</a>
            <a id="navitem" href="pazienti.php">I miei pazienti</a>
            <a id="navitem"  href="richieste.php">Nuove richieste</a>
            <a id="navitem" href="./appuntamenti.php">Appuntamenti</a>
            <p id="docName">Dr. <?php echo $cognome; ?></p>
        </nav>
    </div>

    <h2 id="h2archivio">ARCHIVIO</h2>


    <table class="center">
        <thead>
            <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>età</th>
            <th>Data Archivio</th>
            <th>N. di telefono</th>
            <th>email</th>
            <th>id</th>
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