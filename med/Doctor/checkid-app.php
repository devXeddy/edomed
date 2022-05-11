<?php 

session_start();

$docCode = $_SESSION['docCode'];

if($docCode == NULL){
    header("location: ../index/index.php");
}


$conn = new mysqli('127.0.0.1', 'root', '', 'edomed2');
    if($conn->connect_error){
        die('connessione fallita: '.$conn->connect_error);

    }

$idRequest = $_POST['idRequest'];

$sql = "SELECT * from appuntamenti where id = '$idRequest'";
$result=mysqli_query($conn,$sql);
$conta=mysqli_num_rows($result);
if ($conta>0){


    $row = $result->fetch_assoc();
    
    $namePatient = $row['namepatient'];
    $cognomePatient = $row['cognomepatient'];
    $emailPatient = $row['emailpatient'];
    $date = $row['date'];
    $docCode = $row['doccode'];
        
    $_SESSION['namepatient'] = $namePatient;
    $_SESSION['cognomepatient'] = $cognomePatient;
    $_SESSION['emailpatient'] = $emailPatient;
    $_SESSION['date'] = $date;
    $_SESSION['doccode'] = $docCode;
    $_SESSION['idApp'] = $idRequest;


    header("location: updateappuntamento.php"); 
}
else{
    $errorText = "L'id richiesto non è stato trovato!";
    $_SESSION['errorText'] = $errorText;
    header("location: appuntamenti.php");
}
   
?>