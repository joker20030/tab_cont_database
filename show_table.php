<?php 

// connessione database
$conn = mysqli_connect("localhost","root","","user");

//verifica conessione
if(!$conn){
    die("Connessione fallita: " . mysqli_connect_error());
}

//selezione tabella
$sql = "SELECT * FROM utenti LIMIT 10"; //limite massimo di 10 record

//estrarre dati dalla tabella
$result = mysqli_query($conn, $sql);

echo "<a href='edit_table2.php'>inserisci user</a>";

//stampa tabella
if(mysqli_num_rows($result) > 0){


    //inizio tabella
    //echo "<table><tr><th><input type='submit' name='id' value='ID'></th><th><input type='submit' name='nom' value='NOME'></th><th><input type='submit' name='cog' value='COGNOME'></th></tr>";
    echo "<table><tr><th><a href='show_table.php?SELECT * FROM utenti ORDER BY id DASC LIMIT 10'>ID</a></th><th><a href='show_table.php?SELECT * FROM utenti ORDER BY nome LIMIT 10'>NOME</a></th><th><a href ='show_table?$orderby2'>COGNOME</a></th></tr>";


    //mosto i dati con un ciclo while
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nome'] ."</td><td>".$row['cognome']."</td></tr>";
    }

    //fine della tabella
    echo "</table>";

    
}else{
    echo "La tabella e' vuota";
}

// query ordinamento tabella alfabetico = SELECT * FROM utenti ORDER BY "nome colonna da ordinare" ESC LIMIT 10

//chiusura connessione
mysqli_close($conn);

?>


<style>
    body{
        background:#000000;
    }
    
    table{
        width:80%;
    }

    table, th, td {
  border:1px solid blue;
  text-align:center;
  margin-left:32%;
  margin-top:5%;
  width:30%;
  color:lime;
    }

    input[type=submit] {

        color:purple;
        background:black;
        border-color: rgba(255,255,255,0);
  
}
</style>