<?php

session_start();

session_destroy();

echo header("Location: ../../view/index.html");

?>