<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <?php

    $errors = array();
    $success = false;

    if (isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $cpassword = trim($_POST['cpassword']);


        if (strlen($username) < 4) {
            $errors[] =  "Username must be more than 4 characters";
        }
        if (strlen($password) < 8) {
            $errors[] =  "Password must be more than 8 characters";
        }
        if ($password !== $cpassword) {
            $errors[] =  "Passwords must be identical";
        }
        $output = "";

        if (count($errors) == 0) {
            $newUser = "" . $username . "|" . $password . "|" . $email . "\n";
            $db = fopen("databasefile.txt", "a");
            $process = fwrite($db, $newUser);
            $fclose = fclose($db);
            if ($process) {
                $success = true;
            } else {
                $errors[] =  "Registration Unsuccessful";
            }
            foreach ($errors as $error) {
                $output .= '' . $error . '</br>';
            }
        }


        if (count($errors) > 0) {
            echo '<div style="background: red;">' . $output . '</div>';
        }

        if ($success == true) {
            echo '<div style="background: green;">Registration Successful</div>';
        }
    }
    ?>

    <form action="register.php" method="post">
        <label for="username"> Username:
            <input type="username" name="username" placeholder="username">
        </label>

        <br><br>

        <label for="email"> Email:
            <input type="email" name="email" placeholder="email">
        </label>

        <br><br>

        <label for="password">Password:
            <input type="password" name="password" placeholder="password">
        </label>

        <br><br>

        <label for="cpassword"> Confirm Password:
            <input type="password" name="cpassword" placeholder="confrim password">
        </label>

        <br><br>

        <button type="submit" name="submit">Submit</button>

    </form>

</body>

</html>