<?php
require_once('../session/initialize.php');

unset($_SESSION['username']);

redirect_to('index1.php');
exit;
?>