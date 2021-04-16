<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <?php

    $errors = array();

    if (isset($_POST['submit'])) {

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (strlen($username) < 4) {
            $errors[] =  "Username must be more than 4 characters";
        }
        if (strlen($password) < 8) {
            $errors[] =  "Password must be more than 8 characters";
        }

        $userRows = file('databasefile.txt');


        var_dump($userRows);
    }



    ?>

    <form action="login.php" method="post">
        <label for="username"> Username:
            <input type="username" name="username" placeholder="username">
        </label>

        <br><br>

        <label for="password">Password:
            <input type="password" name="password" placeholder="password">
        </label>

        <br><br>

        <button type="submit" name="submit">Submit</button>

    </form>

</body>

</html>