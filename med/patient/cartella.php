<?php


session_start();


$username = $_SESSION['username'];
$name = ucwords($_SESSION['name']);
$cognome = ucwords($_SESSION['cognome']);
$email = $_SESSION['email'];

if($username == NULL){
    header("location: index.php");
}

$conn = new mysqli('127.0.0.1', 'root', '', 'edomed2');
    if($conn->connect_error){
        die('connessione fallita: '.$conn->connect_error);

    }


$sql = "SELECT * FROM archivioappuntamenti WHERE email = '$email'";
$result=mysqli_query($conn,$sql);
$conta=mysqli_num_rows($result);
if($conta!=0){

    

    $table = "";

    while($row = $result->fetch_assoc()){
        $table.="<tr><td>".$row['name']."</td><td>".$row['cognome']."</td><td>".$row['email']."</td><td>".$row['date']."</td></tr>";
    }

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>edoMed - Dashboard</title>
</head>
<body>


<div class="overlay"></div>

<div class="Navbar">
    <h1><a id="mainpageEdomed" href="../index/index.php">EdoMed</a></h1>
        <nav id="nav">
            <br>
            <br>
            
            <a style="color: green; text-decoration: none;" href="dashboard.php?di?<?php echo $name; ?>">Home</a>
            <a id="navitem" href="./patappuntamenti.php?appuntamenti?<?php echo $name;?>">I miei appuntamenti</a>
            <a id="navitem" href="./patmedico.php?Medico+di?<?php echo $name;?>">Il mio medico</a>
            <a id="navitem" href="./patcontatti.php?edoMed">Contatti</a>
           
        </nav>
    </div>


    <h2 id="h2PatDashboard"><?php echo "Cartella di $name.";?></h2>


    <h2 id="h3patcartella">I tuoi appuntamenti passati:</h2>


    <h3 id="ricettatext">RICHIEDI ORA UNA RICETTA ELETTRONICA ℞</h3>

    <img onclick="RicettaOpen()" id="ricettapic" src="https://us.123rf.com/450wm/lightvisionftb/lightvisionftb1609/lightvisionftb160900007/63146584-stile-di-design-piatto-rilievo-di-prescrizione-medica.jpg?ver=6" alt="">


    <h3 id="tamponetext">RICHIEDI ORA UN TAMPONE GRATUITO!</h3>
    <img onclick="openCovid()" id="tamponepic" src="https://media.istockphoto.com/vectors/medical-questionnaire-with-cross-symbol-flat-vector-illustration-vector-id1139096172?k=20&m=1139096172&s=612x612&w=0&h=yXq7YoPoAu-MTZ9ghBgM0jYuNF_vf3s4KYES-fbeDco=" alt="">
    
    <table>
        <thead>
            <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Email</th>
            <th>data</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $table ?>
        </tbody>
    </table>


    <div class="ricetta">
    <pb onclick="CloseRicetta()" class="close">Chiudi</pb>
        <div id="edoMed">edoMed</div>
        <hr>
        <form action="sendricetta.php" method="POST">
            <input class="item-ricetta" type="text" id="name" name="name" value=<?php echo $name;?> required = "required">
            <input class="item-ricetta" type="text" id="cognome" name="cognome" value=<?php echo $cognome;?> required = "required">
            <br>
            <textarea class="item-ricetta" name="post-text" id="post-text" cols="0" rows="5" placeholder="inserisci la tua richiesta qui" maxlength="50"></textarea>
            <br>
            <input id="sendRicetta" type="submit" value="INVIA">
        </form>
    </div>

    <div class="tamponeCovid">
    <pb onclick="closeCovid()" class="close">Chiudi</pb>
        <div id="edoMed">edoMed</div>
        <hr>
        <form method="post" name="formCovid" enctype="multipart/form-data">

            <input class="checkbox-covid"  type="checkbox" name="contPositivo" id="contPositivo">
            <label class="item-tamponeCovid" for="contPositivo">Ho avuto un contatto positivo</label>
            <br>
            <input class="checkbox-covid"  type="checkbox" name="covidAvuto" id="covidAvuto">
            <label class="item-tamponeCovid" for="covidAvuto">Ho già avuto il covid</label>
            <br>
            <input class="checkbox-covid" onclick="checknow()"  type="checkbox" name="patologie" id="patologie">
            <label class="item-tamponeCovid" for="patologie">Ho patologie</label>
            
            <input  class="patologieTEXT" type="text" name="patologietext" id="patologietext" placeholder="inserisci le patologie">
            <br>
            <hr>
            <input class="checkbox-covid" class="verifica18"  type="checkbox" name="verifica" id="verifica">
            <label id="verificatext" class="item-tamponeCovid" for="verifica">Confermo di avere più di 18 anni</label>
            <p class="verificatext2">devi confermare di essere maggiorenne per procedere!</p>
            
            <br>
            <p onclick="verifica18()" id="sendCovid">INVIA</p>
        </form>
    </div>


</body>
</html>