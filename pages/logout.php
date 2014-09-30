<?php
session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(), '', 0, '/');
session_regenerate_id(true);

setcookie('username', '', time()-3600, '/');

header('location:index.php');

?>
