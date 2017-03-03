<?php
setcookie(session_name(), "", time() - 3600, "/");
session_unset();
session_destroy();
header("Location: index.php");
?>