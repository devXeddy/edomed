<?php 

session_start();
ini_set('log_errors', 0);
error_reporting(0);

$docCode = $_SESSION['docCode'];
$emailPatient = $_SESSION['emailpatient'];
$actualDate = date("d/m/Y");

if($docCode == NULL){
    header("location: ../index/index.php");
}

$idApp = $_SESSION['idApp'];

$conn = new mysqli('127.0.0.1', 'root', '', 'edomed2');
    if($conn->connect_error){
        die('connessione fallita: '.$conn->connect_error);

    }

$sql = "DELETE FROM appuntamenti WHERE id = '$idApp'";
$result=mysqli_query($conn,$sql);


$message ="
<html>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <style>
       /* Add custom classes and styles that you want inlined here */
    </style>
  </head>
  <body class='bg-light'>
    <div class='container'>
      <div class='card my-10'>
        <div class='card-body'>
          <h1 class='h3 mb-2'>edoMed</h1>
          <h5 class='text-teal-700'>E' stata apportata una modifica al suo appuntamento</h5>
          <hr>
          <div class='space-y-3'>
            <p class='text-gray-700'>
              Salve, questa email è stata inviata per informarla riguardo alla cancellazione del suo appuntamento.
            </p>
            <br>
            <p>purtroppo il medico a te associato ha deciso di eliminare il tuo appuntamento. 
              per riceverne uno nuovo recati sul nostro sito e compila il form.</p>
            <hr>
            <p class='text-gray-700'>
              visita ora il <a href='personalarea.php' target='_blank'>nostro sito</a> per richiedere un nuovo appuntamento
            </p>
          </div>
          <hr>
          <p>edoMed, $actualDate</p>
        </div>
      </div>
    </div>
  </body>
</html>
";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../includes/PHPMailer.php';
require '../includes/SMTP.php';
require '../includes/Exception.php';

use function PHPSTORM_META\map;



$mail = new PHPMailer(true);

$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';

$mail->SMTPAuth = 'true';

$mail->Username = 'noreply.edomed@gmail.com';

$mail->Password = 'Edoardo2004';

$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

$mail->Port = '587';

$mail->setFrom='noreply.edomed@gmail.com';

$mail -> Subject = "appuntamento Eliminato!";

$mail->addAddress("$emailPatient");

$mail->Body = $message;

$mail->isHTML(true);


$mail->send();


header("location: appuntamenti.php");

?>