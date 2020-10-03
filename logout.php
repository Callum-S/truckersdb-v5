<?php
session_start();
session_destroy();
header("Location: https://v5.truckersdb.net");
?>