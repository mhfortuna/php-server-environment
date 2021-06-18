<!-- This is the last file which will be responsible for destroying the session
 and redirecting to the login page. -->

<?php

session_start();

//  Unset all the variables
unset($_SESSION);
// Borrar la cookie
if (ini_get('session.cookie_cookies')) { // We check if we were using the cookies before

    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}
// Destroy the session
session_destroy();

header('Location: ../index.php?logout=true'); // When we pass it like this, we can receive the value as a global variable.
