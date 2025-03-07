<?php
session_start();
session_destroy();
header("Location: ../../CRUDPOOtoMVC/views/Login.php");