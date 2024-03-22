<?php
session_start();
session_destroy();
header("Location: /pages/html/login.html");
?>