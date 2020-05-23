<?php
  include_once 'db_conn.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $sqlBind = $conn->prepare("INSERT INTO some_table (ime, uporabnisko_ime, geslo) VALUES (?, ?, ?)");
    $sqlBind->bind_param("sss", $_POST['name'], $_POST['username'], sha1($_POST['password']));
    $sqlBind->execute();
    $sqlBind->close();
    $_SESSION['msg'] = "Registracija uspešna, lahko se prijaviš!";
    header('location: index.php');
  }
?>
