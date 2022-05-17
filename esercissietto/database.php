<?php
    if ($_POST) {
        $user = $_POST["username"];
        $pws = $_POST["password"];

        $connDB = new mysqli("localhost", "root", NULL, "Account");
        if (mysqli_connect_errno()) {
            echo "Connessione fallita: " . mysqli_connect_errno() . "</br> </br>";
            exit(1);
        }
        echo 'Connessione avvenuta correttamente';

        /*$ris = $con->query($connDB, "INSERT INTO utente(username, pws) VALUES ('$user', '$pws')");
        if ($ris) {
            echo "Operazione eseguita";
        } else {
            echo "inserimento fallito" . mysqli_error($connDB);
        }*/
        
        mysqli_close($connDB);
    }
?>

<html>
    <head>
        <title>redirecting...</title>
    </head>

    <body>
        <h2>Ciao</h2>
    </body>
</html>