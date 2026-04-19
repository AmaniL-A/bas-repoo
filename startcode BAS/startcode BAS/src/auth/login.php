<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "verkoper" && $password == "123") {
        $_SESSION['rol'] = "verkoper";
        header("Location: ../index.php");
        exit;
    }
    elseif ($username == "magazijn" && $password == "123") {
        $_SESSION['rol'] = "magazijn";
        header("Location: ../index.php");
        exit;
    }
    elseif ($username == "bezorger" && $password == "123") {
        $_SESSION['rol'] = "bezorger";
        header("Location: ../index.php");
        exit;
    }
    elseif ($username == "inkoper" && $password == "123") {
        $_SESSION['rol'] = "inkoper";
        header("Location: ../index.php");
        exit;
    } else {
        echo "Login fout!";
    }
}
?>

<form method="post">
    <input type="text" name="username" placeholder="gebruikersnaam">
    <input type="password" name="password" placeholder="wachtwoord">
    <button type="submit">Login</button>
</form>