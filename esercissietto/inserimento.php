<!DOCTYPE html>
<html lang="IT">
<header>
    <meta charset="UTF-8">
    <title>Esercissietto</title>
</header>

<body>
    <?php
    if(isset($_POST["submit"]))
    {
        $user=$_POST["Username"];
        $pws=$_POST["Password"];
        $nome=$_POST["Nome"];
        $cognome=$_POST["Cognome"];

        try
        {
            $conDB=new mysqli('localhost','root',NULL,'basamento_di_dati');
            //echo "connessione effettuata"."<br>";
        }
        catch (Exception $x)
        {
            if(mysqli_connect_errno())
            {
                echo "connessione fallita".mysqli_connect_errno()."<br>";
                exit(1);
            }
        }
        //inserimento dati
        try
        {
            $ris = $conDB->query("INSERT INTO utenti(Nome, Cognome, Username, Password) VALUES ('$nome', '$cognome', '$user','$pws')");
            echo "Utente registrato correttamente"."<br>";
        }
        catch(Exception $x)
        {
            die("query fallita:".$x);
        }
        $conDB->close();
    }
    else{
        echo '<body>
        <h2>REGISTRAZIONE</h2>
        <form action="".$_SERVER["PHP_SELF"]."" method="POST">
            <label for="Nome">NOME</label>
            <input type="text" name="Nome"> </br></br>
            <label for="Cognome">COGNOME</label>
            <input type="text" name="Cognome"> </br></br>
            <label for="Username">USERNAME</label>
            <input type="text" name="Username"> </br></br>
            <label for="Password">PASSWORD</label>
            <input type="text" name="Password"> </br></br>
            <input type="submit" name="submit" value="INVIA"></br></br>
            <input type="reset" name="reset" value="RESET"></br></br>
        </form>
        </body>';
    }
    
    ?>
</body>