// Hazme el logout y redirige al inicio
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
session_unset();
session_destroy();
header("Location: " . DIRBASEURL . "/?success=logged_out");
exit;
?>