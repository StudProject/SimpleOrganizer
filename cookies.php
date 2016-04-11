<?php

$tm = date('l jS \of F Y h:i:s A');
setcookie("last_access", $tm);

print $_COOKIE["last_access"];

?>