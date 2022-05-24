<?php
$pdo = new PDO('mysql:host=localhost;dbname=ijdb;charset=utf8','ijdbuser', 'root');
// Imposta l'attributo PDO che controlla la modalità d'errore con la
// modalità che lancia eccezioni
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>