<?php
// Include config file
require_once 'includes/config.php';

// DefinEe variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Bitte gebe einen Benutzernamen ein.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Dieser Benutzername wird bereits verwendet.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Etwas ist schief gelaufen. Bitte probiere es später nochmal.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Bitte gebe ein Passwort ein.";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Das Passwort muss mindestens 6 Zeichen lang sein.";
    } else{
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Bitte Passwort bestätigen..';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Die Passwörter stimmen nicht über ein.';
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page

            } else{
                echo "Etwas ist schief gelaufen. Bitte probiere es später nochmal.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>
<?php include 'includes/secure.php'; ?>
<?php include 'includes/head.php';?>
<?php include 'includes/header.php';?>
<body>
    <div style="height: 100vh">
        <div class="flex-center flex-column">
            <div class="dev_night_logo"><img id="logo" src="img/dev_night-logo.png" class="shadowfilter"></div>
            <div class="card">
                <div class="card-header blue-grey lighten-1 white-text">Benutzer hinzufügen</div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Benutzername</label>
                            <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Passwort</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Passwort bestätigen</label>
                            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-blue-grey" type="submit">Hinzufügen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<? include 'includes/scripts.php';?>
</html>