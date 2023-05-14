<form method="POST" action="edit_table2.php">
  <label>NOME:</label>
  <input type="text" name="username"><br>
  <label>COGNOME:</label>
  <input type="text" name="email"><br>
  <label>ID:</label>
  <input type="number" name="password"><br>
  <input type="submit" value="inserimento">
</form>

<?php

// Connessione al database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "user";

$mysqli_connection = new mysqli("localhost", "root", "", "user");

if (!$mysqli_connection) {
    die("Connessione fallita: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Ottieni i dati dal form
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Verifica che i campi del form siano stati compilati correttamente
if (empty($username) || empty($email) || empty($password)) {
    die("Si prega di compilare tutti i campi.");
}


// Crea la query di inserimento
$sql = "INSERT INTO utenti (nome, cognome, id) VALUES ('$username', '$email', '$password')";

// Esegui la query di inserimento
if (mysqli_query($mysqli_connection, $sql)) {
    echo "Utente registrato con successo.";
} else {
    echo "Errore durante la registrazione dell'utente: " . mysqli_error($conn);
}

// Chiudi la connessione al database
mysqli_close($mysqli_connection);
}
?>
