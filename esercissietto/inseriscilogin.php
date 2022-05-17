<!DOCTYPE html>
<html lang="IT">
<header>
    <meta charset="UTF-8">
    <title>Esercissietto</title>
</header>

<body>
<?php
    if(isset($_POST["submit"])) //connessione db
    {
        $user = $_POST["username"];
        $pws = $_POST["password"];

        try{
            $conDB = new mysqli('localhost', 'root', NULL, 'basamento_di_dati');
        }
        catch(Exception $x)
        {
            if(mysqli_connect_errno())
            {
                echo "connessione fallita".mysqli_connect_errno()."<br>";
                exit(1);
            }
        }

        try 
        {
            $query = $conDB->query("SELECT Username FROM utenti WHERE Username='$user';"); 
            if (mysqli_fetch_row($query) != 0) 
            { 
                echo "Ciao $user"; 
            } 
            else
            {
                echo "Utente non registrato";
                echo '<a href="inserimento.php"><button type="submit" value="submit">REGISTRATI</button></a>';
            }
        } catch (Exception $x) {
            echo "Errore: ".$x;
        }
    }
    else
    {
        echo '<body>
        <h2>LOGIN</h2>
        <form action="".$_SERVER["PHP_SELF"]."" method="POST">
        <label for="username">NOME UTENTE</label>
        <input type="text" name="username"> </br></br>
        <label for="password">PASSWORD</label>
        <input type="text" name="password"></br></br>
        <input type="submit" name="submit" value="INVIA"></br></br>
        <!--controllare se si ha effettivamente inviato qualcosa -->
        <input type="reset" name="reset" value="RESET"></br></br>
        </form>
        </body>';
    }

?>



</body>