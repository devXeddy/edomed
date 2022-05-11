s


<?php 

session_start();

$nameRequest = $_SESSION['nameRequest'];
$cognomeRequest = $_SESSION['cognomeRequest'];
$ageRequest = $_SESSION['ageRequest'];
$phoneNumberRequest = $_SESSION['phoneNumberRequest'];
$emailRequest = $_SESSION['emailRequest'];
$dateRequest = $_SESSION['dateRequest'];

$docCode = $_SESSION['docCode'];

if($docCode == NULL){
    header("location: ../index/index.php");
}


$conn = new mysqli('127.0.0.1', 'root', '', 'edomed2');
    if($conn->connect_error){
        die('connessione fallita: '.$conn->connect_error);

    }

$idRequest = $_POST['idRequest'];

$sql = "SELECT * from richieste where id = '$idRequest'";
$result=mysqli_query($conn,$sql);
$conta=mysqli_num_rows($result);
if ($conta>0){
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
    $_SESSION['idRequest'] = $idRequest;


    header("location: updaterequest.php"); 
}
else{
    $errorText = "L'id richiesto non è stato trovato!";
    $_SESSION['errorText'] = $errorText;
    header("location: richieste.php");
}


?>