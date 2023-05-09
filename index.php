<?php
if (isset($_POST['submit'])) {
    $db = new PDO('sqlite:db.sqlite3');
    $sql = "INSERT INTO tb2 (email) VALUES (:email)";

    $stmt = $db->prepare($sql);

    $email = filter_input(INPUT_POST, 'email');
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);



    $success = $stmt->execute();
    if ($success) {
        header('Location: thanks.php'); // redirect verso la pagina di ringraziamento
        exit;
    } else {
        echo "Mi spiace qualcosa è andato storto";
    }

    $db = null;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div class="container">

        <div id="form">
            <h1>Form di registrazione </h1>


            <form action="index.php" method="POST" autocomplete="off">
                <label for="email">Inserisci la tua email:</label>
                <input type="email" name="email" id="email" required>
                <button type="submit" name="submit">Invia</button>
                <!-- Ho scelto il submit perchè secondo me si è più invitati a rileggere quello che si è scritto -->
            </form>


            <span>formato mail:mar@example.com</span>
        </div>

    </div>
</body>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        height: 100vh;
        background-color: grey;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #form {
        margin-top: 20px;
        border: 1px solid black;
        border-radius: 10px;
        padding: 30px 50px 15px 50px;
        background-color: white;
    }

    h1 {
        text-decoration: underline 1px;
        padding-bottom: 30px;
        text-underline-offset: 10px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input {
        margin-bottom: 10px;
        margin-top: 10px;
        width: 70%;
        height: 30px;
        border-radius: 10px;
        background-color: gray;
        border: none;

    }

    button {
        margin-bottom: 10px;
        width: 20%;
    }

    span {
        font-size: 12px;
        color: gray;
    }
</style>

</html>