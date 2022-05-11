<?php 

session_start();

$docCode = $_SESSION['docCode'];
$actualDate = date("d/m/Y");

if($docCode == NULL){
    header("location: ../index/index.php");
}

$id = $_POST['ArchiveIdCheck'];

$conn = new mysqli('127.0.0.1', 'root', '', 'edomed2');
    if($conn->connect_error){
        die('connessione fallita: '.$conn->connect_error);

    }

$sql = "SELECT * FROM pazienti WHERE id = '$id' and doccode = '$docCode'";
$result=mysqli_query($conn,$sql);
$conta=mysqli_num_rows($result);
if($conta!=0){
    $row = $result->fetch_assoc();

    $namePatient = $row['name'];
    $cognomePatient = $row['cognome'];
    $agePatient = $row['age'];
    $archivedata = date("d/m/Y");
    $phonenumber = $row['numberphone'];
    $email = $row['email'];

    $sqlquery = "DELETE FROM pazienti WHERE id = '$id'";
    mysqli_query($conn,$sqlquery);


    $sqlquery = "INSERT INTO archivio (namePatient, cognomePatient, agePatient, archivedata, phonenumber, email, doccode) VALUES ('$namePatient', '$cognomePatient', '$agePatient', '$archivedata', '$phonenumber', '$email', '$docCode');";
    mysqli_query($conn, $sqlquery);

    header("location: archivio.php");

}else{
    $errorText = "inserisci un id valido!";
    $_SESSION['errorText'] = $errorText;
    header("location: docDashboard.php");

}
?>