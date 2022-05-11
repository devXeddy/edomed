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


$sql = "SELECT name, cognome, age, date, numberphone, email, id FROM pazienti WHERE doccode = '$docCode'";
$result=mysqli_query($conn,$sql);
$conta=mysqli_num_rows($result);
if($conta>0){

    $table = "";

    while($row = $result->fetch_assoc()){
        $table.="<tr><td>".$row['name']."</td><td>".$row['cognome']."</td><td>".$row['id']."</td></tr>";
    }

}


?>


<!DOCTYPE html>
<html id="opacity" lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen and (max-width: 2000px)" href="../css/main.css">
    <link rel="stylesheet" media="screen and (max-width: 1250px)" href="../css/style2.css">
    <script src="script.js"></script>
    <title>edoMed - Doctor Dahboard</title>
</head>
<body>


    <div class="Navbar">
    <h1><a id="mainpageEdomed" href="../index/index.php">EdoMed</a></h1>
        <nav id="nav">
            <br>
            <br>
            
            <a style="color:rgb(0, 94, 78); text-decoration: none;" href="#home">Home</a>
            <a id="navitem" href="./pazienti.php">I miei pazienti</a>
            <a id="navitem" href="./richieste.php">Nuove richieste</a>
            <a id="navitem" href="./appuntamenti.php">Appuntamenti</a>
            <p id="docName">Dr. <?php echo $cognome; ?></p>
        </nav>
    </div>

    <div class="MainMenu">
        <h2 id="h2Dashboard">accesso eseguito come <span id="bluecolor"><?php echo $name, " ", $cognome; ?>.</span></h2>
        <p class="ItemMainMenu" href="#">Certificati rilasciati ➯</p>
        <br>
        <br>
        <br>
        <p onclick="addPatient()" class="ItemMainMenu" href="?addpatient">Aggiungi Paziente ➯</p>
        <br>
        <br>
        <br>
        <p onclick="addToArchive()" class="ItemMainMenu" href="#">Archivia Paziente ➯</p>
        <br>
        <br>
        <br>
        <a id="archiviowidth" class="ItemMainMenu" href="./archivio.php">Archivio ➯</a>
    
    </div>

    <p class="overlay"></p>

    <p id="errortext"><?php echo $errorText; ?></p>
    <?php $_SESSION['errorText'] = NULL ?>

    <div class="addpatient">
        <form action="addpatient.php" method="post">
        <a id="closeAddPat" class="close" href="docDashboard.php">X</a>
            <h2 id="h2addpatient">AGGIUNGI UN NUOVO PAZIENTE</h2>
            <hr>
            <input class="addpat-item" type="text" id = "name" name="name" placeholder="Inserisci qui il nome" required = "required"> 
            <input class="addpat-item" type="text" id="cognome" name="cognome" placeholder="Inserisci qui il cognome" required = "required">
            <input class="addpat-item" type="number" id="age" name="age" placeholder="Inserisci qui l'età" required = "required">
            <input class="addpat-item" type="tel" id="phoneNumber" name="phoneNumber" placeholder="N. di telefono" required = "required">
            <input class="addpat-item" type="email" id="email" name="email" placeholder="inserisci qui l'email" required = "required">
            <input class="addpat-item"class="addpat-item" type="submit" id="submitAddPat" value="AGGIUNGI">
            </div>
        </form>
    </div>

    <div id="toArchive">
        <form action="toArchive.php" method="post">
            <table class="dashboardPatientTable">
                    <hr>


                    <th><h2>ARCHIVIA</h2></th>
                    <th><h2>UN</h2></th>
                    <th><h2>PAZIENTE</h2></th>
                
                    
                    <tr>
                        
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>N. identificativo</th>
                    </tr>

                    <tbody>
                        <?php echo $table  ?>
                    </tbody>

                    <th><input type="number" id="ArchiveIdCheck" id="ArchiveIdCheck" name="ArchiveIdCheck" placeholder="Inserisci qui l'id" required = "required"></th>
                    <th><input id="sendToArchive" type="submit" value="ARCHIVIA"></th>
                    <th><p id="CloseToArchive" onclick="closeArchivePatient()">CHIUDI</p></th>
                    

            </table>
            </div>
        </form>
    </div>




    
    <p><a id="logout" href="../index/index.php">effettua il logout</a></p>


    <video id="videoMask" width="640" height="360" controls>
  <source src="../includes/video.mp4" type="video/mp4">
    </video>




    <div class="endbar2">
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