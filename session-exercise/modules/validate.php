 <!-- All login validations must be done in this file receiving the form data by the POST method 
 and this should redirect the user depending on whether the login is correct or not.
 You can use a simple string comparison or anything you want for deciding if the login is correct or not. -->

 <?php
    session_start();

    $_email = $_POST['email'];
    $_password = $_POST['password'];


    $_dbEmail = "mathiasfortuna@hotmail.com";
    $_dbPassword = password_hash("123456", PASSWORD_DEFAULT);

    if ($_dbEmail == $_email && password_verify($_password, $_dbPassword)) {
        echo "<p>Success!</p>";
        $_SESSION["email"] = $_email;
        header("Location: ../panel.php");
    } else {
        $_SESSION["loginError"] = "Wrong email or password";
        header("Location: ../index.php");
    }
