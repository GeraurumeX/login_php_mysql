<?php

    require 'database.php';

    $message= '';

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $message = 'Successfully created new user';
        } else {
            $message = 'Sorry, there must have been an issue creating your account';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SignUp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
</head>

<body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
        <p> <?=$message ?> </p>

    <?php endif; ?>

    <h1>SignUp</h1>
    <span> or <a href="login.php">Login</a></span>

    <form action="signup.php" method="post">
        <input type="text" name="email" placeholder="Enter you email">
        <input name="password" type="password" placeholder="Enter your Password">
        <input name="confirm_password" type="password" placeholder="Confirm your password">
        <input type="submit" value="Send">
    </form>

</body>

</html> 